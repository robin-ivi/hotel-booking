<h1>Welcome to <?php echo $_settings->info('name') ?> - Admin Panel</h1>
<hr class="border-info">
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-bed"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Active Room</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `room_list` where delete_flag = 0 and status = 1 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-bed"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Inctive Room</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `room_list` where delete_flag = 0 and status = 2 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-table"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Pending Reservation</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `reservation_list` where `status` = 0 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-table"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Confirmed Reservation</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `reservation_list` where `status` = 1 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-table"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Cancelled Reservation</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `reservation_list` where `status` = 2 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-swimmer"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Active Activities</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `activity_list` where status=1 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-swimmer"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Inactive Activities</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `activity_list` where status=0 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-question-circle"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Unread Inquiries</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `message_list` where status=0 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<hr>
