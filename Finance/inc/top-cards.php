<div class="row">
    <div class="col-lg-4 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body bg-success rounded">
                <div class="row">
                    <div class="col-12">

                        <h5 class="text-light">Number of Users <i class="bi bi-person-fill"></i> </h5>
                    </div>
                    <hr>
                    </hr>
                    <div class="col-12">
                        <?php
                        $users = mysqli_query($conn, "SELECT * FROM tbl_accounts");
                        ?>
                        <p class="text-light fw-bold"><?= $room = mysqli_num_rows($users) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body bg-primary rounded">
                <div class="row">
                    <div class="col-12">

                        <h5 class="text-light">Total Reports <i class="bi bi-building-fill"></i> </h5>
                    </div>
                    <hr>
                    </hr>
                    <div class="col-12">
                        <?php
                        $violation = mysqli_query($conn, "SELECT * FROM tbl_violations_reports");
                        ?>
                        <p class="text-light fw-bold"><?= $violation_no= mysqli_num_rows($violation); ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body bg-dark rounded">
                <div class="row">
                    <div class="col-12">
                        <h5 class= "text-light">Number of Pending Accounts <i class="bi bi-arrow-clockwise"></i></h5>
                    </div>
                    <hr class="text-light">
                    </hr>
                    <div class="col-12">
                        <?php
                        $pending = mysqli_query($conn, "SELECT * FROM tbl_accounts WHERE account_status='Deactivate'");
                        ?>
                        <p class="text-light fw-bold"><?= $room = mysqli_num_rows($pending) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body bg-muted rounded">
                <div class="row">
                    <div class="col-12">
                        <h5 class= "text-light">Number of Students<i class="bi bi-person-fill"></i></h5>
                    </div>
                    <hr class="text-light">
                    </hr>
                    <div class="col-12">
                        <?php
                        $pending = mysqli_query($conn, "SELECT * FROM tbl_students");
                        ?>
                        <p class="text-light fw-bold"><?= $room = mysqli_num_rows($pending) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
</div>