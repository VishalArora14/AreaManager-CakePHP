<div class="row">
  <div class="primary">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title btn btn-outline-info">
          <?php
          echo $this->html->link("+Add New Area Level", "/areamanager/arealevel/add", ["class" => "btn btn-success pull-right", "style" => "margin-top:30px"])
            ?>
        </div>
      </div>
      <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Area_Level_Id</th>
              <th>Level</th>
              <th>Name</th>
              <th>Is Active</th>
              <th>Added Areas</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = 1;
              foreach ($areaLevelData as $key => $value) {
                if ($value->id == 0) {
                  //Highest Area Level
                  continue;
                }
            ?>

              <tr class="info">
                <td>
                  <?= $count++ ?>
                </td>
                <td>
                  <?= $value->id ?>
                </td>
                <td>
                  <?= $value->level ?>
                </td>
                <td>
                  <?= $value->name ?>
                </td>
                <td>
                  <?= $value->is_active ? "✅" : "❌" ?>
                </td>
                <td>
                  <?= count($value["areas"]) ?>
                </td>


                <td>
                  <?php
                  echo $this->Html->link(
                    "Edit",
                    "/areamanager/arealevel/edit/" . $value->id,
                    [
                      "class" => "btn btn-info"
                    ]
                  );

                  echo $this->Html->link(
                    "Delete",
                    "/areamanager/arealevel/delete/" . $value->id,
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