<?php
session_start();
require '../db.php';
require '../session_check.php';
require '../dashboard_includes/header.php';
?>

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
      </nav>

<div class="sl-pagebody">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="card">
          <div class="card-header">
            <h3>Add Bannar</h3>
          </div>
          <?php if(isset( $_SESSION['extension'])){?>
            <div class="alert alert-warning">
              <?= $_SESSION['extension'];?>
            </div>
          <?php } unset( $_SESSION['extension'])?>

          <?php if(isset( $_SESSION['bannar_success'])){?>
            <div class="alert alert-warning">
              <?= $_SESSION['bannar_success'];?>
            </div>
          <?php } unset( $_SESSION['bannar_success'])?>


          <?php if(isset( $_SESSION['size'])){?>
            <div class="alert alert-warning">
              <?= $_SESSION['size'];?>
            </div>
          <?php } unset( $_SESSION['size'])?>
          <div class="card-body">
            <form action="bannar_post.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Bannar Title</label>
                <input type="text" name="title" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Bannar Description</label>
                <textarea  name="desp" class="form-control" ></textarea>
              </div>
              <div class="form-group">
                <label for="">Bannar Btn</label>
                <input type="text" name="btn" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Bannar Image</label>
                <input type="file" name="image" class="form-control" >
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Add bannar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>




</div>
</div>

<?php
require '../dashboard_includes/footer.php';
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['password']);


?>