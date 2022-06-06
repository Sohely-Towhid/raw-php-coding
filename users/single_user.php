<?php
session_start();
require '../session_check.php';
require '../db.php';
$id=$_GET['id'];
$select_user="SELECT * FROM users WHERE id=$id";
$select_user_result=mysqli_query($dbconnect,$select_user);
$after_assoc=mysqli_fetch_assoc($select_user_result);
?>
<?php require '../dashboard_includes/header.php';?>

    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Blank Page</h5>
          <p>This is a starter page</p>
        </div><!-- sl-page-title -->
            
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">
                    <div class="card-header"> 
                        <h1><?=$after_assoc['name']?>Information</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>name</td>
                                <td><?=$after_assoc['name']?></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><?=$after_assoc['email']?></td>
                            </tr>
                            <tr>
                                <td>profile_Image.</td>
                                <td>  <img width="500" src="../uploads/users/<?= $after_assoc['profile_image']?>" alt=""></td>
                            </tr>
                            <tr>
                                <td>created_at</td>
                                <td><?=$after_assoc['created_at']?></td>
                            </tr>




                        </table>
                    </div>
                </div>
            </div>
        </div>
   
      </div><!-- sl-pagebody -->

  <?php require '../dashboard_includes/footer.php';?>