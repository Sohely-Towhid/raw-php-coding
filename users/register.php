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



    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>

        <form action="post.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <input value="<?=(isset($_SESSION['name']))?$_SESSION['name']:''; ?>" type="text" name="name" class="form-control" placeholder="Enter your Name">
          <?php if(isset( $_SESSION['errors']['name'])){ ?>
                            <div class="alert alert-danger mt-2">
                               <?= $_SESSION['errors']['name'];?> 
                            </div>
                              
                        <?php } unset($_SESSION['errors']['name'])?>
          
        </div><!-- form-group -->
        <div class="form-group">
          <input value="<?=(isset($_SESSION['email']))?$_SESSION['email']:''; ?>"type="email" name="email" class="form-control" placeholder="Enter your email">

          <?php if(isset( $_SESSION['errors']['email'])){ ?>
                              <div class="alert alert-danger mt-2">
                               <?= $_SESSION['errors']['email'];?> 
                              </div>
                              
                            <?php } unset($_SESSION['errors']['email'])?>
                            <?php if(isset( $_SESSION['email_exists'])){ ?>
                              <div class="alert alert-warning mt-2">
                               <?= $_SESSION['email_exists'];?> 
                              </div>
                              
          <?php } unset($_SESSION['email_exists'])?>
        </div><!-- form-group -->
        <div class="form-group">
          <input value="<?=(isset($_SESSION['password']))?$_SESSION['password']:''; ?>" type="password"  name="password" class="form-control" placeholder="Enter your password">
          <?php if(isset( $_SESSION['errors']['password'])){ ?>
                                <div class="alert alert-danger mt-2">
                                <?= $_SESSION['errors']['password'];?> 
                                </div>
                              
             <?php } unset($_SESSION['errors']['password'])?>
        </div><!-- form-group -->
        <div class="form-group">
              <label class="custom-file">
                <input type="file" name="profile_image" id="file" class="custom-file-input from-control-lg">
                <?php if(isset( $_SESSION['errors']['password'])){ ?>
                                <div class="alert alert-danger mt-2">
                                <?= $_SESSION['errors']['password'];?> 
                                </div>
                              
                              <?php } unset($_SESSION['errors']['password'])?>
                <span class="custom-file-control"></span>
              </label>
                     <?php if(isset( $_SESSION['extension'])){ ?>
                              <div class="alert alert-warning mt-2">
                               <?= $_SESSION['extension'];?> 
                              </div>
                              
                            <?php } unset($_SESSION['extension'])?>

                            <?php if(isset( $_SESSION['size'])){ ?>
                              <div class="alert alert-warning mt-2">
                               <?= $_SESSION['size'];?> 
                              </div>
                              
                            <?php } unset($_SESSION['size'])?>

            </div>
            <div class="form-group">
              <label for="">select role</label>
              <select name="role" id="" class="form-control">
                <option value="1">Admin</option>
                <option value="2">Modarator</option>
                <option value="3">Editor</option>
                <option value="0">members</option>
              </select>




            </div>

        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <button type="submit" class="btn btn-info btn-block">Sign Up</button>
        </form>

        <div class="mg-t-40 tx-center">Already have an account? <a href="/my_work/login/login.php" class="tx-info">Sign In</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

</div>
</div>

<?php
require '../dashboard_includes/footer.php';
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['password']);


?>