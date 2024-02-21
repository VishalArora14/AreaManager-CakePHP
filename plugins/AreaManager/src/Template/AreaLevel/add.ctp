<style>
  .areaLevelContainer{
  padding: 5px 10px;
  }
</style>

<?php echo $this->Html->link("< Back", "/areamanager/arealevel/getallarealevel", ["class" => "btn btn-info pull-right", "style" => "margin-top:-26px"]); ?>
<?php
echo $this->Form->create(
  null,
  [
    "url" => [
      "controller" => "AreaLevel",
      "action" => "save"
    ],
    "type" => "file",
    "class" => "form-horizontal"
  ]
);
?>

<div class="areaLevelContainer">
  <!-- <div class="form-group">
    <label for="id">Area Id:</label>
    <input type="text" class="form-control" id="Area_Id" placeholder="Enter Area Level Id" name="id">
  </div> -->
  <div class="form-group">
    <label for="id">Area Level Numer:</label>
    <input type="text" class="form-control" id="Area_Level" placeholder="Enter Level Number" name="level">
  </div>

  <div class="form-group">
    <label for="id">Area Level Name:</label>
    <input type="text" class="form-control" id="Area_Name" placeholder="Enter Area Level Name" name="name">
  </div>

  <div class="form-group">
    <label for="id">Is this area level active:</label>
    <input type="checkbox" class="form-control" id="Area_Is_Active" placeholder="Is Area Level Active?" name="is_active"
      checked>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>