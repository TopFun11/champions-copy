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

     public function login()
     {
         if ($this->request->is('post')) {
             $user = $this->Auth->identify();
             if ($user) {
                 $this->Auth->setUser($user);
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
         $this->set('users', $this->Users->find('all'));
     }

     public function view($id)
     {
         $user = $this->Users->get($id);
         $this->set(compact('user'));
     }

     public function add()
     {
        $new = rand(0, 1) == 1;
         $user = $this->Users->newEntity();
         if ($this->request->is('post')) {
             $user = $this->Users->patchEntity($user, $this->request->data);
             if($user){
               if($new && $user->role == "patient"){
                 $user->role = "new patient";
               }
               if ($this->Users->save($user)) {
                   $this->Flash->success(__('The user has been saved.'));
                   return $this->redirect(['action' => 'add']);
               }
               $this->Flash->error(__('Unable to add the user.'));
             }else{
               $this->Flash->error(__('Error validating request'));
             }


         }
         $this->set('user', $user);
     }

 }
