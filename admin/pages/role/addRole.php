<?php

require '../../includes/init.php';
include pathOf("auth.php");
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Role</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add New Role</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Add New Role</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-xl-6">
                <form action="../../api/role/insert.php" method="post">

                    <div class="card">
                        <div class="card-header">
                            <h5>Role Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Role Name</label>
                                <input type="text" class="form-control" placeholder="Enter Role Name" name="role" autofocus/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn btn-primary mb-0">Add Role</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php

include pathOf("includes/footer.php");
include pathOf("includes/script.php");
include pathOf("includes/pageEnd.php");

?>