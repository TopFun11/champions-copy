<?php
//TODO: Comments and tidy
namespace App\Shell;
use \DateTime;

use Cake\Console\Shell;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

define('EMAIL', 0);
define('ADDRESS', 'champforhealth@gmail.com');
define('NAME', 'Champions for Health');
define('WELCOME_SUBJECT', 'Welcome to Champions for Health!');
define('INACTIVE_SUBJECT', 'We Miss You @ Champions for Health');
define('INACTIVE_TIME', '-1 week');
define('TIME_FORMAT', 'Y-m-d\TH:i:sP');

class EmailShell extends Shell{

	//Send all scheduled emails.
	public function main(){
		$msgTable = TableRegistry::get('Messages');
		$date = new DateTime();
		$query = $msgTable->find()
			->where(['sent' => false, 'type' => EMAIL, 'scheduled_time <=' => $date->format(TIME_FORMAT)]);

		foreach($query as $msg){
			try{
				$this->msg($msg->subject, $msg->content);
				$msg->sent = true;
				if(!$msgTable->save($msg)){
					Log::write('error', 'Sent email status failed: ' . $msg);
				}
			} catch (Exception $e) {
				Log::write('error', 'Email failed: ' . $msg);
			}
		}
	}

	public function msg($subject = 'Champions for Health', $message = ' '){
		$profileTable = TableRegistry::get('Profile');
		$query = $profileTable->find()
				->where(['unsubscribed' => false]);

		foreach($query as $profile){
			$address = $profile->email;
			$name = TableRegistry::get('Users')->get($profile->user_id)->username;
			if(filter_var($address, FILTER_VALIDATE_EMAIL)){
				try{
					$email = new Email('default');
					$email->template('unsubscribe', 'default')
						->emailFormat('html')
						->viewVars(['content' => $message, 'title' => $subject,
								'name' => $name, 'address' => $address, 'unsub' => 'http://champions-for-health.swansea.ac.uk/profile'])
						->from([ADDRESS => NAME])
						->to($address)
						->subject($subject)
						->send();
				}catch(Exception $e){
					Log::write('error', 'Email failed: profile(' . $profile->id . '), address(' . $profile->email . ')');
				}
			}
		}
    }

	public function welcome(){
		$tableUsers = TableRegistry::get('Users');
		$query = $tableUsers->find()->where(['received_welcome_email ' => false]);
		
		foreach($query as $user){
			$profile = TableRegistry::get('Profile')->find()->where(['user_id' => $user->id])->first();
			$name = $user->username;
			$address = $profile->email;
			if(filter_var($address, FILTER_VALIDATE_EMAIL)){
				try{
					$email = new Email('default');
					$email->template('welcome', 'default')
						->emailFormat('html')
						->viewVars(['title' => WELCOME_SUBJECT, 'content' => '', 'name' => $name, 'unsub' => 'http://champions-for-health.swansea.ac.uk/profile'])
						->from([ADDRESS => NAME])
						->to($address)
						->subject(WELCOME_SUBJECT)
						->send();
						
					$user->received_welcome_email = true;
					if(!$tableUsers->save($user)){
						Log::write('error', 'Welcome email status failed: ' . $user);
					}
				}catch(Exception $e){
					Log::write('error', 'Welcome Email failed: profile(' . $profile->id . '), address(' . $profile->email . ')');
				}
			}
		}
	}
	
	public function inactive(){
		$tableUsers = TableRegistry::get('Users');
		$date = new DateTime();
		$date->modify(INACTIVE_TIME);
		$query = $tableUsers->find()
					->where(['received_inactive_email' => false, 'last_logged_in <=' => $date->format(TIME_FORMAT)]);
		
		foreach($query as $user){
			$profile = TableRegistry::get('Profile')->find()
							->where(['user_id' => $user->id])->first();
			
			$address = $profile->email;
			$name = $user->username;
			if(filter_var($address, FILTER_VALIDATE_EMAIL)){
				try{
					$email = new Email('default');
					$email->template('inactive', 'default')
						->emailFormat('html')
						->viewVars(['content' => '', 'title' => INACTIVE_SUBJECT,
									'name' => $name, 'address' => $address, 'unsub' => 'http://champions-for-health.swansea.ac.uk/profile'])
						->from([ADDRESS => NAME])
						->to($address)
						->subject(INACTIVE_SUBJECT)
						->send();
					$user->received_inactive_email = true;
					if(!$tableUsers->save($user)){
						Log::write('error', 'Inactive email status failed: ' . $user);
					}
				}catch(Exception $e){
					Log::write('error', 'Inactive Email failed: profile(' . $profile->id . '), address(' . $profile->email . ')');
				}
			}
		}
	}
	
	//Schedule an email to be sent
	//Time Format: mm/dd/yyyyThh:mm:ss
	public function schedule($subject = 'Champions for Health', $message = '', $time){
		$date = new DateTime($time);
		$date = $date->format('Y-m-d H:i:s');
		$msgTable = TableRegistry::get('Messages');
		$newMsg = $msgTable->newEntity();

		$newMsg->type = EMAIL;
		$newMsg->subject = $subject;
		$newMsg->content = $message;
		$newMsg->sent = false;
		$newMsg->scheduled_time = $date;

		if(!$msgTable->save($newMsg)){
			Log::write('error', 'Email schedule fail: ' . $newMsg);
		}
	}
	
	//Check if account has become active after being inactive.
	public function active(){
		$tableUsers = TableRegistry::get('Users');
		$date = new DateTime();
		$date->modify(INACTIVE_TIME);
		$query = $tableUsers->find()
					->where(['received_inactive_email' => true, 'last_logged_in >' => $date->format(TIME_FORMAT)]);
		foreach($query as $user){
			$user->received_inactive_email = false;
			if(!$tableUsers->save($user)){
				Log::write('error', 'Inactive email status failed: ' . $user);
			}
		}
	}
}
