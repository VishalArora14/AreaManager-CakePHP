<?php
namespace AreaManager\Controller;
use AreaManager\Controller\AppController;
use Cake\I18n\Time;

class AreaController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel("AreaManager.Areas");
        $this->loadModel("AreaManager.AreaLevels");
    }

    public function index()
    {
        $this->autoRender = false;
        echo "index fn of area";
    }

    public function add($id=0)
    {
        //Function to add a new area or a sub-area having a parent
        //Id is parent id. Default parent is 0

        $this->set("selectedParentId", $id);
        
        //Area Level Dropdown list options
        $areaLevelData = $this->AreaLevels->find('all')->toArray();
        $areaLevelIdName = []; // [ 1->Country 2->State 3->District ... ]
        foreach($areaLevelData as $key=>$val){
            //can select an area only if it is active. 
            // There can be only 1 highest level 
            if(($val["is_active"]==true) && ($val["id"]!=0)){
                $areaLevelIdName[$val["id"]] = $val["name"];
            }
        }
        $this->set("areaLevelIdName", $areaLevelIdName);

        //Parent Area Dropdown list options
        $parentAreaData = $this->Areas->find('all')->toArray();
        $parentAreaIdName = ["0"=>"none"]; // [1->India, 17->Delhi]
        foreach($parentAreaData as $key=>$val){
            // bcz 0 id name is highest area
            if($val["id"] != 0){
                $parentAreaIdName[$val["id"]] = $val["name"];
            }
        }
        $this->set("parentAreaIdName", $parentAreaIdName);
    }
    
    public function save()
    {
        //Function to save a new area.
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $area = $this->Areas->newEntity($data);
            $validation = $area->errors();
            // debug($validation);

            if (!empty($validation)) {
                // we have error here
                $this->autoRender = false;
                // print_r($validation); 
                //Array ( [name] => Array ( [length] => Area name should be more than 2 characters [alphaNumeric] => The provided value is invalid ) )
                
                $this->Flash->set($validation, [
                    'element' => 'area_errors'
                ]);
                return $this->redirect(['action' => 'add', $data["parent_id"]]);
            } 
            else {
                $area->level_id = (int) $data["level_id"];
                $area->parent_id = (int) $data["parent_id"];
                $area->name = $data["name"];
                $area->created_at = Time::now();
                $area->modified_at = Time::now();
                // print_r($area);

                //Validation check: if same same area is being added at the same level for same parent
                $allData = $this->Areas->find("all")->toArray();
                foreach($allData as $key=>$value){
                    if( $area->parent_id == $value["parent_id"] 
                        && $area->name == $value["name"]
                        && $area->level_id == $value["level_id"]
                    )
                    {
                        $this->Flash->error(__('Duplicate area name entered for same area at same level'));
                        return $this->redirect(['action' => 'add', $area->parent_id]);
                    }
                }

                //Validation for (parent area level < child area level)
                $parentAreaLevel_id = $this->Areas->get($area->parent_id)["level_id"];
                $parentAreaLevel = $this->AreaLevels->get($parentAreaLevel_id)["level"];
                
                $currentAreaLevel = $this->AreaLevels->get($area->level_id)["level"];
                
                if($parentAreaLevel >= $currentAreaLevel){
                    $this->autoRender = false;
                    $this->Flash->error(__('Current Area Level cannot be less than Parent Area Level'));
                    return $this->redirect(['action' => 'add', $area->parent_id]);
                }

                //After all checks 
                $this->Areas->save($area);

                $this->Flash->success(__('The area has been saved.'));
                return $this->redirect(['action' => 'getallarea']);
            }
        }
    }

    public function getallarea()
    {
        $data = $this->Areas->find('all'); //->toArray()
        $this->set("areaData", $data);
    }

    public function edit($id = null)
    {
        //Function of edit values of area
        $id = (int)$id;
        $area = $this->Areas->get($id);
        $this->set("area", $area);
        
        $areaLevelData = $this->AreaLevels->find('all')->toArray();
        
        $areaLevelIdName = []; // [ 1->Country 2->State 3->District ... ]
        foreach($areaLevelData as $key=>$val){
            //Current Level can never be level 0
            if(($val["is_active"]==true)  && ($val["id"]!=0)){
                $areaLevelIdName[$val["id"]] = $val["name"];
            }
        }
        $this->set("areaLevelIdName", $areaLevelIdName);

        $parentAreaData = $this->Areas->find('all')->toArray();
        $parentAreaIdName = ["0"=>"none"]; // [1->India, 17->Delhi]

        foreach($parentAreaData as $key=>$val){
            // for id 0 already added value none above
            if(($val["id"] != $id) && ($val["id"]!=0)){
                // this if condition makes sure we dont select same 
                $parentAreaIdName[$val["id"]] = $val["name"];
            }
        }
        $this->set("parentAreaIdName", $parentAreaIdName);
    }

    public function update()
    {
        //Function to save changes made using edit btn
        $this->autoRender = false;   
        $form_data = $this->request->data;
        
        //areaId is current area id which is being fetched from frontend
        $area = $this->Areas->get((int)$form_data['areaID']);
        
        $area->parent_id = (int) $form_data["parent_id"];
        $area->level_id = (int) $form_data["level_id"];
        $area->name = $form_data["name"];
        $area->modified_at = Time::now();

        //Note: When editing we need to manually call for validation check. Since data is being fetched from 
        //database so automatic validation does not run bcz db assumes data in dabase is correct.
        $area = $this->Areas->patchEntity($area, $form_data, ['validate' => 'default']);
        
        $validation = $area->errors();
        // print_r($validation); die();
        
        if (!empty($validation)) {
            // we have error here
            // $this->autoRender = false;
            // print_r($validation); 
            
            $this->Flash->set($validation, [
                'element' => 'area_errors'
            ]);
            return $this->redirect(['action' => 'edit', $form_data["areaID"]]);
        } 
        else {
            if ($this->request->is(['patch', 'post', 'put'])) {

                //Validation for (parent area level < child area level)
                $parentAreaLevel_id = $this->Areas->get($area->parent_id)["level_id"];
                $parentAreaLevel = $this->AreaLevels->get($parentAreaLevel_id)["level"];
                
                $currentAreaLevel = $this->AreaLevels->get($area->level_id)["level"];
                
                if($parentAreaLevel >= $currentAreaLevel){
                    $this->autoRender = false;
                    $this->Flash->error(__('Current Area Level cannot be less than Parent Area Level'));
                    return $this->redirect(['action' => 'edit', $area->id]);
                }

                //If every validation is successful
                if ($this->Areas->save($area)) {
                    $this->Flash->success(__('The area has been edited.'));
                }
                else{
                    $this->Flash->error(__('The area could not be edited. Please, try again.'));
                }
                return $this->redirect(['action' => 'getallarea']);
            }
        }
    }

    public function delete($id)
    {
        // $this->autoRender = false;
        $id = (int)$id;
        $area = $this->Areas->get($id);
        $this->set(compact('area'));

        if ($this->request->is(['post', 'delete'])) {
            if ($this->request->data('confirmation') == 'Yes') {
                if ($this->Areas->delete($area)) {
                    $this->Flash->success(__('The area has been deleted.'));
                } else {
                    $this->Flash->error(__('The area could not be deleted. Please, try again.'));
                }
            }
            return $this->redirect(['action' => 'getallarea']);
        }
    }
}