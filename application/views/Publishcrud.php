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
          <h3>Published Subjects</h3>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped table-responsive">
            <thead>
              <td>Course</td>
              <td>Specialization</td>
              <td>Semester</td>
              <td>Date & Time</td>
              <td>Is Published</td>
              <td>Action</td>
            </thead>
            <?php foreach ($published as $publ) {?>
              <tr>
                <td><?php echo $publ['course'];  ?></td>
                <td><?php echo $publ['specialization']; ?></td>
                <td><?php echo $publ['semester']; ?></td>
                <td><?php echo $publ['date']; ?></td>
                <td><?php if($publ['ispublish']==1){echo "Published";} else{echo "Not published";} ?></td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')"  href="<?php echo base_url().'index.php/Addsubjects/deletepubl/'.$publ['ID'];?>">Unpublish & Delete</a></td>
              </tr>
            <?php }?>
          </table>
        </div>
      </div>
    </div>
  </div>
