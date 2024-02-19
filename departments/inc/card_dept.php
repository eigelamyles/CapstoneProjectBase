<div class="row">
    <?php
    $get_dept = mysqli_query($conn, "SELECT * FROM tb_dept");
    while ($dept = mysqli_fetch_array($get_dept)) {


    ?>
        <div class="col-lg-4 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body bg-primary rounded">
                    <div class="row">
                        <div class="col-12">

                            <h5 class="text-light fs-6 fw-bolder"><?php echo $dept['department']; ?></h5>
                        </div>
                        <hr>
                        </hr>
                        <div class="col-12">
                            <?php
                            $department = $dept['department'];
                            $get_num_ass = mysqli_query($conn, "SELECT * FROM tbl_assigned_rooms_dept WHERE department = '$department'");
                            $n = mysqli_num_rows($get_num_ass);
                            if ($n <= 0) {
                                $num_rooms = 0;
                            } else {
                                while ($d = mysqli_fetch_object($get_num_ass)) {
                                    $nrooms = $d->room_name;
                                    $num_rooms = (string)(count(explode(",", $nrooms)));
                                }
                            }
                            ?>

                            <p class="text-light fw-bold"> Number of Rooms assigned: <?php echo $num_rooms; ?></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="text-light" href="" data-bs-toggle="modal" data-bs-target="#view_rooms">View Rooms</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="view_rooms<?php ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>