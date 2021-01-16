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
                <form class="form-horizontal form-material text-center" id="loginform">
                    <a href="javascript:void(0)" class="db"><img src="../assets/images/catlogo.png" alt="Home" /></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">

                    </div>
                </form>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" id="submit">Log In</button>
                    </div>

                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        Don't have an account? <a href="register.php" class="text-primary m-l-5"><b>Sign Up</b></a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php include 'others/other_plugins.php'; ?>

</body>

<script type="text/javascript">
    $(document).on('click', '#submit', function(e) {
        var data = $("#loginform").serialize();
        $.ajax({
            data: data,
            type: "post",
            url: "db/submit_login.php",
            success: function(data) {
                if (data != 'Invalid Username or Password!') {
                    alert("Welcome");
                    $(location).attr("href", 'home.php');
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Invalid Username or Password!',
                        text: 'Something went wrong!'
                    })
                }
            }
        });
    });
</script>

</html>