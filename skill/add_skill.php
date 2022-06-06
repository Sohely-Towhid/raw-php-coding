<?php
session_start();
require '../db.php';
require '../session_check.php';
require '../dashboard_includes/header.php';
$select_users="SELECT * FROM users WHERE status=0";
$select_users_result=mysqli_query($dbconnect,$select_users);
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
            <h3>Add skill</h3>
          </div>
        

          <?php if(isset( $_SESSION['skill_success'])){?>
            <div class="alert alert-warning">
              <?= $_SESSION['skill_success'];?>
            </div>
          <?php } unset( $_SESSION['skill_success'])?>


          
          <div class="card-body">
            <form action="skill_post.php" method="POST" >
            <div class="form-group">
                <select name="user_id" class="form-control">
                  <option value="">--Select user--</option>
                  <?php foreach ($select_users_result as $key => $user) { ?>
                  <option value="<?=$user['id']?>"><?=$user['name']?></option>
                  <?php } ?>
                </select>
                <label for="">skill name</label>
                <input type="text" name="skill_name" class="form-control" >
              </div>
              
              <div class="form-group">
                <label for="">percentage</label>
                <input type="text" name="percentage" class="form-control" >
              </div>
              
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Skill</button>
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

?>