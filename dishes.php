<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
include_once 'product-action.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $res_id = $_GET['res_id'];
    header('Location: dishes.php?res_id=' . $res_id);
    exit;
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Món ăn</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fa53f0fa43.js" crossorigin="anonymous"></script>

    <style>
        .row div:nth-child(1) {
            background: unset;
        }

        .menu-widget {
            background: unset;
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
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Chọn nhà hàng</a>
                    </li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a
                            href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>">Chọn món ăn mà bạn thích</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Đặt món và thanh toán</a></li>
                </ul>
            </div>
        </div>
        <?php $ress = mysqli_query($db, "select * from restaurant where rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);
        ?>
        <section class="inner-page-hero bg-image" data-image-src="images/img/restrrr.png">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure>
                                    <?php echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="Restaurant logo">'; ?>
                                </figure>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#">
                                        <?php echo $rows['title']; ?>
                                    </a></h6>
                                <p>
                                    <?php echo $rows['address']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="breadcrumb">
            <div class="container">
            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                    <div class="widget widget-cart b-d-ea">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Món ăn bạn chọn
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
                                $item_total = 0;
                                foreach ($_SESSION["cart_item"] as $item) {
                                    ?>
                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a
                                            href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                    </div>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input style="color: black;" type="text" class="form-control b-r-0" value=<?php echo number_format($item["price"], 0, ',', '.') . " VNĐ"; ?> readonly
                                                id="exampleSelect1">
                                        </div>
                                        <div class="col-xs-4">
                                            <input style="color: #000;" class="form-control" type="text" readonly
                                                value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>
                                    </div>
                                    <?php
                                    $item_total += ($item["price"] * $item["quantity"]);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>Tổng cộng</p>
                                <h3 class="value"><strong>
                                        <?php echo number_format($item_total, 0, ',', '.') . " VNĐ"; ?>
                                    </strong></h3>
                                <p>Miễn phí vận chuyển</p>
                                <?php
                                if ($item_total == 0) {
                                    ?>
                                    <a  href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check"
                                        class="btn btn-danger btn-lg disabled">Xác nhận đơn</a>
                                    <?php
                                } else {
                                    ?>
                                    <a  href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check"
                                        class="btn btn-success btn-lg active">Xác nhận đơn</a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="menu-widget b-d-ea" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                MENU <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2"
                                    aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php
                            $stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
                            $stmt->execute();
                            $products = $stmt->get_result();
                            if (!empty($products)) {
                                foreach ($products as $product) {
                                    ?>
                                    <div class="food-item m-b">
                                        <div class="row ">
                                            <form method="post"
                                                action='dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                <div class="col-xs-12 col-sm-12 col-lg-8">
                                                    <div class="rest-logo pull-left">
                                                        <a class="restaurant-logo pull-left" href="#">
                                                            <?php echo '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="Food logo">'; ?>
                                                        </a>
                                                    </div>
                                                    <div class="rest-descr">
                                                        <h6><a href="#">
                                                                <?php echo $product['title']; ?>
                                                            </a></h6>
                                                        <p>
                                                            <?php echo $product['slogan']; ?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info">
                                                    <span class="price pull-left">
                                                        <?php echo number_format($product['price'], 0, ',', '.') . " VNĐ"; ?>
                                                    </span>
                                                    <input class="b-r-1px" type="text" name="quantity"
                                                        style=" padding: 4px 11px;" value="1" size="2" />
                                                    <input type="submit" class="btn theme-btn" value="Thêm" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "include/footer.php" ?>
    </div>
    </div>
    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span> </button>
                <div class="modal-body cart-addon">
                    <div class="food-item white">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70"
                                            alt="Food logo"></a>
                                </div>
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$
                                    2.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect2">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70"
                                            alt="Food logo"></a>
                                </div>
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$
                                    2.49</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect3">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70"
                                            alt="Food logo"></a>
                                </div>
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$
                                    1.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect5">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-4">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70"
                                            alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$
                                    3.15</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect6">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-btn">Add To Cart</button>
                </div>
            </div>
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

</html>