<?php

session_start();
if(!isset($_SESSION["user"])){
    header("location: login/login");
}

require '../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

$userid=$_SESSION['userId'];
$username=$_SESSION['userName'];

$orderDetailsQuery = "SELECT 
    o.Id AS OrderId, 
    o.Name AS OrderName, 
    o.TotalAmount, 
    o.Mobile AS OrderMobile, 
    o.Payment, 
    o.Address AS OrderAddress, 
    o.City AS OrderCity, 
    o.Country, 
    o.delivery_status, 
    o.OrderDate, 
    o.deliveryDate, 
    od.ProductName, 
    od.Quantity, 
    od.ProductPrice, 
    od.TotalPrice, 
    od.Image 
FROM `order` o 
INNER JOIN `orderdetails` od ON o.Id = od.OrderId 
ORDER BY o.OrderDate DESC";

$orderDetailsResult = mysqli_query($conn, $orderDetailsQuery);

$index=1;
?>

<style>
/* General Profile Page Styles */
.page-header {
    background-color: #191917;
    color: #FFD700;
}

.breadcrumb-item.active {
    color: #FFD700 !important;
}

h1,
h2 {
    color: #FFD700;
    font-weight: bold;
}

.table-striped tbody tr:hover {
    background-color: #FFD700;
    color: #191917;
    transform: scale(1.02);
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.table-striped tbody tr:hover td a {
    background-color: #FFD700;
    color: #191917;
}

.btn-primary {
    background-color: #191917;
    border: none;
    color: white;
}

.btn-primary:hover {
    background-color: #FFD700;
    color: #191917;
    transform: scale(1.1);
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

/* Hover Effect for Table Rows */
.table tbody tr {
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.table tbody tr:hover {
    background-color: #FFD700;
    color: #191917;
    transform: translateY(-3px);
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

/* Button Hover Effects */
.btn-sm {
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-sm:hover {
    background-color: #FFD700;
    transform: scale(1.1);
    color: #191917;
}

/* Table Heading Styling */
th {
    background-color: #191917;
    color: #FFD700;
    font-weight: bold;
}

/* Table Data Styling */
td {
    color: #666;
    font-size: 1.05rem;
}

/* Customizing Input Styles (if any used later) */
input,
select,
textarea {
    border: 2px solid #191917;
    padding: 8px;
    width: 100%;
    border-radius: 4px;
    margin-bottom: 10px;
    transition: border-color 0.3s ease;
}

input:focus,
select:focus,
textarea:focus {
    border-color: #FFD700;
    box-shadow: 0px 0px 5px rgba(255, 215, 0, 0.5);
}
</style>

<!-- Customer Profile Header Start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Your Profile</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-white">Track Your Orders</li>
    </ol>
</div>
<!-- Customer Profile Header End -->

<!-- Customer Profile Content Start -->
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Welcome, <?= $username ?>!</h2>
        <p class="mb-5" style="font-size: 1.1rem; color: #666;">Here you can track your orders.
        </p>

        <h4 class="mb-3">Your Orders</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Image-ProductName</th>
                        <th>Customer Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Order-Date</th>
                        <!-- <th>Total Amount</th> -->
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Delivery-Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $TotalAmount=0;
                     while ($rows=mysqli_fetch_assoc($orderDetailsResult)): 
                     $TotalAmount=$TotalAmount+$rows['TotalPrice']; ?>
                    <tr>
                        <td><?= $index++ ?></td>
                        <td>
                            <div class="d-inline-block align-middle">
                                <img src="<?= "../admin/assets/images/product/" . $rows['Image'] ?>" alt="product image"
                                    class="img-radius align-top m-r-15" style="width: 40px" />
                                <div class="d-inline-block">
                                    <h6 class="m-b-0"><?= $rows['ProductName'] ?></h6>
                                </div>
                            </div>
                        </td>
                        <td><?= $rows['OrderName'] ?></td>
                        <td><?= $rows['ProductPrice'] ?></td>
                        <td><?= $rows['Quantity'] ?></td>
                        <td><?= $rows['TotalPrice'] ?></td>
                        <td><?= $rows['OrderDate'] ?></td>
                        <td><?= $rows['Payment'] ?></td>
                        <!-- <td><?= $rows['TotalAmount'] ?></td> -->
                        <td><?= $rows['delivery_status'] ?></td>
                        <?php if($rows['delivery_status'] == "Delivered") { ?>
                        <td><?= $rows['deliveryDate'] ?></td>
                        <?php } ?>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <td>Total Amount : <?= $TotalAmount ?></td>
        </div>
    </div>
</div>
<!-- Customer Profile Content End -->

<?php

include pathOf('includes/footer.php');
include pathof('includes/script.php');
include pathOf('includes/pageEnd.php');

?>