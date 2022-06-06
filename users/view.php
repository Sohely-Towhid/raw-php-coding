<?php 
session_start();
require '../session_check.php';
require '../db.php';
$select_users="SELECT * FROM users WHERE status=0";
$select_users_result=mysqli_query($dbconnect,$select_users);
$trash_users="SELECT * FROM users WHERE status=1";
$trash_users_result=mysqli_query($dbconnect,$trash_users);

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

      </div><!-- sl-pagebody -->
      <div class="row">
                  <div class="col-lg-12 m-auto">
                      <div class="card">
                            <div class="card-header">
                            <h3>User Information</h3>   
                            </div>
                            <?php if(isset($_SESSION['delete_user'])) { ?>
                                <div class="alert alert-success">
                                    <?=$_SESSION['delete_user']?>
                                </div>
                             <?php } unset($_SESSION['delete_user']); ?>  

                             <?php if(isset($_SESSION['status'])) { ?>
                                <div class="alert alert-success">
                                    <?=$_SESSION['status']?>
                                </div>
                             <?php } unset($_SESSION['status']); ?>   
                            <div class="card-body">
                                <form action="mark_delete.php" method="POST">
                            <table class="table">
                                <thead>
                                        <tr>
                                            <th><input type="checkbox"> checkAll</th>
                                        <th scope="col">SL</th>
                                        <th scope="col">name</th>
                                        <th scope="col">email</th>
                                        <th scope="col">profile_Image</th>
                                        <th scope="col">created at</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                    <tbody>
                                    <?php 
                                
                                    foreach($select_users_result as $key=>$user){?>
                                       <tr>
                                           <td><input name="mark[]" type="checkbox" class="checkall" value="<?=$user['id']?>"></td>
                                           <td><?= $key+1;?></td>
                                           <td><?= $user['name']?></td>
                                           <td><?= $user['email']?></td>
                                           <td>
                                           <img width="50" src="../uploads/users/<?= $user['profile_image']?>" alt="">
                                           </td>
                                           <td><?= $user['created_at']?></td>
                                           <td>
                                            <a  href="single_user.php?id=<?=$user['id']?>"  class="btn btn-primary">View</a>
                                            <a  href="edit_user.php?id=<?=$user['id']?>"  class="btn btn-success">Edit</a>
                                            <?php if($_SESSION['role']==1){?>
                                            <button  id="user_status.php?id=<?=$user['id']?>"class="btn btn-danger delete_btn" type="button">Delete</button>
                                            <?php } ?>
                                           </td>

                                       </tr>
                                            
                                                </div>







                                    <?php } ?>
                                    </tbody>
                                    
                            </table>
                                <button class="btn btn-danger">Delete All</button>
                            </form>
                            <?php 
                              $rowcount=mysqli_num_rows($select_users_result);
                            
                                if($rowcount==0){?>
                                <div class="alert alert-info">
                                    <p>No data found</p>
                                </div>
                                
                            
                            
                          <?php }  ?>
                            </div>
                        </div>
                 
                 
                 
                 
                    </div>
                    <div class="card mt-5">
                            <div class="card-header">
                            <h3>Trashed Information</h3>
                            </div>
                            <?php if(isset($_SESSION['delete_user'])) { ?>
                                <div class="alert alert-success">
                                    <?=$_SESSION['delete_user']?>
                                </div>
                             <?php } unset($_SESSION['delete_user']); ?>   
                            <div class="card-body">
                            <table class="table">
                                <thead>
                                        <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">name</th>
                                        <th scope="col"><email/th>
                                        <th scope="col">created at</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                    <tbody>
                                    <?php 
                                
                                    foreach($trash_users_result as $key=>$user){?>
                                       <tr>
                                           <td><?= $key+1;?></td>
                                           <td><?= $user['name']?></td>
                                           <td><?= $user['email']?></td> 
                                           <td><?= $user['created_at']?></td>
                                           <td>
                                            
                                            <a  href="restore.php?id=<?=$user['id']?>"  class="btn btn-success">Restore</a>

                                            <a class="btn btn-danger">Delete</a>
                                           </td>

                                       </tr>
                                            
                                                



                                    <?php } ?>
                                    </tbody>
                            </table>
                            <?php 
                              $rowcount=mysqli_num_rows($trash_users_result);
                            
                                if($rowcount==0){?>
                                <div class="alert alert-info">
                                    <p>No data found</p>
                                </div>
                                
                            
                            
                          <?php }  ?>
                            </div>
                        </div>
                 
                 
                 
                 
                    </div>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    

      <?php require '../dashboard_includes/footer.php';?>

  <script>
    $('.delete_btn').click(function(){

    
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href= $(this).attr('id');
            
            }
            })




    });


  </script>
   <script>
  $(function(){
    $(".checkAll").click(function(){
     $('input:checkbox').not(this).prop('checked',this.checked);
 });
  });


 </script>
  <?php 
  if(isset($_SESSION['soft_del'])){?>
  <script>
      Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
)
  </script>
  
 <?php } unset($_SESSION['soft_del']);?>
 
