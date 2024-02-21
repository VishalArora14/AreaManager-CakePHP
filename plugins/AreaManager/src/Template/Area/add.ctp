<style>
  .addArea {
    padding: 5px 25px;
  }
</style>

<div class="addArea">

  <?php
    echo $this->Html->link("< Back", "/areamanager/area/getallarea", ["class" => "btn btn-info pull-right", "style" => "margin-top:-26px"]);
  ?>

  <?php
    echo $this->Form->create(
      null,
      [
        "url" => [
          "controller" => "Area",
          "action" => "save"
        ],
        "type" => "file",
        "class" => "form-horizontal"
      ]
    );
  ?>

  <div class="form-group">
    <label for="id">Area Name: </label>
    <input type="text" class="form-control" id="Area_Name" placeholder="Enter Area Name" name="name">
  </div>

  <div class="form-group">
    <!-- <label for="id">Area Level Id:</label> -->
    <!-- <input type="text" class="form-control" id="fk_Area_Level_id" placeholder="Enter Area Level Id" name="level_id"> -->
    <?php echo $this->Form->input('level_id', [
      'type' => 'select',
      'label' => 'Select Area Level:',
      'options' => $areaLevelIdName,
    ]);
    ?>
  </div>

  <div class="form-group">
    <!-- <label for="id">Select Parent:</label> -->
    <!-- <input type="text" class="form-control" id="parent_id" placeholder="Enter Parent Id" name="parent_id"
      value="<?php /* echo ($selectedParentId !== NULL && $selectedParentId !== "") ? $selectedParentId : "" */ ?>"> -->
    <?php echo $this->Form->input('parent_id', [
      'type' => 'select',
      'label' => 'Select Parent Area:',
      'options' => $parentAreaIdName,
      'default' => $selectedParentId,
      ]);
    ?>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>