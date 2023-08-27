<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['c_name']) || empty($_POST['res_name']) || $_POST['email'] == '' || $_POST['phone'] == '' || $_POST['url'] == '' || $_POST['o_hr'] == '' || $_POST['c_hr'] == '' || $_POST['o_days'] == '' || $_POST['address'] == '') {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Vui lòng nhập đầy đủ thông tin vào các ô trống!</strong>
															</div>';



    } else {

        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;

        $store = "Res_img/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {


                $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Vượt quá kích cỡ cho phép!</strong> Vui lòng thử ảnh khác.
															</div>';

            } else {


                $res_name = $_POST['res_name'];

                $sql = "INSERT INTO restaurant(c_id,title,email,phone,url,o_hr,c_hr,o_days,address,image) VALUE('" . $_POST['c_name'] . "','" . $res_name . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . $_POST['url'] . "','" . $_POST['o_hr'] . "','" . $_POST['c_hr'] . "','" . $_POST['o_days'] . "','" . $_POST['address'] . "','" . $fnew . "')"; // store the submited data ino the database :images
                mysqli_query($db, $sql);
                move_uploaded_file($temp, $store);

                $success = '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																 Thêm nhà hàng thành công.
															</div>';


            }
        } elseif ($extension == '') {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Vui lòng lựa chọn ảnh</strong>
															</div>';
        } else {

            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid extension!</strong>png, jpg, Gif are accepted.
															</div>';

        }
    }
}


?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Thêm nhà hàng</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="images/icn.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>

                    <ul class="navbar-nav my-lg-0">



                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Thông báo</div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Kiểm tra tất cả thông báo</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>




                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png"
                                    alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">


            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Trang chủ</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Tổng quan</span></a></li>
                        <li class="nav-label">Danh mục</li>
                        <li> <a href="all_users.php"> <span><i
                                        class="fa fa-user f-s-20 "></i></span><span>Người dùng</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i
                                    class="fa fa-archive f-s-20 color-warning"></i><span
                                    class="hide-menu">Nhà hàng</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">Tất cả nhà hàng</a></li>
                                <li><a href="add_category.php">Thêm thể loại món ăn</a></li>
                                <li><a href="add_restaurant.php">Thêm nhà hàng</a></li>


                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery"
                                    aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">Tất cả Menues</a></li>
                                <li><a href="add_menu.php">Thêm Menu</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><span>Đơn đặt</span></a></li>

                    </ul>
                </nav>

            </div>


        </div>

        <div class="page-wrapper">
            <div style="padding-top: 10px;">
            <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> <a href="#">Longhoang food_online</a> là
                    một trong những trang web có thể giúp bạn tận hưởng những món ăn ngon mà không cần phải di chuyển.
                </marquee>
            </div>




            <div class="container-fluid">



                <?php echo $error;
                echo $success; ?>





                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Thêm nhà hàng</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">

                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tên nhà hàng</label>
                                                <input type="text" name="res_name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Email liên hệ</label>
                                                <input type="text" name="email"
                                                    class="form-control form-control-danger">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Số điện thoại </label>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Website nhà hàng</label>
                                                <input type="text" name="url" class="form-control form-control-danger">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Giờ mở cửa</label>
                                                <select name="o_hr" class="form-control custom-select"
                                                    data-placeholder="Choose a Category">
                                                    <option>--Lựa chọn giờ mở cửa--</option>
                                                    <option value="1am">1:00</option>
                                                    <option value="2am">2:00</option>
                                                    <option value="3am">3:00</option>
                                                    <option value="4am">4:00</option>
                                                    <option value="5am">5:00</option>
                                                    <option value="6am">6:00</option>
                                                    <option value="7am">7:00</option>
                                                    <option value="8am">8:00</option>
                                                    <option value="9am">9:00</option>
                                                    <option value="10am">10:00</option>
                                                    <option value="11am">11:00</option>
                                                    <option value="12am">12:00</option>
                                                    <option value="1pm">13:00</option>
                                                    <option value="2pm">14:00</option>
                                                    <option value="3pm">15:00</option>
                                                    <option value="4pm">16:00</option>
                                                    <option value="5pm">17:00</option>
                                                    <option value="6pm">18:00</option>
                                                    <option value="7pm">19:00</option>
                                                    <option value="8pm">20:00</option>
                                                    <option value="9pm">21:00</option>
                                                    <option value="10pm">22:00</option>
                                                    <option value="11pm">23:00</option>
                                                    <option value="12pm">24:00</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Giờ đóng cửa</label>
                                                <select name="c_hr" class="form-control custom-select"
                                                    data-placeholder="Choose a Category">
                                                    <option>--Lựa chọn giờ đóng cửa--</option>
                                                    <option value="1am">1:00</option>
                                                    <option value="2am">2:00</option>
                                                    <option value="3am">3:00</option>
                                                    <option value="4am">4:00</option>
                                                    <option value="5am">5:00</option>
                                                    <option value="6am">6:00</option>
                                                    <option value="7am">7:00</option>
                                                    <option value="8am">8:00</option>
                                                    <option value="9am">9:00</option>
                                                    <option value="10am">10:00</option>
                                                    <option value="11am">11:00</option>
                                                    <option value="12am">12:00</option>
                                                    <option value="1pm">13:00</option>
                                                    <option value="2pm">14:00</option>
                                                    <option value="3pm">15:00</option>
                                                    <option value="4pm">16:00</option>
                                                    <option value="5pm">17:00</option>
                                                    <option value="6pm">18:00</option>
                                                    <option value="7pm">19:00</option>
                                                    <option value="8pm">20:00</option>
                                                    <option value="9pm">21:00</option>
                                                    <option value="10pm">22:00</option>
                                                    <option value="11pm">23:00</option>
                                                    <option value="12pm">24:00</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Ngày mở cửa</label>
                                                <select name="o_days" class="form-control custom-select"
                                                    data-placeholder="Choose a Category" tabindex="1">
                                                    <option>--Lựa chọn ngày mở cửa--</option>
                                                    <option value="Mon-Tue">T2-T3</option>
                                                    <option value="Mon-Wed">T2-T4</option>
                                                    <option value="Mon-Thu">T2-T5</option>
                                                    <option value="Mon-Fri">T2-T6</option>
                                                    <option value="Mon-Sat">T2-T7</option>
                                                    <option value="24hr-x7">Cả tuần</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Hình ảnh</label>
                                                <input type="file" name="file" id="lastName"
                                                    class="form-control form-control-danger" placeholder="12n">
                                            </div>
                                        </div>





                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Lựa chọn thể loại</label>
                                                <select name="c_name" class="form-control custom-select"
                                                    data-placeholder="Choose a Category" tabindex="1">
                                                    <option>--Lựa chọn thể loại--</option>
                                                    <?php $ssql = "select * from res_category";
                                                    $res = mysqli_query($db, $ssql);
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        echo ' <option value="' . $row['c_id'] . '">' . $row['c_name'] . '</option>';
                                                        ;
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>



                                    </div>

                                    <h3 class="box-title m-t-40">Địa chỉ nhà hàng</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">

                                                <textarea name="address" type="text" style="height:100px;"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="Lưu">
                            <a href="add_restaurant.php" class="btn btn-inverse">Hủy bỏ</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php include "include/footer.php" ?>
        </div>

    </div>

    </div>


    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>