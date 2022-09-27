<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Kaduna Polytechnic - CTVE</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <?php include 'includes/header.php'; ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    <section style="margin-top: 100px;" class="teachers-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <h4>Meet the Teachers</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                include 'dbh.php';
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn,$sql);
                if ($row = mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                            <!-- Thumbnail -->
                            <div class="teachers-thumbnail">
                                <img src="staff/pimg/<?php echo $row['img']; ?>" alt="">
                            </div>
                            <!-- Meta Info -->
                            <div class="teachers-info mt-30">
                                <h5><?php echo $row['name']; ?></h5>
                                <span><a style="color: green;" href="s/<?php echo $row['username']; ?>/">home page</a></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }else {
                    echo "<p> No Profile to display</p>";
                }
                ?>


            </div>

        </div>
    </section>
    <!-- ##### Features Area Start ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'includes/footer.php'; ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <?php include 'includes/scripts.php'; ?>
</body>

</html>
