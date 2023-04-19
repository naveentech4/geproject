<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include_once('adminmenu.php'); ?>
    <div class="col-lg-9 col-sm-12 ">
      <div class="card">
        <div class="card-header">
          <h3>Edit Student details</h3>
        </div>

        <div class="card-body">
          <form method="post" action="<?php echo base_url().'index.php/studentcontroller/update/'.$students['ID']?>" >
            <div class="form-group">
              <label for="Rollnumber">Roll number</label>
              <input type="text" disabled name="Rollnumber" value="<?php echo set_value('Rollnumber',$students['Rollnumber']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('Rollnumber'); ?></span>
            </div>
            <div class="form-group">
              <label for="Course">Course</label>
              <input type="text" name="Course" value="<?php echo set_value('Course',$students['Course']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('Course'); ?></span>
            </div>
            <div class="form-group">
              <label for="Specialization">Specialization</label>
              <input type="text" name="Specialization" value="<?php echo set_value('Specialization',$students['Specialization']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('Specialization'); ?></span>
            </div>
            <div class="form-group">
              <label for="Semester">Semester</label>
              <input type="text" name="Semester" value="<?php echo set_value('Semester',$students['Semester']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('Semester'); ?></span>
            </div>
            <div class="form-group">
              <label for="Aadharnumber">Aadharnumber</label>
              <input type="text" name="Aadharnumber" value="<?php echo set_value('Aadharnumber',$students['Aadharnumber']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('Aadharnumber'); ?></span>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="<?php echo base_url().'index.php/studentcontroller/index'; ?>" class="btn btn-danger">Cancel</a>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
