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
          <h3>Publish subjects</h3>
        </div>
        <div class="card-body">
            <form method="post"  action="<?php echo base_url().'index.php/addsubjects/publish'; ?>">
              <div class="form-group">
              <label for="course">Course</label>
              <select name="course" class="form-control">
                <option value="" selected>Select Course</option>
                <?php foreach($courses as $course) { ?>
            <option value="<?php echo $course['course']; ?>" <?php echo  set_select('course',$course['course'] )?>><?php echo $course['course']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="course">Specialization</label>
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
              <label>Select Date</label>
              <input type="datetime-local" name="publishdate" required class="form-control">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Publish</button>
            </div>
            <div class="form-group">
      <?php $success=$this->session->flashdata('success');
      if($success!='')
      { ?>
        <div class="alert alert-success">

          <?php
          echo $success; ?>
        </div>
<?php }?>
            </div>
            
              <div class="form-group">
      <?php $failure=$this->session->flashdata('failure');
      if($failure!='')
      { ?>
        <div class="alert alert-danger">

          <?php
          echo $failure; ?>
        </div>
<?php }?>
            </div>
            </form>
          </div>
          <br/>

        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
  $(document).ready(){
    alert('sucess');
  }
  </script>
  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">© Developed by L.Naveen kumar

</footer>
</html>