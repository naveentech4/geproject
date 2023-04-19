<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'bootstrap/css/bootstrap.min.css'; ?>" >
  <script src="<?php echo base_url().'bootstrap/js/bootstrap.min.js'?>"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'bootstrap/css/fonts.css'; ?>" >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
</head>
<style>
ul.list-group>a{
  text-decoration:none;
}

</style>
<body>
  <div class="container">
    <br/>
  </div>
  <div class="row">
    <div class="col-lg-3 col-sm-12">
      <div class="card">
        <div class="card-header bg-light">
          <center><img src="<?php echo base_url().'images/img_avatar3.png' ?>" alt="profile photo" class="mr-3 mt-3 rounded-circle" style="width:100px;"></center>
          <center><label>Welcome admin</label></center>
          <?php date_default_timezone_set('Asia/Kolkata');
          $dt=new DateTime(); ?>
          <center><label>Date &#38; Time :<?php echo $dt->format('d-m-y h:i:s'); ?></label></center>
          <hr>
          <ul class="list-group nav">
            <a href="<?php echo base_url().'index.php/addsubjects'; ?>"><li class="list-group-item"><i class="fas fa-home" aria-hidden="true"></i>&nbsp Subjects</li></a>
            <a href="<?php echo base_url().'index.php/studentcontroller'; ?>"><li class="list-group-item"><i class="fas fa-file-excel" aria-hidden="true"></i>&nbsp Student details</li></a>
            <a href="<?php echo base_url().'index.php/import'; ?>"><li class="list-group-item"><i class="fas fa-edit" aria-hidden="true"></i>&nbsp Excel import</li></a>
            <a href="<?php echo base_url().'index.php/addsubjects/getpublilsh'; ?>"><li class="list-group-item"><i class="fas fa-upload" aria-hidden="true"></i>&nbsp Publilsh</li></a>
            <a href="<?php echo base_url().'index.php/addsubjects/getpublishview'; ?>"><li class="list-group-item"><i class="fas fa-upload" aria-hidden="true"></i>&nbspView Publilsh</li></a>
            <a href="<?php echo base_url().'index.php/Reportscontroller'; ?>"><li class="list-group-item"><i class="fas fa-file-excel" aria-hidden="true"></i>&nbspReports</li></a>
            <a href="<?php echo base_url().'index.php/Reportscontroller/reportssubjectview'; ?>"><li class="list-group-item"><i class="fas fa-file-excel" aria-hidden="true"></i>&nbspSubject Report</li></a>
            <a href="<?php echo base_url().'index.php/Admincontroller/logout'; ?>"><li class="list-group-item"><i class="fas fa-power-off" aria-hidden="true"></i>&nbsp Log out</li></a>
          </ul>
        </div>
      </div>
    </div>
</body>

</html>
