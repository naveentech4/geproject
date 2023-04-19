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
            <h3>Subject Details</h3>
          </div>

          <div class="card-body">
            <form method="post" action="<?php echo base_url().'index.php/Addsubjects/addsubject1'?>" >
    <table class="table table-bordered table-striped table-responsive">
      <thead>
      <th>S.no</th>
      <th>Course</th>
      <th>specialization</th>
      <th>Semester</th>
      <th>subjct name</th>
      <th>SubjecId</th>
      <th>Total Seats</th>
      <th>Remaining Seats</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
    <?php $x=1; foreach($subjects as $subject) {?>
      <tr>
        <td>
          <?php echo $x; $x++;?>

        </td>
        <td>
          <?php echo $subject->course; ?>
        </td>
        <td><?php echo $subject->specialization; ?></td>
        <td><?php echo $subject->semester; ?></td>
        <td><?php echo $subject->subjectname; ?></td>
        <td><?php echo $subject->subjectid; ?></td>
        <td><?php echo $subject->totalseats; ?></td>
        <td><?php echo $subject->remainingseats; ?></td>
        <td><a href="<?php echo base_url().'index.php/addsubjects/edit/'.$subject->ID ?>" class="btn btn-primary"><i class="fas fa-edit" aria-hidden="true">Edit</a></td>
        <td><a href="<?php echo base_url().'index.php/addsubjects/delete/'.$subject->ID ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true">Delete</a></td>
      </tr>
    <?php } ?>
    <tr class="form-group">
      <td>

      </td>
      <td><input class="form-control" type="text" placeholder="course" name="course" value="<?php echo set_value('course'); ?>"></td>
      <td><input class="form-control" type="text" placeholder="specialization" name="specialization" value="<?php echo set_value('specialization'); ?>"></td>
      <td><input class="form-control" type="text" placeholder="Semster" name="semester" value="<?php echo set_value('semester'); ?>"></td>
      <td><input class="form-control" type="text" placeholder="Subject name" name="subjectname" value="<?php echo set_value('subjectname'); ?>"></td>
      <td><input class="form-control" type="text" placeholder="SubjecId" name="subjecid" value="<?php echo set_value('subjecid'); ?>"></td>
      <td><input class="form-control" type="text" placeholder="Total Seats" name="total" value="<?php echo set_value('total'); ?>"></td>
      <td><input class="form-control" disabled name=""></td>
      <td colspan="2"><center><button class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true">Add</button></center></td>

    </tr>
    <tr>
      <td>
      </td>
      <td>
      <span class="text-danger"><?php echo form_error('course'); ?></span>
      </td>
      <td>
        <span class="text-danger"><?php echo form_error('specialization'); ?></span>
      </td>
      <td>
        <span class="text-danger"><?php echo form_error('semester'); ?></span>
      </td>
      <td>
        <span class="text-danger"><?php echo form_error('subjectname'); ?></span>
      </td>
      <td>
        <span class="text-danger"><?php echo form_error('subjecid'); ?></span>
      </td>
      <td>
        <span class="text-danger"><?php echo form_error('total'); ?></span>
      </td>

    </tr>
    <tr>
      <td colspan="7">
        <?php echo $links; ?>
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
