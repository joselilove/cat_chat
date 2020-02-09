
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'others/head.php'; ?>
</head>

<body>

<?php include 'others/loading.php'; ?>   

   <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../assets/images/cat_wallpaper.PNG);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="register-form" action="" method="post">
                    <div class="text-center">
                        <a href="javascript:void(0)" class="db"><img src="../assets/images/catlogo.png" alt="Home" /></a>
                    </div>
                    <h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account and enjoy</small>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>

                    <!-- <div class="form-group ">
                        <div class="col-xs-12">
                            <label for="input-file-now">Upload your Profile Picture</label>
                            <input type="file" id="input-file-now" class="dropify" />
                        </div>
                    </div> -->
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="button" name="submit" id="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" onclick="register()" value="Sign Up">
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="login.php" class="text-info m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php include 'others/other_plugins.php'; ?>
</body>
<script type="text/javascript">
function register(){
  var data = $("#register-form").serialize();
  $.ajax({
         data: data,
         type: "post",
         url: "db/submit_register_user.php",
         success: function(data){
              if(data == 'Username already exist!.'){
                   // alert('Username Already Exist || Please check below!');
                   Swal.fire({
                              type: 'error',
                              title: 'Username Already Exist Please check below!',
                              text: 'Something went wrong!'
                            })
              }
              else{
                alert(data);
                    $(location).attr("href", 'login.php');
              }
         }
});
}


// $(document).on('click','#submit',function(e) {
  
//  });
</script>

</html>