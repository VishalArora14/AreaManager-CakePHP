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
              <!-- <th>Area_Id</th> -->
              <th>Name</th>
              <th>Total Children</th>
              <th>Level</th>
              <th>Parent Name</th>
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
                <!-- <td>
                  <?php // $value->id ?>
                </td> -->
                <td>
                  <?= $value->name ?>
                </td>
                <td>
                  <?= $get_total_children_by_id[$value["id"]] ?>
                </td>
                <td>
                  <?= ($value["area_level"]["name"] == "Highest_Level") ? "None" : $value["area_level"]["name"] ?>
                </td>
                <td>
                  <?= ($value["parent_area"]["name"] == "Highest_Area") ? "None" : $value["parent_area"]["name"] ?>
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