<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'bootstrap/css/bootstrap.min.css'; ?>" >

</head>
<script type="text/javascript">
  $(document).ready(function(){
$("#myInput").on("keyup",function(){
  var value=$(this).val().toLowerCase();
  $("#myTable tr").filter(function(){
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });

});
  });

</script>
<body>
  <?php include_once('adminmenu.php'); ?>
  <div class="col-lg-9 col-sm-12 ">
    <div class="card">
      <div class="card-header">
        <h3>Student Details</h3>
      </div>

      <div class="card-body">
        <div>
          <form method="post" class="form-inline"  action="<?php echo base_url().'index.php/studentcontroller'; ?>">

            <label for="course">Course</label>
            <select name="course" class="form-control">
              <option value="" selected>Select Course</option>
              <?php foreach($courses as $course) { ?>
          <option value="<?php echo $course['course']; ?>" <?php echo  set_select('course',$course['course'] )?>><?php echo $course['course']; ?></option>
              <?php } ?>
            </select>&nbsp;&nbsp;
            <label for="course">Specialization</label>
            <select name="specialization" class="form-control">
              <option selected>Select Specialization</option>
              <?php foreach($specializations as $specialization) { ?>
                <option value="<?php echo $specialization['specialization']; ?>" <?php echo  set_select('specialization',$specialization['specialization'] )?>><?php echo $specialization['specialization']; ?></option>
              <?php } ?>
            </select>&nbsp;&nbsp;
            <label for="semester">Semester</label>
            <select name="semester" class="form-control">
              <option selected>Select Semester</option>
              <?php foreach($semesters as $semester) { ?>
                <option value="<?php echo $semester['semester']; ?>" <?php echo set_select('semester',$semester['semester']); ?>><?php echo $semester['semester']; ?></option>
              <?php } ?>
            </select>&nbsp;&nbsp;
            <button class="btn btn-primary" type="submit">Get Students</button>&nbsp;&nbsp;
            <input class="form-control" type="text" placeholder="Search here" id="myInput">
          </form>
        </div>
        <br/>
        <form method="post" action="<?php echo base_url().'index.php/studentcontroller/addstudents1'?>" >
          <table class="table table-bordered table-striped table-responsive" id="myTable">
            <thead>
              <th>S.no</th>
              <th>Rollnumber</th>
              <th>course</th>
              <th>specialization</th>
              <th>semester</th>
              <th>Aadharnumber</th>
              <th>Edit</th>
              <th>Delete</th>

            </thead>
            <?php $x=1; foreach($students as $student) {?>
              <tr>
                <td>
                  <?php echo $x; $x++;?>

                </td>
                <td>
                  <?php echo $student->Rollnumber; ?>
                </td>
                <td><?php echo $student->Course; ?></td>
                <td><?php echo $student->Specialization; ?></td>
                <td><?php echo $student->Semester; ?></td>
                <td><?php echo $student->Aadharnumber; ?></td>

                <td><a href="<?php echo base_url().'index.php/studentcontroller/edit/'.$student->ID ?>" class="btn btn-primary"><i class="fas fa-edit" aria-hidden="true">Edit</a></td>
                  <td><a href="<?php echo base_url().'index.php/studentcontroller/delete/'.$student->ID ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true">Delete</a></td>
                  </tr>
                <?php } ?>
                <tr class="form-group">
                  <td>

                  </td>
                  <td><input class="form-control" type="text" name="Rollnumber" value="<?php echo set_value('Rollnumber'); ?>"></td>
                  <td><input class="form-control" type="text" name="Course" value="<?php echo set_value('Course'); ?>"></td>
                  <td><input class="form-control" type="text" name="Specialization" value="<?php echo set_value('Specialization'); ?>"></td>
                  <td><input class="form-control" type="text" name="Semester" value="<?php echo set_value('Semester'); ?>"></td>
                  <td><input class="form-control" type="text" name="Aadharnumber" value="<?php echo set_value('Aadharnumber'); ?>"></td>

                  <td><input class="form-control" disabled name=""></td>
                  <td colspan="2"><center><button class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true">Add</button></center></td>

                  </tr>
                  <tr>
                    <td>
                    </td>
                    <td>
                      <span class="text-danger"><?php echo form_error('Rollnumber'); ?></span>
                    </td>
                    <td>
                      <span class="text-danger"><?php echo form_error('Course'); ?></span>
                    </td>
                    <td>
                      <span class="text-danger"><?php echo form_error('Specialization'); ?></span>
                    </td>
                    <td>
                      <span class="text-danger"><?php echo form_error('Semester'); ?></span>
                    </td>
                    <td>
                      <span class="text-danger"><?php echo form_error('Aadharnumber'); ?></span>
                    </td>

                  </tr>
                  <?php $sucess=$this->session->flashdata('success');
                  if($sucess!='')
                  { ?>
                    <tr>
                      <td colspan="10">
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php
                          echo $sucess; ?>
                        </div>
                      </td>
                    </tr>
                  <?php }?>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </body>
    <script type="text/javascript">
    window.setTimeout(function () {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 5000);
    </script>
    <footer class="page-footer font-small blue pt-4">
      <div class="footer-copyright text-center py-3">© Developed by L.Naveen kumar

      </footer>
      </html>
