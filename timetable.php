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

    <!-- ##### Breadcumb Area Start ##### -->
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area mt-10 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="ctve-blog-posts">
                        <div class="row">
                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="500ms">

                                    <p class="post-title">Timetables</p>
                                    <!-- Post Meta -->
                                    <?php
                                    include 'dbh.php';
                                    $sql = "SELECT * FROM timetables ORDER BY id DESC";
                                    $result = mysqli_query($conn,$sql);

                                    $last = "SELECT id FROM timetables ORDER BY id DESC LIMIT 1";
                                    $resultl = mysqli_query($conn,$last);

                                    $lastr = mysqli_fetch_array($resultl);
                                    $last = $lastr['id'];

                                    if ($row = mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['id'] == $last) {
                                            ?>
                                            <div class="post-meta">
                                                <li><a class="blink" href="<?php echo $row['link']; ?>"><?php echo $row['title']; ?></a></li>
                                            </div>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <div class="post-meta">
                                                <li><a href="<?php echo $row['link']; ?>"><?php echo $row['title']; ?></a></li>
                                            </div>
                                            <?php
                                            }
                                        }
                                    }else {
                                        echo "<p>No Timetables</p>";
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'includes/footer.php'; ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <?php include 'includes/scripts.php'; ?>
</body>

</html>
