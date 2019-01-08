<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
use Cake\ORM\TableRegistry;

/**
 * Homepage Controller
 *
 */
class HomeController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->modelClass = false;
        $this->loadModel("Module");

        $this->Auth->allow(['index']);
    }

    public function index() {
        $this->viewBuilder()->template("/Pages/home");
        
        $userId = $this->Auth->user("id");
        $module = TableRegistry::get('Module')->find("all");
        
        $module
            ->select($this->Module)
            ->select(['enrolled' => $module->func()->count('Users.id')])
            ->leftJoinWith('Users', function ($q) use ($userId) {
                if ($userId) {
                    return $q->where(['Users.id' => $userId]);
                } else {
                    return $q;
                }
            })
            ->group(['Module.id']);
        
        $profile = $this->Profile->find("all")->where(['user_id' => $this->Auth->user("id")])->first();
        $user= $this->Users->find("all")->where(['id' => $this->Auth->user("id")])->first();
        $this->set('profile', $profile);
        $this->set('user', $user);
        $this->set(compact('module'));
        $this->set('_serialize', ['module', 'profile', 'user']);
    }
}
