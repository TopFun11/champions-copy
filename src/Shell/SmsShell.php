<?php
//TODO: Use composer for library
namespace App\Shell;
use \DateTime;

use Cake\Console\Shell;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

require_once(APP . 'Vendor' . DS . 'Twilio' . DS . 'autoload.php');
use Twilio\Rest\Client;

define('SMS', 1);
define('TWILIO_NUM', '+441675292021');
define('TWILIO_SID', 'ACe11a31f43ea0853ee364beeeb29eb325');
define('TWILIO_TOK', '2e6cffca227d4cd629e9bf87bb2ef48b');
define('WELCOME', 'Welcome %name% to Champions for Health. We\'ll send you a weekly text message containing tips, updates, and links to resources which we hope will help you with your challenges. If you\'d prefer not to receive these messages, reply with STOP. All the best, The C4H Team');

class SmsShell extends Shell{

	public function main(){
		$table = TableRegistry::get('Messages');
		$date = new DateTime();
		$query = $table->find()
			->where(['sent' => false, 'type' => SMS, 'scheduled_time <=' => $date->format('Y-m-d\TH:i:sP')]);

		foreach($query as $msg){
			try{
				$this->msg($msg->content);
				$msg->sent = true;
				$table->save($msg);
			} catch (Exception $e) {
				Log::write('error', 'SMS failed: ' . $msg);
			}
		}
	}

	public function msg($message){
		$table = TableRegistry::get('Profile');
		$query = $table->find();
		$client = new Client(TWILIO_SID, TWILIO_TOK);
		
		foreach($query as $user){
			try{
			$to = $user->phone_number;
			$name = TableRegistry::get('Users')->get($user->user_id)->username;
			$msg = str_replace('%name%', $name, $message);
			
			$client->messages->create(
				$to,
				array('from' => TWILIO_NUM,
					'body' => $msg
				)
			);
			} catch(Exception $e){
				Log::write('error', 'SMS failed: ' . $e);
			}
		}
	}
	
	public function welcome(){
		$tableUsers = TableRegistry::get('Users');
		$date = new DateTime();
		$date->modify('-3 hours');
		$query = $tableUsers->find()->where(['created >=' => $date->format('Y-m-d\TH:i:sP')]);
		$client = new Client(TWILIO_SID, TWILIO_TOK);
		
		foreach($query as $user){
			$profile = TableRegistry::get('Profile')->find()->where(['user_id' => $user->id])->first();
			$name = $user->username;
			$to = $profile->phone_number;
			$msg = str_replace('%name%', $name, WELCOME);
			
			try{
				$client->messages->create(
					$to,
					array('from' => TWILIO_NUM,
						'body' => $msg
					)
				);
			}catch(Exception $e){
				Log::write('error', 'SMS Welcome failed: ' . $e);
			}
		}
	}
	
	public function inactive(){
		//TODO: Message when inactive, needs DB.
	}
	
	//Time Format: mm/dd/yyyyThh:mm:ss
	public function schedule($message = '', $time){
		$date = new DateTime($time);
		$date = $date->format('Y-m-d H:i:s');
		$table = TableRegistry::get('Messages');
		$newMsg = $table->newEntity();

		$newMsg->type = SMS;
		$newMsg->subject = 'sms';
		$newMsg->content = $message;
		$newMsg->sent = false;
		$newMsg->scheduled_time = $date;

		if(!$table->save($newMsg)){
			Log::write('error', 'SMS schedule fail: ' . $newMsg);
		}
	}
}
