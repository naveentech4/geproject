<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'bootstrap/css/bootstrap.min.css'; ?>" >
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" >
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
        <h3>Selected subject</h3>
      </div>

      <div class="card-body">
        <div>
          <form method="post" class="form-inline" id="myform"  action="">

            <label for="subjectname">Subject</label>
            <select name="subjectname" required class="form-control">
              <option value="" selected>Select Subject</option>
              <?php foreach($subjects as $subject) { ?>
          <option value="<?php echo $subject['subjectname']; ?>" ><?php echo $subject['subjectname']; ?></option>
              <?php } ?>
              </select>
            
            <button class="btn btn-primary" id="getstud" type="submit">Get Students</button><br/>
            
           
          </form>
        </div>
        <br/>
       
          <table class="table table-bordered table-striped table-responsive" id="myTable">
            <thead>
              <th>S.no</th>
              <th>Rollnumber</th>
              <th>course</th>
              <th>specialization</th>
              <th>semester</th>
              <th>Selected subject</th>
              <th>Selected Time</th>
             

            </thead>
             <?php $x=1; if(isset($students)) { foreach($students as $student) {?>
              <tr>
                <td>
                  <?php echo $x; $x++;?>

                </td>
                <td>
                  <?php echo $student['rollnumber']; ?>
                </td>
                <td><?php echo $student['course']; ?></td>
                <td><?php echo $student['specialization']; ?></td>
                <td><?php echo $student['semester']; ?></td>
                <td><?php echo $student['subjectname']; ?></td>        
                <td><?php echo $student['Timestamp']; ?></td>
                  </tr>
                <?php } } ?>
                
                  
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
                 
            </div>
          </div>
        </div>
      </div>
    </body>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>    
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#myTable').DataTable({
          dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
      })
    </script>
    <script type="text/javascript">
    window.setTimeout(function () {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 5000);

     $("#getstud").click(function(){
         document.getElementById('myform').action="<?php echo base_url().'index.php/Reportscontroller/getbysubject'; ?>";
     });
     $("#exporttoexcel").click(function(){
        document.getElementById('myform').action="<?php echo base_url().'index.php/Reportscontroller/createXLSsubject'; ?>";
     })


    </script>
    <footer class="page-footer font-small blue pt-4">
      <div class="footer-copyright text-center py-3">© Developed by L.Naveen kumar

      </footer>
      </html>
