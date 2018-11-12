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

        $this->set(compact('module'));
        $this->set('_serialize', ['module']);
    }
}
