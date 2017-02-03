<?php
//TODO: Use composer for library
//TODO: Comments and tidy
namespace App\Shell;
use \DateTime;

use Cake\Console\Shell;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

require_once(APP . 'Vendor' . DS . 'Twilio' . DS . 'autoload.php');
use Twilio\Rest\Client;

define('SMS', 1);
define('TWILIO_NUM', '+442820032179');
define('TWILIO_SID', 'AC199af5e0e704534d8df940fd07c6c580');
define('TWILIO_TOK', 'c22ba75cef47d4a208aa93eb02779b73');
define('WELCOME_MSG', 'Welcome %name% to Champions for Health. We\'ll send you a weekly text message containing tips, updates, and links to resources which we hope will help you with your challenges. If you\'d prefer not to receive these messages, reply with STOP. All the best, The C4H Team');
define('INACTIVE_TIME', '-1 week');
define('INACTIVE_MSG', '');
define('TIME_FORMAT', 'Y-m-d\TH:i:sP');

class SmsShell extends Shell{

	public function main(){
		$table = TableRegistry::get('Messages');
		$date = new DateTime();
		$query = $table->find()
			->where(['sent' => false, 'type' => SMS, 'scheduled_time <=' => $date->format(TIME_FORMAT)]);

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
			$to = $user->phone_number;
			$name = TableRegistry::get('Users')->get($user->user_id)->username;
			$msg = str_replace('%name%', $name, $message);
			if($to && strlen($to) >= 10){
				try{
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
	}
	
	public function welcome(){
		$tableUsers = TableRegistry::get('Users');
		$query = $tableUsers->find()->where(['received_welcome_sms' => false]);
		$client = new Client(TWILIO_SID, TWILIO_TOK);
		
		foreach($query as $user){
			$profileQuery = TableRegistry::get('Profile')->find()
						->where(['user_id' => $user->id])->first();
			
			foreach($profileQuery as $profile){
				$name = $user->username;
				$to = $profile->phone_number;
				if($to && strlen($to) >= 10){
					try{
						$msg = str_replace('%name%', $name, WELCOME_MSG);
						$client->messages->create(
							$to,
							array('from' => TWILIO_NUM,
								'body' => $msg
							)
						);
						$user->received_welcome_sms = true;
						if(!$tableUsers->save($user)){
							Log::write('error', 'Welcome SMS status failed: ' . $user);
						}
					}catch(Exception $e){
						Log::write('error', 'Welcome SMS failed: ' . $e);
					}
				}
			}
		}
	}
	
	public function inactive(){
		$tableUsers = TableRegistry::get('Users');
		$date = new DateTime();
		$date->modify(INACTIVE_TIME);
		$query = $tableUsers->find()
					->where(['received_inactive_sms' => false, 'last_logged_in <=' => $date->format(TIME_FORMAT)]);
		
		foreach($query as $user){
			$profileQuery = TableRegistry::get('Profile')->find()
							->where(['user_id' => $user->id])->first();
			
			foreach($profileQuery as $profile){
				$to = $profile->phone_number;
				$name = $user->username;
				if($to && strlen($to) >= 10){
					try{
						$msg = str_replace('%name%', $name, INACTIVE_MSG);
						$client->messages->create(
							$to,
							array('from' => TWILIO_NUM,
								'body' => $msg
							)
						);
						$user->received_inactive_sms = true;
						if(!$tableUsers->save($user)){
							Log::write('error', 'Inactive SMS status failed: ' . $user);
						}
					}catch(Exception $e){
						Log::write('error', 'Inactive SMS failed: profile(' . $profile->id . '), phone_number(' . $profile->phone_number . ')');
					}
				}
			}
		}
	}
	
	//Schedule an sms to be sent
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
	
	//Check if account has become active after being inactive.
	public function active(){
		$tableUsers = TableRegistry::get('Users');
		$date = new DateTime();
		$date->modify(INACTIVE_TIME);
		$query = $tableUsers->find()
					->where(['received_inactive_sms' => true, 'last_logged_in >' => $date->format(TIME_FORMAT)]);
		foreach($query as $user){
			$user->received_inactive_sms = false;
			if(!$tableUsers->save($user)){
				Log::write('error', 'Inactive SMS status failed: ' . $user);
			}
		}
	}
}
