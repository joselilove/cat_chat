<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo '
        <script type="text/javascript">
        alert("No Account Login!!");
        document.location = "login.php";
        </script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'others/head.php'; ?>
</head>
<input type="hidden" id="username" value="<?php echo $_SESSION['username'] ?>">

<body class="wp-menu skin-blue-dark fixed-layout" style="background-image:url(../assets/images/cat_wallpaper.PNG);">
    <?php include 'others/loading.php'; ?>

    <div id="main-wrapper">

        <div class="page-wrapper float-right" style="margin-top: -54px;" style="width: 80px;">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-30">
                        <div class="card m-b-0">
                            <!-- .chat-row -->
                            <div>

                                <div class="chat-right-aside">
                                    <div class="chat-main-header">
                                        <div class="p-1 b-b">
                                            <a href="javascript:void(0)" class="d-flex justify-content-center"><img src="../assets/images/catlogo.png" alt="Home" /></a>
                                            <h4 class="box-title center">
                                                <span class="text-uppercase"><?php echo $_SESSION['username']; ?></span>
                                                <span class="float-right text-danger"><a href="#" id="logout">Logout</a></span>
                                            </h4>
                                            <center><span class="font-weight-bold" id="typing"></span></center>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="chat-rbox">
                                        <ul class="chat-list p-3">

                                            <div id="conversation">

                                            </div>
                                            <!--chat Row -->
                                            <!-- <li>
                                                <div class="chat-content">
                                                    <h5>James Anderson</h5>
                                                    <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing & type setting industry.</div>
                                                </div>
                                            </li>
                                            
                                            <li class="reverse">
                                                <div class="chat-content">
                                                    <h5>Steave Doe</h5>
                                                    <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                                </div>
                                            </li> -->
                                            <span id="go1" class="invisible">------------------------------------------------------------------------------------------------------------------</span>
                                        </ul>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row">
                                            <div class="col-8">
                                                <textarea placeholder="Type your message here" id="msg" class="form-control border-0" onkeypress="update_typing_status_yes()"></textarea>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button href='#go1' type="button" id="send_msg" class="btn btn-info btn-circle btn-lg"><i class="fas fa-paper-plane"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <?php include 'others/other_plugins.php'; ?>
</body>

<script type="text/javascript">
    $(document).ready(function(e) {
        $.ajaxSetup({
            cache: false
        });
        setInterval(function() {
            find_typing();
            fetch_conversation();
            if ($('#msg').val() == '') {
                update_typing_status_no();
            }
        }, 2000);
    });
    $(document).on('click', '#logout', function(e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                $(location).attr("href", 'db/logout.php');
            }
        })
    });

    function fetch_conversation() {
        $.ajax({
            type: "get",
            url: "db/fetch_conversation.php",
            success: function(data) {
                Obj = JSON.parse(data);
                show_conversation(Obj);
            }
        });
    }

    function show_conversation(data) {
        var display = '';
        var current_username = $('#username').val();

        for (var i = 0; i < data.id.length; i++) {
            if (current_username == data.username[i]) {
                //current usrs
                display += '<li class="reverse">' +
                    '<div class="chat-content">' +
                    '<h5 class="text-uppercase">' + data.username[i] + '</h5>' +
                    '<div class="box bg-light-info">' + data.msg[i] + '</div>' +
                    '</div>' +
                    '</li>';
            } else {
                //other users
                display += '<li>' +
                    '<div class="chat-content">' +
                    '<h5 class="text-uppercase">' + data.username[i] + '</h5>' +
                    '<div class="box bg-light-inverse">' + data.msg[i] + '</div>' +
                    '</div>' +
                    '</li>';
            }
        }

        $('#conversation').html(display);
    }

    function find_typing() {
        var display = '';
        $.ajax({
            type: 'get',
            url: 'db/find_typing.php',
            success: function(data) {
                if (data == 'yes') {
                    $('#typing').html('Someone is Typing');
                } else {
                    $('#typing').html('');
                }
            }
        });
    }

    function update_typing_status_yes() {
        $.ajax({
            type: 'get',
            url: 'db/update_typing_status_to_yes.php',
            success: function(data) {
                // alert(data);
            }
        });
    }

    function update_typing_status_no() {
        $.ajax({
            type: 'get',
            url: 'db/update_typing_status_to_no.php',
            success: function(data) {
                // alert(data);
            }
        });
    }

    $(document).on('click', '#send_msg', function(e) {
        var data = $('#msg').val();

        $.ajax({
            data: 'msg=' + data,
            type: 'get',
            url: 'db/send_msg.php',
            success: function(data) {
                $('#msg').val('');
                fetch_conversation();
            }
        });
    });
</script>

</html>