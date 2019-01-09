<?php
namespace App\Controller;

use App\Controller\AppController;
// In a controller or table method.
use Cake\ORM\TableRegistry;
use Cake\Controller\Component\AuthComponent;

/**
 * Module Controller
 *
 * @property \App\Model\Table\ModuleTable $Module
 */
class ModuleController extends AppController
{
    public function initialize() {
      parent::initialize();
      $this->loadModel("Sections");
      $this->loadModel("Recordset");
      $this->loadModel("Screener");
      $this->loadModel("Enrollment");
      $this->loadModel("Exercise");
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if($this->Auth->user('role') !=  "admin"){
          $this->Flash->Error("You are not authorised to view this section");
          return $this->redirect(["action" => "", "controller" => "pages"]);
        }
        $module = $this->paginate($this->Module);

        $this->set(compact('module'));
        $this->set('_serialize', ['module']);
    }

    /**
     * Explore method
     *
     * @return \Cake\Network\Response|null
     */
    public function explore()
    {
        $userRole = $this->Auth->user('role');
        if($userRole == "student"){
          $module = $this->Module->find("all", [
            'conditions' => [
              'not' => [
                'required_role' => 'new student'
              ]
            ],
          ]);
        }else{
          $module = $this->Module->find("all");
        }

        $userId = $this->Auth->user("id");
        $module
          ->select($this->Module)
          ->select(['enrolled' => $module->func()->count('Users.id')])
          ->leftJoinWith('Users', function ($q) use ($userId) {
              return $q->where(['Users.id' => $userId]);
          })
          ->group(['Module.id']);

        $this->set(compact('module'));
        $this->set('_serialize', ['module']);
    }

    /**
    * View method
    *
    * @param string|null $id Module id.
    * @return \cake\Network\Response\null
    * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found.
    */
    public function view($id = null){
      $module = $this->Module->get($id, [
        'contain' => ['Sections', 'Users']
      ]);
      $userRole = $this->Auth->user('role');
      if($module->required_role == "new student"){
        if($userRole != "new student"){
            return $this->redirect(["action" => "explore", "controller" => "module"]);
        }
      }
      $this->set('module', $module);
      $this->set('_serialize', ['module']);
    }

    /**
     * Dashboard method
     *
     * @param string|null $id Module id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function Dashboard($id = null)
    {
        $userId = $this->Auth->user("id");
        $module = $this->Module->get($id, [
            'contain' => ['Users']
        ]);

        $sections = $this->Sections->find("all")->where(["module_id" => $module->id]);

        foreach($sections as $section){
          $section->sections = $this->Sections->find("all")->where(['section_id' => $section->id]);
          $section->exercises = $this->Exercise->find("all", ['contain' => ['Recordset' => ["conditions" => ["user_id" => $userId], 'Record'],'Question'=>['QuestionOption']]])->where(['section_id' => $section->id])->first();
          foreach ($section->sections as $subsec) {
            $subsec->sections = $this->Sections->find("all")->where(['section_id' => $subsec->id]);
            $subsec->exercises = $this->Exercise->find("all", ['contain' => ['Recordset' => ['Record'],'Question'=>['QuestionOption']]])->where(['section_id' => $subsec->id])->first();
            foreach ($subsec->sections as $subsubsec) {
              $subsubsec->sections = $this->Sections->find("all")->where(['section_id' => $subsubsec->id]);
              $subsubsec->exercises = $this->Exercise->find("all", ['contain' => ['Recordset' => ['Record'], 'Question'=>['QuestionOption']]])->where(['section_id' => $subsubsec->id])->first();
            }
          }
        }

        $module->sections = $sections;

        $this->set('module', $module);
        $this->set('_serialize', ['module']);
        if($module->theme != ""){
          $this->render("dashboard-yoga");
        }
    }

    /**
     * Overview method
     *
     * @param string|null $id Module id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function Overview($id = null)
    {
        $userRole = $this->Auth->user('role');
        $module = $this->Module->get($id, [
            'contain' => ['Sections', 'Users']
        ]);
        $userId = $this->Auth->user('id');
        $enrollment = TableRegistry::get("userenrollment");
        $enrolled = $enrollment->find("all")->where(['user_id' => $userId, 'module_id'=>$module->id])->first();

        if($enrolled){
          return $this->redirect(["action" => "dashboard/".$module->id, "controller" => "module"]);
        }

        if($module->required_role == "new student"){
          if($userRole != "new student"){
              return $this->redirect(["action" => "explore", "controller" => "module"]);
          }
        }

        $this->set('module', $module);
        $this->set('_serialize', ['module']);
    }

    public function enroll($id = null){
      $userRole = $this->Auth->user('role');
      $userId = $this->Auth->user('id');
      $module = $this->Module->get($id, ['contain' => ['Screener']]);
      if(!$module){
        throw new NotFoundException(__("Module not found."));
      }

      if($module->required_role == "new student"){
        if($userRole != "new student"){
            return $this->redirect(["action" => "explore", "controller" => "module"]);
        }
      }
      if($module->screener){
        $recordset = $this->Recordset->find('all')->where(["user_id" => $userId, "screener_id" => $module->screener->id])->first();
        if(!$recordset){
          return $this->redirect(["controller" => 'recordset', 'action' => 'screener/'.$module->screener->id]);
        }
      }
      $enrollment = TableRegistry::get("userenrollment");
      $enrolled = $enrollment->find("all")->where(['user_id' => $userId, 'module_id'=>$module->id])->first();
      if(!$enrolled){
        $enroll = $enrollment->newEntity();
        $enroll->module_id = $module->id;
        $enroll->user_id = $userId;
        if($enrollment->save($enroll)){
          return $this->redirect(["controller" => "module", "action" => "dashboard/".$module->id]);
        }
      }else{
        return $this->redirect(["controller" => "module", "action" => "dashboard/".$module->id]);
      }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user('role') !=  "admin"){
          $this->Flash->Error("You are not authorised to view this section");
          return $this->redirect(["action" => "", "controller" => "pages"]);
        }
        $module = $this->Module->newEntity();
        if ($this->request->is('post')) {
            $module = $this->Module->patchEntity($module, $this->request->data);
            $result = $this->Module->save($module);
            if ($result) {
                $this->Flash->success(__('The module has been saved.'));

                return $this->redirect(["controller" => "Module",'action'=>'edit/'.$result->id]);
            } else {
                $this->Flash->error(__('The module could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('module'));
        $this->set('_serialize', ['module']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Module id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      //#Done:10 Ensure Screeners are being loaded as data within this controller
      $module = $this->Module->get($id, [
          'contain' => ["Screener" => ['Question' => ['QuestionOption']]]
      ]);

      if($this->Auth->user('role') !=  "admin"){
        $this->Flash->Error("You are not authorised to view this section");
        return $this->redirect(["action" => "", "controller" => "pages"]);
      }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $module = $this->Module->patchEntity($module, $this->request->data);
            //die(var_dump($module));
            $result = $this->Module->save($module);
            if ($result) {
                $this->Flash->success(__('The module has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The module could not be saved. Please, try again.'));
            }
        }
        $sections = $this->Sections->find('all')->where(["module_id"=>$module->id,"section_id IS" =>NULL]);
        foreach($sections as $section) {
          $temp = $this->Sections->find("all")->where(["section_id"=>$section->id]);
          $section->sections=$temp;
        }
        $module->sections=$sections;
        $this->set(compact('module'));
        $this->set('_serialize', ['module']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Module id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      if($this->Auth->user('role') !=  "admin"){
        $this->Flash->Error("You are not authorised to view this section");
        return $this->redirect(["action" => "", "controller" => "pages"]);
      }
        $this->request->allowMethod(['post', 'delete']);
        $module = $this->Module->get($id);
        if ($this->Module->delete($module)) {
            $this->Flash->success(__('The module has been deleted.'));
        } else {
            $this->Flash->error(__('The module could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function unenroll($id = null){
      $userId = $this->Auth->user('id');
      $module = $this->Module->get($id, ['contain' => ['Screener']]);
      if(!$module){
        throw new NotFoundException(__("Module not found."));
      }
      $enrollment = TableRegistry::get("userenrollment");
      $enrolled = $enrollment->find("all")->where(['user_id' => $userId, 'module_id'=>$module->id])->first();
      if(!$enrolled){
        $this->Flash->Error("You are not enrolled on this module");
      }
      $this->request->allowMethod(['post', 'delete']);
      if ($this->Enrollment->delete($enrolled)) {
        $this->Flash->success(__('You have successfully unenrolled from this module.'));
      } else {
        $this->Flash->error(__('You have been unable to unenroll. Please try again.'));
      }
      return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);                      
    }
}
