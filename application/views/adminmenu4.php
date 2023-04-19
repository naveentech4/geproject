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
          <h3>Edit Subject details</h3>
        </div>

        <div class="card-body">
          <form method="post" action="<?php echo base_url().'index.php/addsubjects/update/'.$subject['ID']?>" >
            <div class="form-group">
              <label for="course">Course</label>
              <input type="text" name="course" value="<?php echo set_value('course',$subject['course']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('course'); ?></span>
            </div>
            <div class="form-group">
              <label for="semester">Semster</label>
              <input type="text" name="semester" value="<?php echo set_value('semester',$subject['semester']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('semester'); ?></span>
            </div>
            <div class="form-group">
              <label for="specialization">Specialization</label>
              <input type="text" name="specialization" value="<?php echo set_value('specialization',$subject['specialization']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('specialization'); ?></span>
            </div>
            <div class="form-group">
              <label for="subjectname">subject name</label>
              <input type="text" name="subjectname" value="<?php echo set_value('subjectname',$subject['subjectname']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('subjectname'); ?></span>
            </div>
            <div class="form-group">
              <label for="subjectid">Subject id</label>
              <input type="text" name="subjectid" value="<?php echo set_value('subjectid',$subject['subjectid']); ?>" class="form-control">
              <span class="text-danger"><?php echo form_error('subjectid'); ?></span>
            </div>
            <div class="form-group">
              <label for="totalseats">Total seats id</label>
              <input type="text" name="totalseats" value="<?php echo set_value('totalseats',$subject['totalseats']); ?>" class="form-control">
                <span class="text-danger"><?php echo form_error('totalseats'); ?></span>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="<?php echo base_url().'index.php/addsubjects/index'; ?>" class="btn btn-danger">Cancel</a>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
