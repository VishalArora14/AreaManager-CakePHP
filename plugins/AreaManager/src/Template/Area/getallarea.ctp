<div class="row">
  <div class="primary">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <?php
          echo $this->html->link("+Add New Area", "/areamanager/area/add", ["class" => "btn btn-success pull-right", "style" => "margin-top:30px"])
            ?>
        </h3>
      </div>
      <div class="panel-body ">
        <table class="table">
          <thead>
            <tr>
              <!-- <th>S.No.</th> -->
              <th>Area_Id</th>
              <th>Name</th>
              <th>Parent of</th>
              <th>Level_Id</th>
              <th>Parent_Id</th>
              <th>Created_At</th>
              <th>Modified_At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $count = 1;
            foreach ($areaData as $key => $value) {
              if($value->id == 0){
                //Highest Area
                continue;
              }
              ?>

              <tr class="info">
                <!-- <td>
                  <?php // $count++ ?>
                </td> -->
                <td>
                  <?= $value->id ?>
                </td>
                <td>
                  <?= $value->name ?>
                </td>
                <td>
                  <?= count($value["child_areas"]) ?>
                </td>
                <td>
                  <?= $value->level_id ?>
                </td>
                <td>
                  <?= $value->parent_id ?>
                </td>
                <td>
                  <?= $value->created_at ?>
                </td>
                <td>
                  <?= $value->modified_at ?>
                </td>


                <td>
                  <?php
                  echo $this->Html->link(
                    "Edit",
                    "/areamanager/area/edit/" . $value->id,
                    [
                      "class" => "btn btn-info"
                    ]
                  );

                  echo $this->Html->link(
                    "Delete",
                    "/areamanager/area/delete/" . $value->id,
                    [
                      "class" => "btn btn-danger",
                      "style" => "margin-left:10px"
                    ]
                  );

                  echo $this->Html->link(
                    "+SubAr",
                    "/areamanager/area/add/" . $value->id,
                    [
                      "class" => "btn btn-danger",
                      "style" => "margin-left:10px"
                    ]
                  );
                  ?>
                  <!-- <button type="button" class="btn btn-success">Edit</button> -->
                  <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                </td>
              </tr>

              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>