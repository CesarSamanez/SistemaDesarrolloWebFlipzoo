<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TableUses Controller
 *
 * @property \App\Model\Table\TableUsesTable $TableUses
 *
 * @method \App\Model\Entity\TableUse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TableUsesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $tableUses = $this->TableUses->find('all');

        $this->set(compact('tableUses'));
    }

    /**
     * View method
     *
     * @param string|null $id Table Use id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tableUse = $this->TableUses->get($id, [
            'contain' => ['Tables', 'Users']
        ]);

        $this->set('tableUse', $tableUse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null, $check = null)
    {
        $this->loadModel('TemporalUses');
        $table_price=$this->TableUses->Tables->find()->where(['id' => $id]);
        foreach ($table_price as $tb) {
          $price=$tb->price/60;
        }
        $tableUse = $this->TableUses->newEntity();
        $temporalUses = $this->TemporalUses->find()->where(['status'=>'1', 'tables_id' => $id]);
        foreach ($temporalUses as $tempU) {

        date_default_timezone_set('America/Lima');
        echo date('Y-m-d H:i:s');
        echo 'pepe';
        $time=strtotime(date('H:i:s'))-strtotime($tempU->date->format('H:i:s'));
        echo $time;
        $total=$time/60*$price;
        $hours=floor($time/3600);
        $time=$time%3600;
        $minutes=floor($time/60);
        $time=$time%60;
        $seconds=$time;
        $time_string=sprintf("%02s",$hours).':'.sprintf("%02s",$minutes).':'.sprintf("%02s",$seconds);
        echo '/'.$time_string.'/';
        echo $total;

          $tableUse = $this->TableUses->patchEntity($tableUse, array('initial_date'=>$tempU->date->format('Y-m-d H:i:s'),
                                                                      'time' => $time_string,
                                                                      'tables_id' => $id,
                                                                      'users_id' => $this->Auth->user('id'),
                                                                      'total' =>$total
        ));
        $tempU=$this->TemporalUses->patchEntity($tempU, array('status'=>0));
        $this->TemporalUses->save($tempU);
        }
        if($check!=null){
          echo 'chabelo';
          if ($this->TableUses->save($tableUse)) {
              $this->Flash->success(__('The table use has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The table use could not be saved. Please, try again.'));
        }
        if ($this->request->is('post')) {
            if ($this->TableUses->save($tableUse)) {
                $this->Flash->success(__('The table use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table use could not be saved. Please, try again.'));
        }
        $tables = $this->TableUses->Tables->find('all');
        $users = $this->TableUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('tableUse', 'tables', 'users','temporalUses'));
    }

    public function control()
    {
        $this->loadModel('TemporalUses');
        $tableUse = $this->TableUses->newEntity();
        if ($this->request->is('post')) {
            $tableUse = $this->TableUses->patchEntity($tableUse, $this->request->getData());
            if ($this->TableUses->save($tableUse)) {
                $this->Flash->success(__('The table use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table use could not be saved. Please, try again.'));
        }
        $tables = $this->TableUses->Tables->find('all');
        $temporalUses = $this->TemporalUses->find()->where(['status'=>'1']);
        $users = $this->TableUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('tableUse', 'tables', 'users','temporalUses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Table Use id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tableUse = $this->TableUses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tableUse = $this->TableUses->patchEntity($tableUse, $this->request->getData());
            if ($this->TableUses->save($tableUse)) {
                $this->Flash->success(__('The table use has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table use could not be saved. Please, try again.'));
        }
        $tables = $this->TableUses->Tables->find('list', ['limit' => 200]);
        $users = $this->TableUses->Users->find('list', ['limit' => 200]);
        $this->set(compact('tableUse', 'tables', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Table Use id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tableUse = $this->TableUses->get($id);
        if ($this->TableUses->delete($tableUse)) {
            $this->Flash->success(__('The table use has been deleted.'));
        } else {
            $this->Flash->error(__('The table use could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
