<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Update the details</h3>
    <?php
    echo $this->Html->link("< Back", "/areamanager/area/getallarea", ["class" => "btn btn-info pull-right", "style" => "margin-top:-26px"]);
    ?>
  </div>
  <div class="panel-body">
    <?php
    echo $this->Form->create(
      null,
      [
        "url" => ["controller" => "area", "action" => "update"],
        "class" => "form-horizontal"
      ]
    );

    ?>
    <!-- <form action="/action_page.php" method="post">  -->
    <input type="hidden" value="<?php echo $area->id; ?>" name="areaID">
  </div>

  <div class="form-group">
    <label for="name">Update Area Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Updated Name"
      value="<?php echo $area->name ?>" name="name">
  </div>

  <div class="form-group">
    <!-- <label for="id">Update Parent:</label>
    <input type="text" class="form-control" id="parent_id" placeholder="Enter Updated Parent Id"
      value="<?php /*echo $area->parent_id*/ ?>" name="parent_id">
    </div> -->
    <?php echo $this->Form->input('parent_id', [
      'type' => 'select',
      'label' => 'Update Parent Name:',
      'options' => $parentAreaIdName,
      'default' => $area->parent_id,
      ]);
    ?>

  <div class="form-group">
    <!-- <label for="id">Level Id:</label> -->
    <!-- <input type="text" class="form-control" id="area_level_id" placeholder="Enter Updated Level Id" value="<?php echo $area->level_id ?>" name="level_id"> -->
    <?php echo $this->Form->input('level_id', [
      'type' => 'select',
      'label' => 'Update Level:',
      'options' => $areaLevelIdName,
      'default' => $area->level_id,
    ]);
    ?>
  </div>

  <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</div>