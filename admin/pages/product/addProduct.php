<?php

require '../../includes/init.php';
include pathOf("auth.php");
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$query="SELECT * FROM category";
$result=mysqli_query($conn,$query);

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add New Product</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Add New Product</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <form action="../../api/product/insert" method="post" enctype="multipart/form-data">

            <div class="row">
                <!-- [ sample-page ] start -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Product description</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Product Name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category">
                                    <option disable selected>Select Category</option>
                                    <?php
                                while($row=mysqli_fetch_assoc($result)) {?>
                                    <option value="<?php echo $row['Id'];?>"><?php echo $row['CategoryName'];?></option>
                                    <?php }?>
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Unit of Measurement</label>
                                <select class="form-select" name="measurement" required>
                                    <option disabled selected>Select Unit</option>
                                    <option value="Kilogram">Kilogram (kg)</option>
                                    <option value="Gram">Gram (g)</option>
                                    <option value="Liter">Liter (L)</option>
                                    <option value="Milliliter">Milliliter (mL)</option>
                                    <option value="Packet">Packet</option>
                                    <option value="Piece">Piece (pcs)</option>
                                    <option value="Dozen">Dozen</option>
                                </select>
                            </div>

                            <div class="mb-0">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" placeholder="Enter Product Description in 2 line"
                                    name="description"></textarea>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-xl-6">

                    <div class="card">
                        <div class="card-header">
                            <h5>Pricing</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center">Price <i
                                                class="ph-duotone ph-info ms-1" data-bs-toggle="tooltip"
                                                data-bs-title="Price"></i></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" placeholder="Price" name="price" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Product image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <!-- <p><span class="text-danger">*</span> Recommended resolution is 640*640 with file size</p> -->
                                <!-- <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i> -->
                                <!-- Click to Upload</label> -->
                                <input type="file" class="form-control mb-3" name="image">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn btn-primary mb-0" name="submit" value="submit">Add product</button>
                        </div>
                    </div>
                </div>


                <!-- [ sample-page ] end -->
            </div>
        </form>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php

include pathOf("includes/footer.php");
include pathOf("includes/script.php");
include pathOf("includes/pageEnd.php");

?>