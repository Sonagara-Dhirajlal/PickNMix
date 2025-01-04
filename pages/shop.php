<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: pages/login/login");
    exit();
}

require '../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$userId = $_SESSION['userId'];
$searchQuery = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search query from the URL

// Fetch all categories, no need to filter by category name
$query = "SELECT * FROM `category`";
$result = mysqli_query($conn, $query);

$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

$index = 1;
?>

<!-- Custom CSS for hover effects -->
<style>
/* Image zoom effect */
.fruite-img {
    overflow: hidden;
    position: relative;
}

.fruite-img img {
    transition: transform 0.3s ease-in-out;
}

.fruite-img:hover img {
    transform: scale(1.1);
}

/* Card hover effect */
.fruite-item {
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.fruite-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Style for the product name on top of the image */
.fruite-item .product-name-overlay {
    background: orange;
    color: #fff;
    position: absolute;
    top: 10px;
    left: 10px;
    padding: 5px 10px;
    border-radius: 5px;
}

.nav-link:hover {
    color: orange;
}
</style>

<!-- Single Page Header Start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-white"></li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Shop Start -->
<div class="container-fluid py-5">
    <div class="container">
        <h1 class="mb-4">Fresh Fruits Shop</h1>

        <form method="GET" action="">
            <div class="col-xl-3">
                <div class="input-group w-100 mx-auto d-flex">
                    <input type="search" name="search" value="<?= htmlspecialchars($searchQuery) ?>"
                        class="form-control p-3" placeholder="Search for products">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </form>
        <br><br>

        <div class="row">
            <!-- Categories Column (Left) -->
            <div class="col-lg-3">
                <h3>Categories</h3>
                <ul class="nav flex-column">
                    <?php foreach ($categories as $category) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($index === 1) echo 'active'; ?>" data-bs-toggle="pill"
                            href="#tab-<?= $category['Id'] ?>">
                            <!-- Ensure ID is used for tab href -->
                            <?= htmlspecialchars($category['CategoryName']) ?>
                        </a>
                    </li>
                    <?php $index++; ?>
                    <?php } ?>
                </ul>
                <br><br>

                <div class="col-lg-12">
                    <h4 class="mb-4">Featured products</h4>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="<?= urlOf('assets/img/wheat.jpeg') ?>" class="img-fluid rounded" alt="">
                        </div>
                        <div>
                            <h6 class="mb-2">Desi Wheat</h6>
                            <!-- <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">rs. 500</h5>
                                <h5 class="text-danger text-decoration-line-through">rs. 1000</h5>
                            </div>
                        </div>
                    </div><br>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="<?= urlOf('assets/img/cooking oil.jpg') ?>" class="img-fluid rounded" alt="">
                        </div>
                        <div>
                            <h6 class="mb-2">Cooking Oil</h6>
                            <!-- <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">rs. 3000</h5>
                                <h5 class="text-danger text-decoration-line-through">rs. 2500</h5>
                            </div>
                        </div>
                    </div><br>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="<?= urlOf('assets/img/coffee.jpg') ?>" class="img-fluid rounded" alt="">
                        </div>
                        <div>
                            <h6 class="mb-2">Coffee</h6>
                            <!-- <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">rs. 500</h5>
                                <h5 class="text-danger text-decoration-line-through">rs. 250</h5>
                            </div>
                        </div>
                    </div><br>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="<?= urlOf('assets/img/tea.jpg') ?>" class="img-fluid rounded" alt="">
                        </div>
                        <div>
                            <h6 class="mb-2">Tea</h6>
                            <!-- <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">rs. 150</h5>
                                <h5 class="text-danger text-decoration-line-through">rs.250</h5>
                            </div>
                        </div>
                    </div><br>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="<?= urlOf('assets/img/soap.jpeg') ?>" class="img-fluid rounded" alt="">
                        </div>
                        <div>
                            <h6 class="mb-2">Soap</h6>
                            <!-- <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">rs.50</h5>
                                <h5 class="text-danger text-decoration-line-through">rs.30</h5>
                            </div>
                        </div>
                    </div><br>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <img src="<?= urlOf('assets/img/shampoo.jpg') ?>" class="img-fluid rounded" alt="">
                        </div>
                        <div>
                            <h6 class="mb-2">Shampoo</h6>
                            <!-- <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                            <div class="d-flex mb-2">
                                <h5 class="fw-bold me-2">rs. 150</h5>
                                <h5 class="text-danger text-decoration-line-through">rs.250</h5>
                            </div>
                        </div>
                    </div><br>

                </div>
            </div>

            <!-- Products Column (Right) -->
            <div class="col-lg-9">
                <div class="tab-content">
                    <?php $index = 1; // Reset $index ?>
                    <?php foreach ($categories as $category) { ?>
                    <?php
                        $id = $category['Id']; // Category ID for the query

                        // Only search for products, filter by product name if search query is present
                        $query1 = "SELECT * FROM `product` WHERE `CategoryId` = '$id'";
                        if ($searchQuery != '') {
                            $query1 = "SELECT * FROM `product` WHERE `Name` LIKE '%" . mysqli_real_escape_string($conn, $searchQuery) . "%'";
                        }
                        $result1 = mysqli_query($conn, $query1);
                    ?>
                    <div id="tab-<?= $category['Id'] ?>"
                        class="tab-pane fade p-0 <?php if ($index === 1) echo 'show active'; ?> ">
                        <?php $index++; ?>
                        <div class="row g-4">
                            <?php if (mysqli_num_rows($result1) > 0) { ?>
                            <?php while ($product = mysqli_fetch_assoc($result1)) { ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="rounded position-relative fruite-item">
                                    <form action="../api/cart/insert" method="POST">
                                        <input type="hidden" name="userid" value="<?= $userId ?>">
                                        <input type="hidden" name="image"
                                            value="<?= htmlspecialchars($product['Image']) ?>">
                                        <input type="hidden" name="name"
                                            value="<?= htmlspecialchars($product['Name']) ?>">
                                        <input type="hidden" name="price"
                                            value="<?= htmlspecialchars($product['Price']) ?>">

                                        <div class="fruite-img">
                                            <img src="<?= "../admin/assets/images/product/" . htmlspecialchars($product["Image"]); ?>"
                                                alt="product-image" class="img-fluid w-100 rounded-top" />
                                        </div>
                                        <div class="product-name-overlay"><?= htmlspecialchars($product['Name']) ?>
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4><?= htmlspecialchars($product['Name']); ?></h4>
                                            <p><?= htmlspecialchars($product['Description']); ?></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="text-dark fs-5 fw-bold mb-0">
                                                    <?= htmlspecialchars($product['Price']); ?> /
                                                    <?= htmlspecialchars($product['Measurement']) ?></p>
                                                <button type="submit"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } else { ?>
                            <p>No products found for this category.</p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop End -->

<?php
include pathOf("includes/footer.php");
include pathOf("includes/script.php");
include pathOf("includes/pageEnd.php");
?>