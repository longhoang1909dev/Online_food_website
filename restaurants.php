<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Danh sách nhà hàng</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fa53f0fa43.js" crossorigin="anonymous"></script>


    <style>
        .restaurants-page .container .row .img {
            background-image: url(https://2sao.vietnamnetjsc.vn/images/2017/06/21/10/01/cham-ngon-nguoi-nang-can-15.jpg);
            margin-bottom: 20px;
            border-radius: 6px;
            background-position: center;
        }

        .food {
            border-bottom: 1px solid black;
            padding-bottom: 20px;
            height: 150px;
            overflow: hidden;
        }

        .show-restaurant {
            border-bottom: 1px solid black;
            height: 150px;
        }
    </style>
</head>

<body>
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo.png" alt="" width="18%"> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Trang chủ <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Danh sách nhà hàng <span class="sr-only"></span></a> </li>
                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Đăng nhập</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Đăng kí</a> </li>';
                        } else {
                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Món ăn đã đặt</a> </li>';
                            echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Đăng xuất</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-wrapper">
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="#">Chọn nhà hàng</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Chọn món ăn mà bạn thích</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Đặt món và thanh toán</a></li>
                </ul>
            </div>
        </div>
        <div class="inner-page-hero bg-image" data-image-src="images/img/pimg.jpg">
            <div class="container"> </div>
        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <section class="restaurants-page">
            <div class="container">
                <div class="row" style="display:flex; ">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3 img">
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry" style="border-radius: 6px">
                            <div class="row" style="margin: 0;">
                                <?php $ress = mysqli_query($db, "select * from restaurant");
                                while ($rows = mysqli_fetch_array($ress)) {

                                    echo ' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left food">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id=' . $rows['rs_id'] . '" > <img style="height: 120px; width: 100%;" src="admin/Res_img/' . $rows['image'] . '" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '" >' . $rows['title'] . '</a></h5> <span>' . $rows['address'] . '</span>
																
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center show-restaurant">
																<div class="right-content bg-white">
																	<div class="right-review">
																		
																		<a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="btn btn-purple" style="box-shadow: 0.1rem 0.1rem 0.2rem royalblue;">Xem Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <?php include "include/footer.php" ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>


</html>