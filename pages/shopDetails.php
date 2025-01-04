<?php

session_start();
if(!isset($_SESSION["user"])){
    header("location: login/login");
}

require '../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');

$userid=$_SESSION['userId'];

?>


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop Details</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-white"></li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="<?= urlOf('assets/img/shop.jpg') ?>" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">Pick 'N' Mix</h4>
                        <p>Welcome to Pick 'N' Mix!</p>
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>At Pick 'N' Mix, we believe in offering a diverse selection of fresh produce and grocery
                            items tailored to your needs. Our commitment to quality means you’ll find only the best
                            fruits, vegetables, and essentials right here.</p>


                        <!-- <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div> -->
                        <!-- <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a> -->
                    </div>

                    <div class="col-lg-6">

                        <p><strong>Why Choose Us?</strong></p>

                        <p><strong>Freshness Guaranteed:</strong> We source our products from local farms, ensuring you
                            get
                            the freshest ingredients.</p>

                        <p><strong>Wide Variety:</strong> From exotic fruits to everyday staples, our range is designed
                            to
                            cater to every palate and preference.</p>

                        <p><strong>Sustainable Practices:</strong> We are dedicated to sustainability, using
                            eco-friendly
                            packaging and minimizing waste.</p>

                        <p><strong>Exceptional Service:</strong> Our friendly staff is always ready to assist you,
                            making
                            your shopping experience pleasant and efficient.</p>

                    </div>
                    <!-- <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc. 
                                            Susp endisse ultricies nisi vel quam suscipit </p>
                                        <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish filefish Antarctic 
                                            icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray sweeper.</p>
                                        <div class="px-2">
                                            <div class="row g-4">
                                                <div class="col-6">
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">1 kg</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Country of Origin</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Agro Farm</p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Quality</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Organic</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Сheck</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Healthy</p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Min Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">250 Kg</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                        <div class="d-flex">
                                            <img src="<?= urlOf('assets/img/avatar.jpg') ?>" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Jason Smith</h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic 
                                                    words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <img src="<?= urlOf('assets/img/avatar.jpg') ?>" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Sam Peters</h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic 
                                                    words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-vision" role="tabpanel">
                                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                            amet diam et eos labore. 3</p>
                                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                            Clita erat ipsum et lorem et sit</p>
                                    </div>
                                </div>
                            </div> -->
                    <form action="../api/contact/review" method="POST">
                        <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="hidden" name="userid" value="<?= $userid ?>">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Your Name *"
                                        name="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Your Email *"
                                        name="email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea class="form-control border-0" cols="30" rows="8"
                                        placeholder="Your Review *" spellcheck="false" name="review"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <!-- <div class="d-flex align-items-center">
                                                <p class="mb-0 me-3">Please rate:</p>
                                                <div class="d-flex align-items-center" style="font-size: 12px;">
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div> -->
                                    <button class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                        Post Comment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">

                    </div>
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
                    <div class="col-lg-12">
                        <div class="position-relative">
                            <img src="<?= urlOf('assets/img/banner-fruits.jpg') ?>" class="img-fluid w-100 rounded"
                                alt="">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid vesitable py-5">
            <div class="container py-5">
                <!-- <h1 class="mb-0">Fresh Organic Vegetables</h1> -->
                <h1 class="fw-bold mb-0">Related products</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">

                    <?php
                $productquery = "SELECT * FROM `product`";
                $result = mysqli_query($conn, $productquery);
                while ($rows = mysqli_fetch_array($result)) { 
            ?>

                    <div class="border border-primary rounded position-relative vesitable-item"
                        style="height: 500px; width: 300px;">
                        <div class="vesitable-img" style="height: 300px; max-height: 300px; overflow: hidden;">
                            <img src="<?= "../admin/assets/images/product/" . $rows['Image']; ?>"
                                class="img-fluid w-100 rounded-top" style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">
                            <?= $rows['Name'] ?></div>
                        <div class="p-4 rounded-bottom">
                            <h4><?= $rows['Name'] ?></h4>
                            <p><?= $rows['Description'] ?></p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">rs.<?= $rows['Price'] ?></p>

                                <form action="../api/cart/insert" method="POST" class="d-inline">
                                    <input type="hidden" name="userid" value="<?= $userid ?>">
                                    <input type="hidden" name="image" value="<?= $rows['Image'] ?>">
                                    <input type="hidden" name="name" value="<?= $rows['Name'] ?>">
                                    <input type="hidden" name="price" value="<?= $rows['Price'] ?>">
                                    <button type="submit"
                                        class="btn border border-secondary rounded-pill px-3 text-primary">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                </div>
            </div>
        </div>
        <!-- Vesitable Shop End -->


    </div>
</div>
<!-- Single Product End -->

<?php

include pathOf('includes/footer.php');
include pathOf('includes/script.php');
include pathOf('includes/pageEnd.php');

?>