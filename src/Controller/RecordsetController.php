<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recordset Controller
 *
 * @property \App\Model\Table\RecordsetTable $Recordset
 */
class RecordsetController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Screener']
        ];
        $recordset = $this->paginate($this->Recordset);

        $this->set(compact('recordset'));
        $this->set('_serialize', ['recordset']);
    }

    /**
     * View method
     *
     * @param string|null $id Recordset id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recordset = $this->Recordset->get($id, [
            'contain' => ['Screener']
        ]);

        $this->set('recordset', $recordset);
        $this->set('_serialize', ['recordset']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recordset = $this->Recordset->newEntity();
        if ($this->request->is('post')) {
            $recordset = $this->Recordset->patchEntity($recordset, $this->request->data);
            if ($this->Recordset->save($recordset)) {
                $this->Flash->success(__('The recordset has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recordset could not be saved. Please, try again.'));
            }
        }
        $screener = $this->Recordset->Screener->find('list', ['limit' => 200]);
        $this->set(compact('recordset', 'screener'));
        $this->set('_serialize', ['recordset']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recordset id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recordset = $this->Recordset->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recordset = $this->Recordset->patchEntity($recordset, $this->request->data);
            if ($this->Recordset->save($recordset)) {
                $this->Flash->success(__('The recordset has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recordset could not be saved. Please, try again.'));
            }
        }
        $screener = $this->Recordset->Screener->find('list', ['limit' => 200]);
        $this->set(compact('recordset', 'screener'));
        $this->set('_serialize', ['recordset']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recordset id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recordset = $this->Recordset->get($id);
        if ($this->Recordset->delete($recordset)) {
            $this->Flash->success(__('The recordset has been deleted.'));
        } else {
            $this->Flash->error(__('The recordset could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
