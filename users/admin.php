<?php 
session_start();
require '../db.php';
require '../session_check.php';

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
          <h5>Welcome to ugly page</h5>
        
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php require '../dashboard_includes/footer.php';?>
<?php if(isset($_SESSION['login'])){ ?>
  <script>
    const Toast=Swal.mixin({
      toast: true,
      position:'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast)=>{
        toast.addEventListener('mouseenter',Swal.stopTimer)
        toast.addEventListener('mouseenter',Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon:'success',
      title:'signed in successfully'
    })
  </script>

<?php } unset($_SESSION['login'])?>