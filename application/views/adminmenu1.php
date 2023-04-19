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
          <h3>Insert</h3>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label>Rollnumber</label>
            <input type="text" name="rollnumber" placeholder="Enter rollnumber" class="form-control">
          </div>
          <div class="form-group">
            <label>Aadharnumber</label>
            <input type="text" name="aadharnumber" placeholder="Enter aadharnumber" class="form-control">
          </div>
          <div class="form-group">
            <label>Class</label>
            <input type="text" name="class" placeholder="Enter class" class="form-control">
          </div>
          <div class="form-group">
            <label>Group</label>
            <input type="text" name="semester" placeholder="Enter Group" class="form-control">
          </div>
          <div class="form-group">
            <label>Semester</label>
            <input type="text" name="semester" placeholder="Enter semester" class="form-control">
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
