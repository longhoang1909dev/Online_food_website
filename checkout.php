<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
function function_alert()
{
    echo "<script>alert('Cảm ơn. Đơn hàng của bạn đã được tiến hành');</script>";
    echo "<script>window.location.replace('your_orders.php');</script>";
}
if (empty($_SESSION["user_id"])) {
    echo "<script>alert('Bạn cần phải đăng nhập để thực hiện chức năng này');</script>";
    echo "<script>window.location.replace('login.php');</script>";
} else {
    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"] * $item["quantity"]);
        if ($_POST['submit']) {
            // if(empty($_POST['name_userorder']) || empty($_POST['phone_userorder']) || empty($_POST['address_userorder'])){
            //     $profile = mysqli_query($db, "select * from user where '" . $_SESSION['user_id'] . "'= u_id");
            //     $row_profile = mysqli_fetch_array($query);
            //     $_POST['name_userorder'] == $row_profile['f_name'];
            //     $_POST['phone_userorder'] == $row_profile['phone'];
            //     $_POST['address_userorder'] == $row_profile['address'];


            // }

            $SQL = "insert into users_orders(u_id,title,quantity,price,name_userorder,phone_useroder,address_userorder) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item_total . "', '" . $_POST['name_userorder'] . "','" . $_POST['phone_userorder'] . "','" . $_POST['address_userorder'] . "')";
            mysqli_query($db, $SQL);
            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Cảm ơn. Đơn hàng của bạn đã được đặt thành công";
            function_alert();
            $roww = mysqli_fetch_array(mysqli_query($db, "select MAX(o_id) from users_orders where o_id > 0"));
            mysqli_query($db, "insert into remark(frm_id,remark) values('" . $roww['MAX(o_id)'] . "',' không có lời nhắn')");
        }
    }
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>Xác nhận đơn hàng</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/fa53f0fa43.js" crossorigin="anonymous"></script>

        <style>
            .name_sdt {
                display: none;
            }

            .add_js {
                cursor: pointer;
            }
        </style>


    </head>

    <body>
        <div class="site-wrapper">
            <header id="header" class="header-scroll top-header headrom">
                <nav class="navbar navbar-dark">
                    <div class="container">
                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                        <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo.png" alt="" width="18%"> </a>
                        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                            <ul class="nav navbar-nav">
                                <li class="nav-item"> <a class="nav-link active" href="index.php">Trang chủ <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Danh sách nhà hàng
                                        <span class="sr-only"></span></a> </li>

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
                            <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Chọn nhà
                                    hàng</a></li>
                            <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Chọn món ăn mà bạn thích</a>
                            </li>
                            <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Đặt món và
                                    thanh toán</a></li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <span style="color:green;">
                        <?php echo $success; ?>
                    </span>
                </div>
                <div class="container m-t-30" style="margin-bottom: 115px; margin-top: 115px;">
                    <form action="" method="post">
                        <div class="widget clearfix" style="border: 1px solid #eaebeb; background: rgba(252, 251, 249, 0.68);">

                            <div class="widget-body">
                                <form method="post" action="#">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="cart-totals margin-b-20">
                                                <div class="cart-totals-title">
                                                    <h4>Đơn của bạn</h4>
                                                </div>
                                                <div class="cart-totals-fields">

                                                    <table class="table">
                                                        <tbody>
                                                            <tr class="row">
                                                                <td style="width: 25%;">Địa chỉ nhận hàng </td>
                                                                <td style="width: 25%;" class="address_default">Địa chỉ mặc định:
                                                                    <?php
                                                                    $query2  = mysqli_fetch_array(mysqli_query($db, "select * from users where u_id = '" . $_SESSION['user_id'] . "'"));
                                                                    echo $query2['l_name'] . ", " . $query2['phone'] . ", " . $query2['address'];
                                                                    ?>

                                                                </td>

                                                                <td style="width: 50%;">
                                                                    <a class="add_js" style="padding:20px">
                                                                        <i class="fa-solid fa-plus"></i>
                                                                    </a>
                                                                    <div class="name_sdt" style="margin-left:20px">
                                                                        <label style="width: 100px;" for="">Tên</label>
                                                                        <input style="outline: none;" type="text" name="name_userorder"><br>
                                                                        <label style="width: 100px;" for="">Số điện
                                                                            thoại</label>
                                                                        <input style="outline: none;" type="text" name="phone_userorder"> <br>
                                                                        <label style="width: 100px;" for="">Địa chỉ</label>
                                                                        <input style="outline: none;" type="text" name="address_userorder">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Chi phí món ăn</td>
                                                                <td>
                                                                    <?php echo number_format($item_total, 0, ',', '.') . " VNĐ"; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Chi phí vận chuyển</td>
                                                                <td>Miễn phí</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-color"><strong>Tổng cộng</strong></td>
                                                                <td class="text-color"><strong>
                                                                        <?php echo number_format($item_total, 0, ',', '.') . " VNĐ"; ?>
                                                                    </strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="payment-option">
                                                <ul class=" list-unstyled">
                                                    <li>
                                                        <label class="custom-control custom-radio  m-b-20">
                                                            <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Thanh toán khi nhận
                                                                hàng</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="custom-control custom-radio  m-b-10">
                                                            <input name="mod" type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Thanh toán online <img src="images/paypal.jpg" alt="" width="90"></span>
                                                        </label>
                                                    </li>
                                                </ul>
                                                <p class="text-xs-center"> <input type="submit" onclick="return confirm('Bạn có muốn đặt món ăn này');" name="submit" class="btn btn-success btn-block" value="Đặt hàng">
                                                </p>
                                            </div>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>
        <?php include "include/footer.php" ?>
        </div>
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
    <script>
        var name_sdt = document.querySelector('.name_sdt')
        var add_name_sdt = document.querySelector('.add_js')


        add_name_sdt.addEventListener('click', function() {

            name_sdt.style.display == 'none' ? name_sdt.style.display = 'block' : name_sdt.style.display = 'none'
        })
    </script>


</html>

<?php
}
?>