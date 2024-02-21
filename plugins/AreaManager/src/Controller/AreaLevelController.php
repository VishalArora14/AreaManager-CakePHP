<?php
namespace AreaManager\Controller;
use AreaManager\Controller\AppController;
class AreaLevelController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel("AreaManager.AreaLevels");
    }

    public function index()
    {
        $this->autoRender = false;
        echo "index of area level";
    }

    public function add()
    {
        
    }

    public function save()
    {
        $this->autoRender = false;
        // print_r($this->request->data);

        if ($this->request->is('post')) {
            $data = $this->request->data;
            if(isset($data["is_active"])){
                $data["is_active"] = ($data["is_active"] == "on") ? 1 : 0;
            }else{
                $data["is_active"] = 0;
            }
            // print_r($data);die();
            $areaLevel = $this->AreaLevels->newEntity($data);
            $validation = $areaLevel->errors();
            // $this->autoRender = false;
            // print_r($validation);die(); 

            if (!empty($validation)) {
                // we have error here
                // $this->autoRender = false;
                // print_r($validation);die();
                // $this->Flash->error(__('Unable to add the area level. Please, try again.'));
                $this->Flash->set($validation, [
                    'element' => 'arealevel_errors'
                ]);
                // debug('Flash message set');
                return $this->redirect(['action' => 'add']);
            } 
            else {
                // print_r($validation);

                // $areaLevel->id = (int)$data["id"];
                $areaLevel->level = (int) $data["level"];
                $areaLevel->name = $data["name"];
                $areaLevel->is_active = (bool) $data["is_active"];

                //Before saving check if same combination of 
                //(areaLevel, areaName) is being added or not

                $allAreaLevelData = $this->AreaLevels->find("all")->toArray();
                foreach($allAreaLevelData as $key=>$value){
                    if(($value["name"] == $areaLevel->name) && ($value["level"] == $areaLevel->level)){
                        $this->autoRender = false;
                        $this->Flash->error(__('Same combination of Area Name and Area Level is not allowed'));
                        return $this->redirect(['action' => 'add']);
                    }
                }

                $this->AreaLevels->save($areaLevel);
            }
            $this->redirect(["action" => "getallarealevel"]);
        }
        // $this->set(compact('areaLevel'));
    }

    public function getallarealevel()
    {
        $data = $this->AreaLevels->find('all')->toArray();
        // $this->autoRender = false;
        // print_r($data);
        $this->set("areaLevelData", $data);
    }

    public function edit($id)
    {
        $id = (int) $id;
        // $this->autoRender = false;
        // echo "edit fn of area level and id is " . $id;
        $areaLevel = $this->AreaLevels->get($id);
        $this->set("areaLevel", $areaLevel);
        // print_r($areaLevel);

        // $this->set(compact('areaLevel'));
    }

    public function update()
    {
        $this->autoRender = false;
        $form_data = $this->request->data;
        $areaLevel = $this->AreaLevels->get((int) $form_data['areaLevelID']);

        $areaLevel->level = (int) $form_data["level"];
        $areaLevel->name = $form_data["name"];
        
        if(isset($form_data["is_active"])){
            $form_data["is_active"] = ($form_data["is_active"] == "on") ? 1 : 0;
        }else{
            $form_data["is_active"] = 0;
        }
        // $areaLevel->is_active = (bool) $form_data["is_active"];

        $areaLevel = $this->AreaLevels->patchEntity($areaLevel, $form_data, ['validate' => 'default']);
        $validation = $areaLevel->errors();
        // print_r($validation); die();

        if (!empty($validation)) {
            // we have error here
            // $this->autoRender = false;
            // print_r($validation);die(); 
            
            $this->Flash->set($validation, [
                'element' => 'areaLevel_errors'
            ]);
            // debug('Flash message set');
            return $this->redirect(['action' => 'edit', $form_data["areaLevelID"]]);
        }else{
            if ($this->request->is(['patch', 'post', 'put'])) {
                if ($this->AreaLevels->save($areaLevel)) {
                    $this->Flash->success(__('The area level has been saved.'));
                    return $this->redirect(['action' => 'getallarealevel']);
                }
                $this->Flash->error(__('The area level could not be saved. Please, try again.'));
            }
        }
    }

    public function delete($id)
    {
        $id = (int) $id;
        // $this->autoRender = false;
        // echo "delete fn of area level and id is " . (int) $id;
        // $this->request->allowMethod(['post', 'delete']);
        $areaLevel = $this->AreaLevels->get($id);
        $this->set(compact('areaLevel'));

        if ($this->request->is(['post', 'delete'])) {
            if ($this->request->data('confirmation') === 'Yes') {
                if ($this->AreaLevels->delete($areaLevel)) {
                    $this->Flash->success(__('The area level has been deleted.'));
                } else {
                    $this->Flash->error(__('The area level could not be deleted. Please, try again.'));
                }
            }
            return $this->redirect(['action' => 'getallarealevel']);
        }

    }
}
