<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sections Controller
 *
 * @property \App\Model\Table\SectionsTable $Sections
 */
class SectionsController extends AppController
{


    public function initialize(){
      parent::initialize();

      $this->loadModel("Module");
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

        $this->paginate = [
            'conditions' => ["not"=>['Sections.module_id IS'=>null]]
        ];

        $sections = $this->paginate($this->Sections);
        foreach($sections as $section) {
          $subsections = $this->Sections->find("all")->where(["section_id"=>$section->id]);
          $section->sections=$subsections;
        }

        $this->set(compact('sections'));
        $this->set('_serialize', ['sections']);
    }

    /**
     * View method
     *
     * @param string|null $id Section id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }

        $section = $this->Sections->get($id, [
            'contain' => ['Module']
        ]);
        $sections = $this->Sections->find("all")->where(['section_id' => $section->id]);
        $section->sections = $sections;
        $this->set('section', $section);
        $this->set('_serialize', ['section']);
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

        $section = $this->Sections->newEntity();
        if ($this->request->is('post')) {
            $section = $this->Sections->patchEntity($section, $this->request->data);
            if ($this->Sections->save($section)) {
                $this->Flash->success(__('The section has been saved.'));
                if(!$this->request->is('ajax')) {
                  return $this->redirect(['action' => 'index']);
                }
                $this->set(compact('section', 'module'));
                $this->set('_serialize', ['section']);
            } else {
                $this->Flash->error(__('The section could not be saved. Please, try again.'));
            }
        }

        $sections = $this->Sections->find('all', ['limit' => 200]);
        $module = $this->Module->find('all', ['limit' => 200]);
        $this->set(compact('section', 'module', 'sections'));
        $this->set('_serialize', ['section','module', 'sections']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Section id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }

        $section = $this->Sections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $section = $this->Sections->patchEntity($section, $this->request->data);
            if ($this->Sections->save($section)) {
                $this->Flash->success(__('The section has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The section could not be saved. Please, try again.'));
            }
        }
        $sections = $this->Sections->find('all', ['limit' => 200]);
        $module = $this->Module->find('all', ['limit' => 200]);
        $this->set(compact('section', 'module', 'sections'));
        $this->set('_serialize', ['section','module', 'sections']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Section id.
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
        $section = $this->Sections->get($id);
        if ($this->Sections->delete($section)) {
            $this->Flash->success(__('The section has been deleted.'));
        } else {
            $this->Flash->error(__('The section could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
