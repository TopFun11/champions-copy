<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Component\AuthComponent;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 */
 class UsersController extends AppController
 {

   public function beforeFilter(Event $event)
     {
         parent::beforeFilter($event);
         // Allow users to register and logout.
         // You should not add the "login" action to allow list. Doing so would
         // cause problems with normal functioning of AuthComponent.
         $this->Auth->allow(['add','logout']);
     }

     public function initialize(){
       parent::initialize();
       $this->loadModel('Profile');
     }

     public function dashboard(){
       $userId = $this->Auth->user("id");
       $user = $this->Users->get($userId, [
         'contain' => ['Module', 'Recordset' => [
           'conditions' => ['not' => ['exercise_id' => 'null']],
           'Exercise' => ['Sections' => ['Sections' => [
             'conditions' => ['not' => ['section_id' => null]]
           ], 'Module']]]
         ]
       ]);
       $profile = $this->Profile->find("all")->where(['user_id' => $this->Auth->user("id")])->first();
       // Build up stats on engagement
       $engagement = [];
       foreach($user->recordset as $rs) {
           $mod = $rs->exercise->section->module;
           $modId = ($mod == null || $mod->id == null) ? 0 : $mod->id;
           isset($engagement[$modId]) ? $engagement[$modId]['count'] ++ : $engagement[$modId]['count'] = 1;
           // Wellbeing module is hard-coded in (bad!) because it's the only module that is set up in such a way that it will return a null title
           // @TODO: Find a better way of doing this...
           $engagement[$modId]['title'] = isset($mod->title)?$mod->title:"Wellbeing";
           $engagement[$modId]['colour'] = [
               ord($engagement[$modId]['title'][2])*$modId%32,
               ord($engagement[$modId]['title'][4])*$modId%255,
               ord($engagement[$modId]['title'][6])*$modId%255
           ];
       }

       $this->set('profile',    $profile);
       $this->set('user',       $user);
       $this->set('engagement', $engagement);
     }

     public function login()
     {
         if ($this->request->is('post')) {
             $user = $this->Auth->identify();
             if ($user) {
                 $this->Auth->setUser($user);

                 $userId = $this->Auth->user("id");
                 $userO = $this->Users->get($userId);
                 $userO->last_logged_in = date('Y-m-d H:i:s');

                 $profile = $this->Profile->find("all")->where(['user_id' => $userId])->first();
                 $this->Users->save($userO);

                 if(!$profile){
                   return $this->redirect(["action" => 'add', 'controller' => 'profile']);
                 }

                 $profile->points = $profile->points + 1;
                 $profile->logon = $profile->logon + 1;
                 $this->Profile->save($profile);

                 return $this->redirect($this->Auth->redirectUrl());
             }
             $this->Flash->error(__('Invalid username or password, try again'));
         }
     }

     public function logout()
     {
         return $this->redirect($this->Auth->logout());
     }

      public function index()
      {
         if($this->Auth->user('role') !=  "admin"){
             $this->Flash->Error("You are not authorised to view this section");
             return $this->redirect(["action" => "", "controller" => "pages"]);
         }
         $this->set('users', $this->Users->find('all'));
     }

     public function view($id)
     {
         if($this->Auth->user('role') !=  "admin"){
             $this->Flash->Error("You are not authorised to view this section");
             return $this->redirect(["action" => "", "controller" => "pages"]);
         }
         $user = $this->Users->get($id);
         $this->set(compact('user'));
     }

     public function add()
     {
        $new = rand(0, 1) == 1;
         $user = $this->Users->newEntity();
         if ($this->request->is('post')) {
           //die(var_dump($this->request->data));
             $user = $this->Users->patchEntity($user, $this->request->data);

             if(!$this->request->data['consent']){
               $this->Flash->error(__("You must consent in order to use this website."));
               //$this->set('user', $user);
               return;
             }

             if($user){
               if($new && $user->role == "student"){
                 $user->role = "new student";
               }

               $result = $this->Users->save($user);
               if ($result) {
                   $this->Flash->success(__('The user has been saved.'));
                   return $this->redirect(['action' => 'login']);
               }
               $this->Flash->error(__('Unable to add the user.' . var_dump($result)));

             }else{
               $this->Flash->error(__('Error validating request'));
             }


         }
         $options = [];
         if($this->Auth->user("role") == "admin"){
           $options = ['admin' => 'Admin', 'student' => 'Student'];
         }else{
           $options = ['admin' => 'Admin','student' => 'Student'];
         }
         $this->set('user', $user);
         $this->set('options', $options);
         $user->engage = 0;
         $user->engageCheck = false;
     }
  
  public function delete($id)  
  {
    if($this->Auth->user('role') !=  "admin"){
        $this->Flash->Error("You are not authorised to view this section");
        return $this->redirect(["action" => "", "controller" => "pages"]);
    }
  $this->request->allowMethod(['post','delete']);
    $user = $this->Users->get($id);
   if ($this->Users->delete($user)){
                   $this->Flash->success(__('The user with id: {0} has been deleted', $user->id));
    return $this->redirect(['action'=>'index']);
   }
 //  $result = $this->Users->delete($user);
   
  }
  
    // Protected because it allows you to edit users other than current logged in user
    public function edit()
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }
        $id = (int) $this->request->params['pass'][0];
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your user has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
            $this->Flash->error(__('Unable to update.'));
        }
        $this->set('user', $user);
    }

 }
