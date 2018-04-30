<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Screener Controller
 *
 * @property \App\Model\Table\ScreenerTable $Screener
 */
class ScreenerController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function ajaxadd(){
      if($this->Auth->user('role') !=  "admin"){
          $this->Flash->Error("You are not authorised to view this section");
          return $this->redirect(["action" => "", "controller" => "pages"]);
      }
      $screener = $this->Screener->newEntity();
      if ($this->request->is('post')) {
          $screener = $this->Screener->patchEntity($screener, $this->request->data);
          if ($this->Screener->save($screener)) {
              $this->Flash->success(__('The screener has been saved.'));

              return $this->redirect(['action' => 'index']);
          } else {
              $this->Flash->error(__('The screener could not be saved. Please, try again.'));
          }
      }
      $module = $this->Screener->Module->find('list', ['limit' => 200]);
      $this->set(compact('screener', 'module'));
      $this->set('_serialize', ['screener']);
    }




    /**
     * View method
     *
     * @param string|null $id Screener id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $screener = $this->Screener->get($id, [
            'contain' => ['Module']
        ]);

        $this->set('screener', $screener);
        $this->set('_serialize', ['screener']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        if($this->Auth->user('role') !=  "admin"){
          $this->Flash->Error("You are not authorised to view this section");
          return $this->redirect(["action" => "", "controller" => "pages"]);
        }

        $screener = $this->Screener->newEntity();
        if($id == null){
          throw new NotFoundException("Module not found");
          return;
        }

        if ($this->request->is('post')) {
            $screener = $this->Screener->patchEntity($screener, $this->request->data);
            $screener->module_id = $id;
            if ($this->Screener->save($screener)) {
                $this->Flash->success(__('The screener has been saved.'));
                if(!$this->request->is('ajax')) {
                  return $this->redirect(['action' => 'index']);
                }
                //Ajax stuff Here
                $this->set(compact('screener'));
                $this->set('_serialize', ['screener']);
            } else {
                $this->Flash->error(__('The screener could not be saved. Please, try again.'));
            }
        }

        $moduleid = $id;
        $this->set(compact('screener', 'moduleid'));
        $this->set('_serialize', ['screener']);
    }
    public function index()
    {
      if($this->Auth->user('role') !=  "admin"){
          $this->Flash->Error("You are not authorised to view this section");
          return $this->redirect(["action" => "", "controller" => "pages"]);
      }
      $this->paginate = [
        'contain' => ['Module']
      ];
      $screener = $this->paginate($this->Screener);

      $this->set(compact('screener'));
      $this->set('_serialize', ['screener']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Screener id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }
        $screener = $this->Screener->get($id, [
            'contain' => ['Question']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $screener = $this->Screener->patchEntity($screener, $this->request->data);
            if ($this->Screener->save($screener)) {
                $this->Flash->success(__('The screener has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The screener could not be saved. Please, try again.'));
            }
        }
        $module = $this->Screener->Module->find('list', ['limit' => 200]);
        $questions = $this->Screener->Question->find()->where(['screener_id'=>(int)$id]);
        $this->set(compact('screener', 'module', 'questions'));
        $this->set('_serialize', ['screener']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Screener id.
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
        $screener = $this->Screener->get($id);
        if ($this->Screener->delete($screener)) {
            $this->Flash->success(__('The screener has been deleted.'));
        } else {
            $this->Flash->error(__('The screener could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
