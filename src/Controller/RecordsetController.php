<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;

/**
 * Recordset Controller
 *
 * @property \App\Model\Table\RecordsetTable $Recordset
 */
class RecordsetController extends AppController
{

  public function initialize(){
    parent::initialize();
    $this->loadModel('Screener');
    $this->loadModel('Exercise');
    $this->loadModel('Record');
    $this->loadModel('Profile');
  }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];
        $recordset = $this->paginate($this->Recordset);

        $this->set(compact('recordset'));
        $this->set('_serialize', ['recordset']);
    }

    /**
     * Screener method
     *
     * @param string|null $id Screener id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function screener($id = null)
    {
      $recordset = $this->Recordset->newEntity();
      $data = $this->Recordset->newEntity();
      $screener = $this->Screener->get($id, [
          'contain' => [
            'Module',
            'Question' => [
              'QuestionOption'
            ]]
      ]);
      if($this->request->is("post")){
        //Put request data in to data oject
        $data = $this->Recordset->patchEntity($data, $this->request->data);
        $recordset->screener_id = $data->screener_id;
        $recordset->user_id = $this->Auth->user('id');
        $recordset->created = date('Y-m-d H:i:s');
        $recordset->modified = date('Y-m-d H:i:s');
        //Saving record set
        $rsetResult = $this->Recordset->save($recordset);
        $recId = $rsetResult->id;
        if(!$rsetResult){
          //If we couldn't save
          $this->Flash->error(__('There was a problem submitting your data, please try again.'));
          return $this->redirect(["controller" => "users","action" => 'dashboard']);
        }
        foreach ($screener->question as $question) {
            $record = $this->Record->newEntity();
            $record->recordset_id = $recId;
            $record->question_id = $question->id;
            //Horrible magic number that asks is the question type not multiple choice
            if($question->type != 2){
                $record->answer = $data->answer[$question->id];
                //Save the record
                if(!$this->Record->save($record)){
                  $this->Flash->error(__('There was a problem submitting your data, please try again.Norm'));
                  return $this->redirect(["controller" => "users","action" => 'dashboard']);
                }
            }else{
              //If we are a multiple choice - Loop through question options
              foreach($question->question_option as $op){
                //Create a new record
                $rec = $this->Record->newEntity();
                //Set the id
                $rec->recordset_id = $recId;
                $rec->question_option_id = $op->id;
                $rec->question_id = $question->id;
                if(!$this->Record->save($rec)){
                  $this->Flash->error(__('There was a problem submitting your data, please try again.Mult'));
                  return $this->redirect(["controller" => "users","action" => 'dashboard']);
                }
              }
            }

        }
        return $this->redirect(["controller" => "module","action" => 'enroll/'.$screener->module->id]);
      }

      $this->set('screener', $screener);
      $this->set('recordset', $recordset);
      $this->set('_serialize', ['screener']);
    }

    /**
     * Exercise method
     *
     * @param string|null $id Screener id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function exercise($id = null)
    {
      $edit = [];
      $data = $this->Recordset->newEntity();
      $exercise = $this->Exercise->get($id, [
          'contain' => [
            'Sections',
            'Question' => [
              'QuestionOption'
            ]]
      ]);
      $weekNum = date("w");
      if($this->request->is("post") || $this->request->is("put")){
        //TODO remove magic number
        if($exercise->type == 1){
          $recordset = $this->Recordset->newEntity();
          $recordset->created = date('Y-m-d H:i:s');
        }else if($exercise->type == 2){
          //TODO remove magic number
          //Check to see if we are handeling a weekly exercise
          $recordset = $this->Recordset->newEntity();
          $recordset->created = date('Y-m-d H:i:s');
          $recordset->week = $weekNum;
        }
        $recordset->modified = date('Y-m-d H:i:s');
        //Put request data in to data oject
        $data = $this->Recordset->patchEntity($data, $this->request->data);

        $recordset->exercise_id = $data->exercise_id;
        $recordset->user_id = $this->Auth->user('id');
        //Saving record set
        $rsetResult = $this->Recordset->save($recordset);
        $recId = $rsetResult->id;
        if(!$rsetResult){
          //If we couldn't save
          $this->Flash->error(__('There was a problem submitting your data, please try again.'));
          return $this->redirect(["controller" => "users","action" => 'dashboard']);
        }

        foreach ($exercise->question as $question) {
            $record = $recordset->getRecord($question->id);
            if($record == null){
              $record = $this->Record->newEntity();
            }


            $record->recordset_id = $recId;
            $record->question_id = $question->id;
            //Horrible magic number that asks is the question type not multiple choice
            //TODO make static vars for this stuff
            if($question->type != 2){
                $record->answer = $data->answer[$question->id];
                //Save the record
                if(!$this->Record->save($record)){

                  $this->Flash->error(__('There was a problem submitting your data, please try again.Norm'));
                  return $this->redirect(["controller" => "users","action" => 'dashboard']);
                }

            }else{
              //If we are a multiple choice - Loop through question options
              foreach($question->question_option as $op){
                //Create a new record
                $rec = $recordset->getRecord($question->id, $op->id);
                if(!$rec){
                    $rec = $this->Record->newEntity();
                }
                //Set the id
                $rec->recordset_id = $recId;
                $rec->question_option_id = $op->id;
                $rec->question_id = $question->id;
                $rec->answer = array_key_exists("$question->id-$op->id", $data->answer) ? $data->answer["$question->id-$op->id"] : false;

                if(!$this->Record->save($rec)){
                  $this->Flash->error(__('There was a problem submitting your data, please try again.Mult'));
                  return $this->redirect(["controller" => "users","action" => 'dashboard']);
                }
              }
            }

        }

        //Add 5 points to user profile
        //TODO get rid of magic numbers
        $profile = $this->Profile->find("all")->where(['user_id' => $this->Auth->user('id')])->first();
        $profile->points = $profile->points + 5;
        if($this->hasDoneExerciseFor(10)){
          $profile->points = $profile->points + 10;
        }
        $profile->login = $profile->login + 2;
        //Saving profile
        $this->Profile->save($profile);

        $this->Flash->success(__('Data saved. Thank you.'));
        return $this->redirect(["controller" => "users","action" => 'dashboard']);
      }else{
        if($exercise->type == 1){
            $edit = $this->Recordset->find("all")->where(['Recordset.user_id' => $this->Auth->user('id'),
             'exercise_id' => $id])->contain(['Exercise'=>[ 'Question' => ['QuestionOption']], 'Record'])->first();
             if(!$edit){
                 $edit = $this->Recordset->newEntity();
             }
        }else if($exercise->type == 2){
          $edit = $this->Recordset->find("all")->where(['Recordset.user_id' => $this->Auth->user('id'),
           'exercise_id' => $id, 'week' => $weekNum])->contain(['Exercise'=>[ 'Question' => ['QuestionOption']], 'Record'])->first();
           if(!$edit){
               $edit = $this->Recordset->newEntity();
               $edit->created = date('Y-m-d H:i:s');
               $edit->week = $weekNum;
           }
        }

      }


      $this->set('exercise', $exercise);
      $this->set('recordset', $edit);
      $this->set('_serialize', ['recordset']);
    }
    /**
     * hasDoneExerciseFor method
     *
     * Returns whether or not a user has completed an exercise for a specified amount of weeks
     * @param string|null $id Recordset id.
     * @return Boolean
     *
     */
    private function hasDoneExerciseFor($weeks){
      $userId = $this->Auth->user('id');
      $week = date("w");
      for($i = 0; $i < $weeks;$i++){
        $tmp = $week - $i;
        $exercise = $this->Recordset->find("all")->where(['user_id' => $userId, 'week' => $tmp])->first();
        if(!$exercise){
          return false;
        }
      }

      return true;
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
        $recordset = null;
        $tmp = $this->Recordset->get($id, [
            'contain' => [],

        ]);
        if($tmp->exercise_id != null){
          $recordset = $this->Recordset->get($id, [
              'contain' => ['Exercise', 'Users'],
          ]);
          $this->set('recordset', $recordset);
        }else{
          $recordset = $this->Recordset->get($id, [
              'contain' => ['Screener' => ['Formular'], 'Users', 'Record'],
          ]);
        $this->set('recordset', $recordset);
        }


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
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The data could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The data could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
