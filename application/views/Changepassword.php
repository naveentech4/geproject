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
          <h3>Change password</h3>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label>Current password</label>
            <input type="password" name="cnpass" placeholder="Current password" class="form-control">
          </div>
          <div class="form-group">
            <label>New password</label>
            <input type="password" name="newpass" placeholder="New password" class="form-control">
          </div>
          <div class="form-group">
            <label>Confirm password</label>
            <input type="password" name="cpass" placeholder="Confirm password" class="form-control">
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-lg" name="insert">Save</button>
            <button class="btn btn-danger btn-md" name="insert">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">© Developed by L.Naveen kumar

</footer>
</html>
