<?php session_start(); 
if (!isset($_SESSION["user"])) { 
    header("location: login/login"); 
    exit(); 
}  
require '../includes/init.php'; 
include pathOf('includes/header.php'); 
include pathOf('includes/navbar.php');  

$userId = $_SESSION['userId'];  

$query = "SELECT * FROM `cart` WHERE `UserId` = '$userId'"; 
$result = mysqli_query($conn, $query); 

$index=1;
?>

<!-- Single Page Header Start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-white"></li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <form action="../api/cart/checkOut" method="POST">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                         
                        while ($rows = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $index++ ?></td>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="<?= "../admin/assets/images/product/" . $rows["Image"]; ?>"
                                        class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                  
                                        <input type="hidden" name="userid" value="<?= $userId ?>">
                                        <input type="hidden" name="products[<?= $rows['Id'] ?>][cartid]"
                                        value="<?= $rows['Id'] ?>">
                                    <input type="hidden" name="products[<?= $rows['Id'] ?>][userid]"
                                        value="<?= $userId ?>">
                                    <input type="hidden" name="products[<?= $rows['Id'] ?>][Pimage]"
                                        value="<?= $rows['Image'] ?>">
                                    <input type="hidden" name="products[<?= $rows['Id'] ?>][Pname]"
                                        value="<?= $rows['Name'] ?>">
                                    <input type="hidden" name="products[<?= $rows['Id'] ?>][Pprice]"
                                        value="<?= $rows['price'] ?>">
                                    <input type="hidden" class="product-total"
                                        name="products[<?= $rows['Id'] ?>][Ptotal]" value="<?= $rows['price'] ?>">


                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4"><?= $rows['Name'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"><?= $rows['price'] ?> rs.</p>
                            </td>
                            <td>
                                <div class="input-group mt-4" style="width: 120px;">
                                    <input type="number" class="form-control text-center quantity-input" min="1"
                                        value="1" name="products[<?= $rows['Id'] ?>][quantity]"
                                        data-price="<?= $rows['price'] ?>">
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4 total-price"><?= $rows['price'] ?> rs.</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-md rounded-circle bg-light border mt-4">
                                    <a href="../api/cart/delete?deleteId=<?= $rows['Id'] ?>">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php                             
                        }                         
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0 subtotal-price">rs.0.00</p>
                                <input type="hidden" id="subtotal" name="subtotal" value="">
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">rs.100</p>
                                    <input type="hidden" name="shipping" value="100">
                                </div>
                            </div>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 total-cart-price">rs.100</p>
                            <input type="hidden" id="total" name="total" value="">
                        </div>
                        <button id="checkoutBtn"
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="submit">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Cart Page End -->

<?php include pathOf('includes/footer.php'); include pathOf('includes/script.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const subtotalPriceElement = document.querySelector('.subtotal-price');
    const totalCartPriceElement = document.querySelector('.total-cart-price');
    const flatRateShipping = 100;

    quantityInputs.forEach(function(quantityInput) {
        quantityInput.addEventListener('change', function() {
            let quantity = parseInt(this.value);
            if (quantity < 1) quantity = 1;
            this.value = quantity;
            updateTotal(this, quantity);
        });
    });

    function updateTotal(input, quantity) {
        const row = input.closest('tr');
        const price = parseFloat(input.getAttribute('data-price'));
        const totalElement = row.querySelector('.total-price');
        const total = (price * quantity).toFixed(2);
        totalElement.textContent = `${total} rs.`;

        // Update hidden total input         
        row.querySelector('.product-total').value = total;

        updateCartTotal();
    }

    function updateCartTotal() {
        let subtotal = 0;
        document.querySelectorAll('.total-price').forEach(function(totalPriceElement) {
            subtotal += parseFloat(totalPriceElement.textContent.replace(' rs.', ''));
        });
        const total = (subtotal + flatRateShipping).toFixed(2);

        subtotalPriceElement.textContent = `${subtotal.toFixed(2)} rs.`;
        totalCartPriceElement.textContent = `${total} rs.`;

        // Update hidden inputs for subtotal and total         
        document.getElementById('subtotal').value = subtotal.toFixed(2);
        document.getElementById('total').value = total;
    }

    // Initial cart total calculation     
    updateCartTotal();
});
</script>

<?php include pathOf('includes/pageEnd.php'); ?>