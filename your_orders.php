<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
} else {

    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>Món ăn đã đặt</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/fa53f0fa43.js" crossorigin="anonymous"></script>
        <style type="text/css" rel="stylesheet">
            .indent-small {
                margin-left: 5px;
            }

            .form-group.internal {
                margin-bottom: 0;
            }

            .dialog-panel {
                margin: 10px;
            }

            .datepicker-dropdown {
                z-index: 200 !important;
            }


            tr {
                text-align: center;
            }

            th {
                text-align: center;
            }
            td{
                text-align: left;
            }

            .panel-body {
                background: #e5e5e5;
                background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
                background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
                font: 600 15px "Open Sans", Arial, sans-serif;
            }

            label.control-label {
                font-weight: 600;
                color: #777;
            }
        </style>

    </head>

    <body>
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                        data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo.png" alt=""
                            width="18%"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Trang chủ <span
                                        class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Danh sách nhà hàng <span
                                        class="sr-only"></span></a> </li>
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
                <div class="container" style="margin-bottom: 100px;    margin-top: 100px;">
                    <div class="row" style="box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;">
                        <div class="col-xs-12">
                        </div>
                        <div class="col-xs-12">
                            <div class="bg-gray">
                                <div class="row">

                                    <table class="table table-bordered table-hover">
                                        <thead style="background: #404040; color:white;">
                                            <tr>
                                                <th style="width: 120px;">Tên món ăn</th>
                                                <th style="width: 100px;">Số lượng</th>
                                                <th>Giá</th>
                                                <th style="width: 150px;">Tên người nhận</th>
                                                <th style="width: 150px;">SĐT người nhận</th>
                                                <th style="width: 110px;">Địa chỉ</th>
                                                <th>Trạng thái</th>
                                                <th>Lời nhắn</th>
                                                <th>Ngày</th>
                                                <th style="width: 110px;">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query2 = mysqli_fetch_array(mysqli_query($db, "select * from users where u_id = '" . $_SESSION['user_id'] . "'"));
                                            $query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "' order by o_id DESC");
                                            if (!mysqli_num_rows($query_res) > 0) {
                                                echo '<td colspan="6"><center>Bạn không có đơn đặt nào. </center></td>';
                                            } else {

                                                while ($row = mysqli_fetch_array($query_res)) {
                                                    ?>
                                                    <tr>
                                                        <td data-column="Item">
                                                            <?php echo $row['title']; ?>
                                                        </td>
                                                        <td data-column="Quantity">
                                                            <?php echo $row['quantity']; ?>
                                                        </td>
                                                        <td data-column="price">
                                                            <?php
                                                            echo number_format($row['price'], 0, ',', '.'); ?> VNĐ
                                                        </td>
                                                        <td data-column="address">
                                                            <?php
                                                            if (empty($row['name_userorder'])) {
                                                                echo $query2['f_name'] . " " . $query2['l_name'];
                                                            }
                                                            echo $row['name_userorder']; ?>
                                                        </td>
                                                        <td data-column="">
                                                            <?php
                                                            if (empty($row['phone_useroder'])) {
                                                                echo $query2['phone'];
                                                            }
                                                            echo $row['phone_useroder']; ?>
                                                        </td>
                                                        <td data-column="">
                                                            <?php
                                                            if (empty($row['address_userorder'])) {
                                                                echo $query2['address'];
                                                            }
                                                            echo $row['address_userorder']; ?>
                                                        </td>
                                                        <td data-column="status">
                                                            <?php
                                                            $status = $row['status'];
                                                            if ($status == "" or $status == "NULL") {
                                                                ?>
                                                                <button type="button" class="btn btn-info"><span class="fa fa-bars"
                                                                        aria-hidden="true"></span> Đang chế biến</button>
                                                                <?php
                                                            }
                                                            if ($status == "in process") { ?>
                                                                <button type="button" class="btn btn-warning"><span
                                                                        class="fa fa-cog fa-spin" aria-hidden="true"></span> Đang vận
                                                                    chuyển</button>
                                                                <?php
                                                            }
                                                            if ($status == "closed") {
                                                                ?>
                                                                <button type="button" class="btn btn-success"><span
                                                                        class="fa fa-check-circle" aria-hidden="true"></span> Đã giao
                                                                    hàng</button>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($status == "rejected") {
                                                                ?>
                                                                <button type="button" class="btn btn-danger"> <i
                                                                        class="fa fa-close"></i> Hủy bỏ</button>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td data-column="message">
                                                            <?php
                                                            $query_remark = mysqli_query($db, "select * from remark where '" . $row['o_id'] . "'= frm_id");

                                                            while ($roww = mysqli_fetch_array($query_remark)) {
                                                                echo $roww['remark'];
                                                            }
                                                            ?>

                                                        </td>
                                                        <td data-column="Date">
                                                            <?php echo $row['date']; ?>
                                                        </td>
                                                        <?php
                                                        if ($status != 'closed') {

                                                            ?>
                                                            <td data-column="Action"> <a
                                                                    href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>"
                                                                    onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này chứ?');"
                                                                    class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i
                                                                        class="fa fa-trash-o" style="font-size:16px"></i></a>

                                                                <?php
                                                        }
                                                        ?>

                                                        </td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>

        <?php include "include/footer.php" ?>
        </div>

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
    <?php
}
?>