<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'bootstrap/css/bootstrap.min.css'; ?>" >
  </head>
  <body oncontextmenu="return false" onkeydown="return false;">
    <div class="jumbotron text-center">
      <h1>Bhavans vivekananda college</h1>
    </div>
    <div class="row">

    <div class="col-lg-8 col-sm-12">
      <div class="card">
        <div class="card-header">
          <label>Select Your Subject</label>
        </div>
        <div class="card-body">
        <form id="frmselect" method="POST" action="">
      <table class="table table-striped table-borderd table-responsive ">
      <?php if($nosubject==2) {  ?>
      <thead>
      <th>Course</th>
      <th>Specilaization</th>
      <th>Semester</th>
      <th>Selected Subject</th>
      </thead>
      <?php if(isset($selectedsubject)) {  foreach($selectedsubject as $ss) { ?>
      <tr>
      <td><?php echo $ss['course']; ?></td>
      <td><?php echo $ss['specialization']; ?></td>
      <td><?php echo $ss['semester']; ?></td>
      <td><?php echo $ss['subjectname']; ?></td>
      </tr>
      <tr >
         <td colspan="4">The above subject is your Elective subject</td>
      </tr>
      <?php } } else { ?>
      <tr colspan="4">
      <td>Something went wrong contact administrator</td>
      </tr>
      <?php } } else {?>
      
        <thead>
          <th>
            Select
          </th>
          <!--<th>
            S.no
          </th>-->
          <th>
            Subject name
          </th>
          <th>
            Remaining Seats
          </th>
          
        </thead>
        <?php if($nosubject==1) { foreach($user1 as $users) { ?>
        <tr>
          <!--<td><?php $x; ?></td>-->
          <td><button id="btnselect"  onclick="myselect(<?php echo $users['ID'] ?>)" class="btn btn-primary">Select</button></td>

          <td style="word-wrap: break-word;"><?php if(isset($users['subjectname'])) { echo $users['subjectname']; } ?></td>
          <td><?php if(isset($users['subjectname'])) { echo $users['remainingseats']; } ?></td>
          
        </tr>
      <?php } } else { ?>
        <tr>
          <td colspan="3">No subjects available at this time</td>
        </tr>
      <?php } } ?>

      <?php $failure=$this->session->flashdata('noseats');
      if($failure!='')
      { ?>
    <tr>
      <td colspan="4">
        <div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php
          echo $failure; ?>
        </div>
      </td>
    </tr>
<?php }?>
      </table>

    </div>
  </div>
</div>
<div class="col-lg-4">
  <div class="card">
    <div class="card-header">
      <label>Your details</label>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered table-responsive">
        <?php foreach ($user1 as $users) { ?>
        <tr>
          <td>
            <label>Your Rollnumber</label>
          </td>
          <td style="width:268px">
            <label><?php echo $users['Rollnumber']; ?></label>
            <input type="hidden" readonly name="hidrollnumber" value="<?php echo $users['Rollnumber']; ?>">
          </td>
        </tr>
        <tr>
          <td>
            <label>Course</label>
          </td>
          <td>
            <?php echo $users['Course']; ?>
            <input type="hidden"  name="hidcourse" value="<?php echo $users['Course']; ?>">
          </td>
        </tr>
        <tr>
          <td>Specialization</td>
          <td><label><?php echo $users['Specialization']; ?></label>
          <input type="hidden"  name="hidSpecialization" value="<?php echo $users['Specialization']; ?>"></td>
        </tr>
        <tr>
          <td>Semester</td>
          <td><label><?php echo $users['Semester']; ?></label>
          <input type="hidden"  name="hidSemester" value="<?php echo $users['Semester']; ?>"></td>
        </tr>
      <?php break; } ?>
      </table>

    </div>
    <div class="card-footer">
      <a href="<?php echo base_url().'index.php/Selectsubject/logout'; ?>" class="btn btn-warning">Logout</a>
    </div>
  </div>
</div>
</form>
  </div>
  </body>
  <script type="text/javascript">
  window.setTimeout(function () {
    $(".alert-danger").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 5000);
     function myselect(id)
     {
       document.getElementById('frmselect').action="<?php echo base_url().'index.php/Selectsubject/subjectselect/'?>"+id;
         }
  </script>
  <footer>
      <div class="footer-copyright text-center py-3">© Developed by L.Naveen kumar Msc(Computer Science) 2016-18 <br/>Bhavans Vivekananda College
  </footer>
</html>
