<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormularOperators Controller
 *
 * @property \App\Model\Table\FormularOperatorsTable $FormularOperators
 */
class FormularOperatorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Formular']
        ];
        $formularOperators = $this->paginate($this->FormularOperators);

        $this->set(compact('formularOperators'));
        $this->set('_serialize', ['formularOperators']);
    }

    public function moveUp($id = null){
      $var = $this->FormularOperators->get($id);
        if($var->orderNumber < 1){
          $this->Flash->error(__('Could not move the position up'));
          return $this->redirect(['action' => 'index']);
        }

        $var->orderNumber = $var->orderNumber - 1;
        $chngVar = $this->FormularOperators->find()->where(["formular_id" => $var->formular_id, 'orderNumber' => $var->orderNumber])->first();

        if ($this->FormularOperators->save($var)) {
          if($chngVar != null){

            $chngVar->orderNumber = $chngVar->orderNumber + 1;
            if($this->FormularOperators->save($chngVar)){
              $this->Flash->success(__('Possion moved up'));
              return $this->redirect(['action' => 'index']);
            }
          }else{
              return $this->redirect(['action' => 'index']);
          }
      }
    }

    public function moveDown($id = null){
      $var = $this->FormularOperators->get($id);
      $vars = $this->FormularOperators->find()->where(['formular_id' => $var->formular_id])->all();
      if($var->orderNumber > count($vars)){
        $this->Flash->error(__('Could not move the position down'));
        return $this->redirect(['action' => 'index']);
      }
      $var->orderNumber = $var->orderNumber + 1;
      $chngVar = $this->FormularOperators->find()->where(["formular_id" => $var->formular_id, 'orderNumber' => $var->orderNumber])->first();

      if ($this->FormularOperators->save($var)) {
        if($chngVar != null){
          $chngVar->orderNumber = $chngVar->orderNumber - 1;
          if($this->FormularOperators->save($chngVar)){
            $this->Flash->success(__('Possion moved down'));
            return $this->redirect(['action' => 'index']);
          }
        }else{
            return $this->redirect(['action' => 'index']);
        }
      }
    }

    /**
     * View method
     *
     * @param string|null $id Formular Operator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formularOperator = $this->FormularOperators->get($id, [
            'contain' => ['Formular']
        ]);

        $this->set('formularOperator', $formularOperator);
        $this->set('_serialize', ['formularOperator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formularOperator = $this->FormularOperators->newEntity();
        if ($this->request->is('post')) {
            $formularOperator = $this->FormularOperators->patchEntity($formularOperator, $this->request->data);
            $count = $this->FormularOperators->find()->where(['formular_id' => $formularOperator->formular_id])->all();
            $formularOperator->orderNumber = count($count);
            if ($this->FormularOperators->save($formularOperator)) {
                $this->Flash->success(__('The formular operator has been saved.' . count($count) . ' ' . $formularOperator->formular_id));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formular operator could not be saved. Please, try again.'));
            }
        }
        $formular = $this->FormularOperators->Formular->find('list', ['limit' => 200]);
        $this->set(compact('formularOperator', 'formular'));
        $this->set('_serialize', ['formularOperator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formular Operator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formularOperator = $this->FormularOperators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formularOperator = $this->FormularOperators->patchEntity($formularOperator, $this->request->data);
            if ($this->FormularOperators->save($formularOperator)) {
                $this->Flash->success(__('The formular operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formular operator could not be saved. Please, try again.'));
            }
        }
        $formular = $this->FormularOperators->Formular->find('list', ['limit' => 200]);
        $this->set(compact('formularOperator', 'formular'));
        $this->set('_serialize', ['formularOperator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formular Operator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formularOperator = $this->FormularOperators->get($id);
        if ($this->FormularOperators->delete($formularOperator)) {
            $this->Flash->success(__('The formular operator has been deleted.'));
        } else {
            $this->Flash->error(__('The formular operator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
