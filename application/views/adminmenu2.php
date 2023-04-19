<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include_once('adminmenu.php'); ?>
    <div class="col-lg-9 ">
      <div class="card">
        <div class="card-header">
          <h3>Import Student data to database</h3>
        </div>
        <form action="<?php echo base_url().'index.php/import/importFile' ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
          <label for="course">Course</label>
          <select name="course" class="form-control">
            <option value="" >Select Course</option>
            <?php foreach($courses as $course) { ?>
        <option value="<?php echo $course['course']; ?>" ><?php echo $course['course']; ?></option>
            <?php } ?>
          </select>
        </div>
          <div class="form-group">
            <label for="specialization">Specialization</label>
            <select name="specialization" required class="form-control">
              <option selected>Select Specialization</option>
              <?php foreach($specializations as $specialization) { ?>
                <option value="<?php echo $specialization['specialization']; ?>" <?php echo  set_select('specialization',$specialization['specialization'] )?>><?php echo $specialization['specialization']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" required class="form-control">
              <option selected>Select Semester</option>
              <?php foreach($semesters as $semester) { ?>
                <option value="<?php echo $semester['semester']; ?>" <?php echo set_select('semester',$semester['semester']); ?>><?php echo $semester['semester']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Upload</label>
            <input type="file" name="uploadFile" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="submit"class="btn btn-primary" value="Upload" />
            <button type="button" class="btn btn-danger">Cancel</button>
          </div>
        </div>
      </form>
      </div>
    </div>
</div>
  </body>
  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">© Developed by L.Naveen kumar
</footer>
</html>
