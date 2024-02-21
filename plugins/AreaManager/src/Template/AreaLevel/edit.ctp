<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Enter the details</h3>
    <?php
    echo $this->Html->link("< Back", "/areamanager/arealevel/getallarealevel", ["class" => "btn btn-info pull-right", "style" => "margin-top:-26px"]);
    ?>
  </div>
  <div class="panel-body">
    <?php
    echo $this->Form->create(
      null,
      [
        "url" => ["controller" => "arealevel", "action" => "update"],
        "class" => "form-horizontal"
      ]
    );

    ?>
    <!-- <form action="/action_page.php" method="post">  -->
    <input type="hidden" value="<?php echo $areaLevel->id; ?>" name="areaLevelID">
  </div>

  <div class="form-group">
    <label for="Area Level">Level:</label>
    <input type="text" class="form-control" id="Area_Level" placeholder="Area Level" name="level"
      value="<?php echo $areaLevel->level ?>">
  </div>

  <div class="form-group">
    <label for="Area Name">Area Name:</label>
    <input type="text" class="form-control" id="Area_Name" placeholder="Enter area name" name="name"
      value="<?php echo $areaLevel->name ?>">
  </div>

  <div class="form-group">
    <label for="text">Is Active</label>
    <input type="checkbox" class="form-control" id="Area_Is_Active" placeholder="Is Area Level Active?" name="is_active"
      <?php echo $areaLevel->is_active ? "checked": "" ?> >
  </div>

  <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</div>