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
          <div class="col-lg-6 m-auto">
            <div class="card">
              <div class="card-header bg-primary text-center">
                <h3 class="text white">Update User FROM</h3>
                
              </div>
                 <?php if(isset($_SESSION['update_success'])){?>
                    <div class="alert alert-success">
                        <?=$_SESSION['update_success'];?>
                    </div>
                 <?php } unset($_SESSION['update_success']);?>
              <div class="card-body">
                
                <form action="update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your name</label>
                        <input value="<?=$after_assoc['name']?>" name="name" type="text" class="form-control" >
                        <input value="<?=$after_assoc['id']?>" name="id" type="hidden" class="form-control" >
                            
                       
                    </div>  
                        
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input value="<?=$after_assoc['email']?>" name="email" type="email" class="form-control" >
                         
                      </div>  
                      
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input value="<?=$after_assoc['password']?>" name="password" type="password" class="form-control" >
                             
                          </div>
                          <div class="mb-3">
                          <img width="50" src="../uploads/users/<?=$after_assoc['profile_image']?>" alt="">
                            <label for="exampleInputPassword1" class="form-label">Profile Image</label>
                            <input  name="profile_image" type="file" class="form-control" >
                             
                          </div>
                      
                          <button type="submit" class="btn btn-primary">Update</button>
                </form>

                
              </div>
             </div>
          </div>










        </div>
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
        
        <?php require '../dashboard_includes/footer.php';?>