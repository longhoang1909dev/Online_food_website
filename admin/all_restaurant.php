</html>
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Tất cả nhà hàng</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1170d4c5e8.js" crossorigin="anonymous"></script>

    <style>
        tr,
        th {
            text-align: center !important;
        }

        td {
            text-align: start;
        }

        tr td:last-child {
            text-align: center !important;
        }

        /* input popular */
        form .search {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 18px;

        }

        form .search .search__input {
            font-family: inherit;
            font-size: inherit;
            box-shadow: 0 0 1em #00000013;
            border: none;
            color: #646464;
            padding: 0.7rem 1rem;
            border-radius: 6px;
            width: 35em;
            transition: all ease-in-out .5s;
            margin-right: -2rem;
        }

        form .search .search__input:hover,
        .search__input:focus {
            box-shadow: 0 0 1em #00000013;
        }

        form .search .search__input:focus {
            outline: none;
            /* background-color: #f0eeee; */
        }

        form .search .search__input:focus+.search__button {
            outline: none;
            /* background-color: #f0eeee; */
        }

        form .search .search__button {
            transition: all ease-in-out .5s;
            border: none;
            outline: none;
            background-color: white;
        }

        form .search .search__button:hover {
            cursor: pointer;
        }

        form .search .search__button .search__icon {
            font-size: 22px;
        }

        /*end input popular */
    </style>
</head>


<body class="fix-header fix-sidebar">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php" style="width: 100px; height: 50px;">
                        <span><img style="height: 100%;width: 100%;" src="images/logo.png" alt="homepage"
                                class="dark-logo" /></span>
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
                                        <div class="drop-title">Thông báo </div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Kiểm tra tất
                                                cả thông báo</strong> <i class="fa fa-angle-right"></i> </a>
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
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Người
                                    dùng</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i
                                    class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Nhà
                                    hàng</span></a>
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
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Đơn
                                    đặt</span></a></li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">Danh sách nhà hàng</h4>
                                </div>
                                <form method="get" action="index.php">
                                    <div class="search">
                                        <input type="text" name="search" class="search__input"
                                            placeholder="Tìm kiếm nhà hàng">
                                        <button class="search__button" type="submit">
                                            <i class="fa fa-search search-submit search__icon" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                                <div class="table-responsive m-t-40">
                                    <table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Thể loại món ăn </th>
                                                <th>Tên nhà hàng</th>
                                                <th>Email</th>
                                                <th>SĐT</th>
                                                <th>Website</th>
                                                <th>Giờ mở</th>
                                                <th>Giờ đóng</th>
                                                <th>Ngày mở</th>
                                                <th>Địa chỉ</th>
                                                <th style="width: 200px;">Hình ảnh</th>
                                                <th>Ngày tạo</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM restaurant order by rs_id desc";
                                            $query = mysqli_query($db, $sql);

                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="11"><center>No Restaurants</center></td>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {

                                                    $mql = "SELECT * FROM res_category where c_id='" . $rows['c_id'] . "'";
                                                    $res = mysqli_query($db, $mql);
                                                    $row = mysqli_fetch_array($res);

                                                    echo ' <tr><td>' . $row['c_name'] . '</td>
															<td>' . $rows['title'] . '</td>
															<td>' . $rows['email'] . '</td>
															<td>' . $rows['phone'] . '</td>
															<td>' . $rows['url'] . '</td>
															<td>' . $rows['o_hr'] . '</td>
															<td>' . $rows['c_hr'] . '</td>
															<td>' . $rows['o_days'] . '</td>
															<td>' . $rows['address'] . '</td>
															<td><div class="col-md-3 col-lg-8 m-b-10">
															<center><img src="Res_img/' . $rows['image'] . '" class="img-responsive radius"  style="min-width:150px;min-height:100px;"/></center>
															</div></td>
																								
															<td>' . $rows['date'] . '</td>
															<td><a href="delete_restaurant.php?res_del=' . $rows['rs_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
															<a href="update_restaurant.php?res_upd=' . $rows['rs_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
															</td></tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php include "include/footer.php" ?>

    </div>

    </div>



    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>


</html>