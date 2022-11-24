<?php
session_start();
include("../classes/database.php");
include("../classes/chat.php");
if(isset($_POST['chat'])){
    $message=$_POST['message'];

    $object=new Chat($message);
    $object->UserChat();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
      <!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-info">
    <div class="container">

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                  <?php
                    if(isset($_SESSION['user_image'])){
                        echo $_SESSION['user_image'];
                    }
                  ?>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                  <?php
                    if(isset($_SESSION['name'])){
                        echo $_SESSION['name'];
                    }
                  ?>
              </a>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-secondary">Account</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="../pages/logout.php" class="dropdown-item">Logout</a></li>
                </ul>
            </li>
      </ul>
    </div>
</nav>


<div class="container">
    <div class="row my-4">
        <div class="col-10 d-flex justify-content-center align-items-center">
            <div class="card direct-chat direct-chat-warning">
                    <div class="card-header bg-purple">
                        <h3 class="card-title">Direct Chat</h3>
                        <div class="card-tools">
                        <span title="3 New Messages" class="badge badge-warning">3</span>
                        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments text-white"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        
                        <?php
                            $object=new Chat(null);
                            $object->RenderTexts();
                        ?>

                        <!-- /.direct-chat-msg -->

                        </div>
                        <!--/.direct-chat-messages-->

                        <!-- Contacts are loaded here -->
                        <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="../images/profile3.jpeg" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Count Dracula
                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                </span>
                                <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="../images/profile5.jpeg" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Sarah Doe
                                    <small class="contacts-list-date float-right">2/23/2015</small>
                                </span>
                                <span class="contacts-list-msg">I will be waiting for...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="../images/profile3.jpeg" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Nadia Jolie
                                    <small class="contacts-list-date float-right">2/20/2015</small>
                                </span>
                                <span class="contacts-list-msg">I'll call you back at...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="images/profile2.jpeg" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Nora S. Vans
                                    <small class="contacts-list-date float-right">2/10/2015</small>
                                </span>
                                <span class="contacts-list-msg">Where is your new...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                        </ul>
                        <!-- /.contacts-list -->
                        </div>
                        <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <form action="#" method="post">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-append">
                            <button type="submit" name="chat" class="btn btn-warning">Send</button>
                            </span>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-footer-->
            </div>
        </div>
    </div>
</div>



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../admin/plugins/raphael/raphael.min.js"></script>
<script src="../admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../admin/dist/js/pages/dashboard2.js"></script>
</body>
</html>