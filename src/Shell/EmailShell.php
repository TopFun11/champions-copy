<?php
namespace App\Shell;
use \DateTime;

use Cake\Console\Shell;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

define('EMAIL', 0);
define('ADDRESS', 'champforhealth@gmail.com');

class EmailShell extends Shell{

	//Send all scheduled emails.
	public function main(){
		$table = TableRegistry::get('Messages');
		$date = new DateTime();
		$query = $table->find()
			->where(['sent' => false, 'type' => EMAIL, 'scheduled_time <=' => $date->format('Y-m-d\TH:i:sP')]);

		foreach($query as $msg){
			try{
				$this->msg($msg->subject, $msg->content);
				$msg->sent = true;
				$table->save($msg);
			} catch (Exception $e) {
				Log::write('error', 'Email failed: ' . $msg);
			}
		}
	}

	public function msg($subject = 'Champions for Health', $message = ' '){
		$table = TableRegistry::get('Profile');
		$query = $table->find()
				->where(['unsubscribed' => false]);

		foreach($query as $user){
			try{
				$address = $user->email;
				$name = TableRegistry::get('Users')->get($user->user_id)->username;
				$email = new Email('default');
				$email->template('unsubscribe', 'default')
					->emailFormat('html')
					->viewVars(['content' => $message, 'title' => $subject,
							'name' => $name, 'address' => $address, 'unsub' => 'Unsub Link'])
					->from([ADDRESS => 'Champions for Health'])
					->to($address)
					->subject($subject)
					->send();
			}catch(Exception $e){
				Log::write('error', 'Email failed: profile(' . $user->id . '), address(' . $user->email . ')');
			}
		}
    }

	public function welcome(){
		$tableUsers = TableRegistry::get('Users');
		$date = new DateTime();
		$date->modify('-10 minutes');
		$query = $tableUsers->find()->where(['created >=' => $date->format('Y-m-d\TH:i:sP')]);
		
		foreach($query as $user){
			$profile = TableRegistry::get('Profile')->find()->where(['user_id' => $user->id])->first();
			$name = $user->username;
			$address = $profile->email;
			
			$email = new Email('default');
			$email->template('welcome', 'default')
				->emailFormat('html')
				->viewVars(['title' => 'Welcome to Champions for Health!', 'content' => '', 'name' => $name, 'unsub' => 'Unsub Link'])
				->from([ADDRESS => 'Champions for Health'])
				->to($address)
				->subject('Welcome to Champions for Health!')
				->send();
		}
	}
	
	public function inactive(){
		//TODO: Message when inactive, needs DB.
	}
	
	//Time Format: mm/dd/yyyyThh:mm:ss
	public function schedule($subject = 'Champions for Health', $message = '', $time){
		$date = new DateTime($time);
		$date = $date->format('Y-m-d H:i:s');
		$table = TableRegistry::get('Messages');
		$newMsg = $table->newEntity();

		$newMsg->type = EMAIL;
		$newMsg->subject = $subject;
		$newMsg->content = $message;
		$newMsg->sent = false;
		$newMsg->scheduled_time = $date;

		if(!$table->save($newMsg)){
			Log::write('error', 'Email schedule fail: ' . $newMsg);
		}
	}
}
