<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'bootstrap/css/bootstrap.min.css'; ?>" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="jumbotron text-center">
      <h1>Bhavans vivekananda college</h1>
    </div>
    <form method="post" action="<?php echo base_url().'index.php/Admincontroller/auth'; ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h1>Admin Login</h1>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" required>

                          </div>
            <div class="form-group">
              <label for="password">password</label>
              <input type="password" class="form-control" name="password" required>

            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit" name="login">Login</button>
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
          </div>
        </div>
      </div>
    </div>
  </div>

</form>

  </body>
  <script type="text/javascript">
    window.setTimeout(function () {
      $(".alert-danger").fadeTo(500, 0).slideUp(500, function () {
          $(this).remove();
      });
  }, 5000);
    </script>
  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">© Developed by L.Naveen kumar

</footer>
</html>
