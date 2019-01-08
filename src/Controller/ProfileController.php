<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
use Cake\Core\App;
use Cake\Network\Exception\NotFoundException;
/**
 * Profile Controller
 *
 * @property \App\Model\Table\ProfileTable $Profile
 */
class ProfileController extends AppController
{
    public function initialize()
    {
      parent::initialize();
      $this->loadModel("Users");
      $this->loadModel("Recordset");
      $this->loadModel("Record");
      $this->loadModel("Exercise");
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $profile = $this->paginate($this->Profile);

        $this->set(compact('profile'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $id = $this->Auth->user("id");
        $profile = $this->Profile->find("all")->where(['user_id' => $this->Auth->user("id")])->first();
        $user= $this->Users->find("all")->where(['id' => $this->Auth->user("id")])->first();
        
        $record = $this->Record->get($id, [
            'contain' => ['Recordset']
        ]);
        $this->set('record', $record);

        $this->set('profile', $profile);
        $this->set('user', $user);
        $this->set('_serialize', ['profile', 'user', 'record']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profile = $this->Profile->find("all")->where(['user_id' => $this->Auth->user("id")])->first();
        if(!$profile){
          $profile = $this->Profile->newEntity();
        }else{
          return $this->redirect(["action" => 'edit']);
        }
        if ($this->request->is('post')) {
            $profile = $this->Profile->patchEntity($profile, $this->request->data);

            $profile->user_id = $this->Auth->user("id");
            $profile->image = "default/path.jpg";
            $profile->points = 0;
            $profile->login = 1;
            if ($this->Profile->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'home', 'controller' => 'pages']);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }
        $users = $this->Profile->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'users'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
      $profile = $this->Profile->find("all")->where(['user_id' => $this->Auth->user("id")])->first();
      $user= $this->Users->find("all")->where(['id' => $this->Auth->user("id")])->first();
      if(!$profile){
        throw new NotFoundException("User profile not found");
      }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Profile->patchEntity($profile, $this->request->data);
            if ($this->Profile->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }
        $users = $this->Profile->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'users'));
        $this->set('user', $user);
        $this->set('_serialize', ['profile', 'user']);
    }
    
    public function editPersonal()
    {
      $profile = $this->Profile->find("all")->where(['user_id' => $this->Auth->user("id")])->first();
      $user= $this->Users->find("all")->where(['id' => $this->Auth->user("id")])->first();
      if(!$profile){
        throw new NotFoundException("User profile not found");
      }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Profile->patchEntity($profile, $this->request->data);
            if ($this->Profile->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));
                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }
        $users = $this->Profile->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'users'));
        $this->set('user', $user);
        $this->set('_serialize', ['profile', 'user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profile = $this->Profile->get($id);
        if ($this->Profile->delete($profile)) {
            $this->Flash->success(__('The profile has been deleted.'));
        } else {
            $this->Flash->error(__('The profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
