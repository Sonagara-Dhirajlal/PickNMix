<?php

session_start();
if(!isset($_SESSION["user"])){
    header("location: login/login");
}

require '../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

$userid=$_SESSION['userId'];

$query="SELECT * FROM `checkout` WHERE `UserId` = '$userid'";

$result=mysqli_query($conn,$query);

?>


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-white"></li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <form action="../api/cart/placeOrder" method="POST">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">

                    <div class="form-item">
                        <label class="form-label my-3">Name <sup>*</sup></label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Address <sup>*</sup></label>
                        <input type="text" class="form-control" name="address" placeholder="House Number Street Name">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">City<sup>*</sup></label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Country<sup>*</sup></label>
                        <input type="text" name="country" class="form-control">
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Mobile<sup>*</sup></label>
                        <input type="tel" name="mobile" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Email Address<sup>*</sup></label>
                        <input type="email" name="email" class="form-control">
                    </div>

                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total=50; while($rows=mysqli_fetch_assoc($result)) { 
                                    $quantity=$rows['PTotal'] / $rows['PPrice'];
                                    $total=$total+$rows['PTotal'];
                                    ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="<?= "../admin/assets/images/product/" . $rows["PImage"]; ?>"
                                                class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                alt="">
                                        </div>
                                    </th>
                                    <td class="py-5"><?= $rows['PName'] ?></td>
                                    <td class="py-5"><?= $rows['PPrice'] ?></td>
                                    <td class="py-5"><?= $quantity ?></td>
                                    <td class="py-5"><?= $rows['PTotal'] ?></td>
                                </tr>

                                <input type="hidden" name="userid" value="<?= $userid ?>">
                                <!-- <input type="hidden" name="quantity" value="<?= $quantity ?>"> -->
                                <!-- <input type="hidden" name="products[<?= $rows['Id'] ?>][cartid]" -->
                                    <!-- value="<?= $rows['Id'] ?>"> -->
                                <input type="hidden" name="products[<?= $rows['Id'] ?>][Pquantity]"
                                    value="<?= $quantity ?>">
                                    <input type="hidden" name="products[<?= $rows['Id'] ?>][Pimage]"
                                    value="<?= $rows['PImage'] ?>">
                                <input type="hidden" name="products[<?= $rows['Id'] ?>][Pname]"
                                    value="<?= $rows['PName'] ?>">
                                <input type="hidden" name="products[<?= $rows['Id'] ?>][Pprice]"
                                    value="<?= $rows['PPrice'] ?>">
                                <input type="hidden" class="product-total" name="products[<?= $rows['Id'] ?>][Ptotal]"
                                    value="<?= $rows['PTotal'] ?>">

                                <?php } ?>
                                <th scope="row">
                                </th>
                                <td class="py-5">
                                    <p class="mb-0 text-dark py-0">Shipping Charge</p>
                                </td>
                                <td colspan="3" class="py-5">
                                    <!-- <div class="form-check text-start">
                                            <input type="checkbox" class="form-check-input bg-primary border-0"
                                            id="Shipping-1" name="Shipping-1" value="Shipping">
                                            <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                        </div> -->
                                    <div class="form-check text-start">
                                        <label class="form-check-label" for="Shipping-2">rs. 50</label>
                                    </div>
                                    <!-- <div class="form-check text-start">
                                            <input type="checkbox" class="form-check-input bg-primary border-0"
                                            id="Shipping-3" name="Shipping-1" value="Shipping">
                                            <label class="form-check-label" for="Shipping-3">Local Pickup: $8.00</label>
                                        </div> -->
                                </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        <input type="hidden" name="totalamount" value="<?= $total ?>">
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">rs. <?= $total ?></p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1"
                                    name="Transfer" value="Transfer">
                                <label class="form-check-label" for="Transfer-1">Direct Bank Transfer</label>
                            </div>
                            <p class="text-start text-dark">Make your payment directly into our bank account. Please use
                                your Order ID as the payment reference. Your order will not be shipped until the funds
                                have cleared in our account.</p>
                        </div>
                    </div> -->
                    <!-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Payments-1"
                                    name="Payments" value="Payments">
                                <label class="form-check-label" for="Payments-1">Check Payments</label>
                            </div>
                        </div>
                    </div> -->
                    <label>select check box for use Cash On Delivery</label>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                    name="Delivery" value="Delivery">
                                <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                    name="Paypal" value="Paypal">
                                <label class="form-check-label" for="Paypal-1">Paypal</label>
                            </div>
                        </div>
                    </div> --><br><br>
                    <button id="checkoutBtn"
                            class="btn border-secondary rounded-pill px-6 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="submit">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->

<?php

include pathOf('includes/footer.php');
include pathOf('includes/script.php');
include pathOf('includes/pageEnd.php');

?>