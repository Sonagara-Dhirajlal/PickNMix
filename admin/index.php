<?php

require './includes/init.php';
include pathOf("auth.php");
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

$userQuery = "SELECT 
    u.Id,
    u.Name, 
    u.MobileNumber, 
    u.Email, 
    u.Address, 
    u.City,
    u.State, 
    u.Username, 
    u.Password, 
    u.Image, 
    r.Rolename AS RoleId
FROM user u
INNER JOIN role r ON u.RoleId = r.Id";

$userResult = mysqli_query($conn, $userQuery);


$orderDetailsQuery = "SELECT 
    o.Id AS OrderId, 
    o.Name AS OrderName, 
    o.TotalAmount, 
    o.Mobile AS OrderMobile, 
    o.Payment, 
    o.Address AS OrderAddress, 
    o.City AS OrderCity, 
    o.Country, 
    od.ProductName, 
    od.Quantity, 
    od.ProductPrice, 
    od.TotalPrice, 
    od.Image 
FROM `order` o 
INNER JOIN `orderdetails` od ON o.Id = od.OrderId 
ORDER BY o.OrderDate DESC";

$orderDetailsResult = mysqli_query($conn, $orderDetailsQuery);

$pendingOrdersQuery = "SELECT * FROM `order` ";
$pendingOrdersResult = mysqli_query($conn, $pendingOrdersQuery);

?>





<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= urlOf('') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Home</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Home</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- <div class="col-md-4 col-sm-6">
                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-4.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <h5 class="mb-4">Daily Sales</h5>
                        <div class="d-flex align-items-center mt-3">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0">249.95</h3>
                            <span class="badge bg-light-success ms-2">36%</span>
                        </div>
                        <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this daily</p>
                        <div class="progress" style="height: 7px">
                            <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-4 col-sm-6">
                <div class="card statistics-card-1 overflow-hidden">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-5.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <h5 class="mb-4">Monthly Sales</h5>
                        <div class="d-flex align-items-center mt-3">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0">249.95</h3>
                            <span class="badge bg-light-primary ms-2">20%</span>
                        </div>
                        <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this Monthly</p>
                        <div class="progress" style="height: 7px">
                            <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-4 col-sm-12">
                <div class="card statistics-card-1 overflow-hidden bg-brand-color-3">
                    <div class="card-body">
                        <img src="<?= urlOf('assets/images/widget/img-status-6.svg') ?>" alt="img"
                            class="img-fluid img-bg" />
                        <h5 class="mb-4 text-white">Yearly Sales</h5>
                        <div class="d-flex align-items-center mt-3">
                            <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">249.95</h3>
                        </div>
                        <p class="text-white text-opacity-75 mb-2 text-sm mt-3">You made an extra 35,000 this Daily</p>
                        <div class="progress bg-white bg-opacity-10" style="height: 7px">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-md-6 col-xl-12">
                <div class="card table-card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3">
                        <h5>Recent Users</h5>
                        <!-- <div class="dropdown">
                            <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons-two-tone f-18">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Edit</a>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-body py-2 px-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-sm mb-0">
                                <tbody>
                                    <?php while($rows=mysqli_fetch_assoc($userResult)) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <img src="<?= "./assets/images/user/" . $rows['Image'] ?>"
                                                    alt="user image" class="img-radius align-top m-r-15"
                                                    style="width: 40px" />
                                                <div class="d-inline-block">
                                                    <h6 class="m-b-0"><?= $rows['Name'] ?></h6>
                                                    <p class="m-b-0"><?= $rows['RoleId'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0">Mo. <?= $rows['MobileNumber'] ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="mb-0"><?= $rows['Email'] ?>
                                            </p>
                                        </td>
                                        <td class="text-end">
                                            <p class="mb-0"><?= $rows['City'] ?></p>
                                            <p class="mb-0"><?= $rows['State'] ?></p>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-12">
                <div class="card table-card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3">
                        <h5>Recent Oreders</h5>
                        <!-- <div class="dropdown">
                            <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons-two-tone f-18">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Edit</a>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-body py-2 px-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-sm mb-0">
                                <thead>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Total Amount</th>
                                    <th>Payment Method</th>
                                    <th>Date-Time</th>
                                    <th>Delivery Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php while($rows = mysqli_fetch_assoc($pendingOrdersResult)) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">

                                                <div class="d-inline-block">
                                                    <h6 class="m-b-0"><?= $rows['Name'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $rows['Mobile'] ?>
                                            <!-- <?= $rows['UserId'] ?> -->
                                        </td>
                                        <td>
                                            <?= $rows['Email'] ?>
                                        </td>
                                        <td>
                                            <?= $rows['Address'] ?>
                                        </td>
                                        <td>
                                            rs. <?= $rows['TotalAmount'] ?>
                                        </td>
                                        <td>
                                            <?= $rows['Payment'] ?>
                                        </td>
                                        <td>
                                            <?= $rows['OrderDate'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $rows['delivery_status'] ?>
                                        </td>
                                        <td>
                                            <?php if($rows['delivery_status'] == 'Pending') {?>
                                            <button class="btn btn-success"><a
                                                    href="./../api/cart/delivery?userid=<?= $rows['UserId'] ?>">Add
                                                    Delivery</a></button> <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-12">
                <div class="card table-card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3">
                        <h5>Customer Orders and Details</h5>
                    </div>
                    <div class="card-body py-2 px-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th>Order Name</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Product Price</th>
                                        <th>Total Price</th>
                                        <th>Customer Mobile</th>
                                        <th>Payment</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($orders = mysqli_fetch_assoc($orderDetailsResult)) { ?>
                                    <tr>
                                        <td>
                                            <?= $orders['OrderName'] ?>
                                        </td>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <img src="<?= "./assets/images/product/" . $orders['Image'] ?>"
                                                    alt="product image" class="img-radius align-top m-r-15"
                                                    style="width: 40px" />
                                                <div class="d-inline-block">
                                                    <h6 class="m-b-0"><?= $orders['ProductName'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $orders['Quantity'] ?>
                                        </td>
                                        <td>
                                            <?= $orders['ProductPrice'] ?> rs.
                                        </td>
                                        <td>
                                            <?= $orders['TotalPrice'] ?> rs.
                                        </td>
                                        <td>
                                            <?= $orders['OrderMobile'] ?>
                                        </td>
                                        <td>
                                            <?= $orders['Payment'] ?>
                                        </td>
                                        <td>
                                            <?= $orders['OrderAddress'] ?>
                                        </td>
                                        <td>
                                            <?= $orders['OrderCity'] ?>
                                        </td>
                                        <td>
                                            <?= $orders['Country'] ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php
    
    include pathOf('includes/footer.php');
    include pathOf('includes/script.php');
    include pathOf('includes/pageEnd.php');
    
    ?>