<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Kaduna Polytechnic - CTVE</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">

    </script>

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>
    <!-- header content -->
    <?php include 'includes/header.php'; ?>

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/slide-6.jpg);">
        <div class="bradcumbContent">
            <h2>KADPOLY CTVE</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Section ##### -->
    <section class="elements-area mt-20 section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ##### Tabs ##### -->
                <div class="col-12 col-lg-6">
                    <div class="ctve-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Philosophy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Welcome Message</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">Vision Mission</a>
                            </li>
                        </ul>

                        <div class="tab-content mb-30" id="myTabContent">
                            <div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                <div class="ctve-tab-content">
                                    <!-- Tab Text -->
                                    <div class="ctve-tab-text">
                                        <p id="Philosophy"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="tab2" role="tabpanel" aria-labelledby="tab--2">
                                <div class="ctve-tab-content">
                                    <!-- Tab Text -->
                                    <div class="ctve-tab-text">
                                        <p id="Welcome"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                                <div class="ctve-tab-content">
                                    <!-- Tab Text -->
                                    <div class="ctve-tab-text">
                                        <p id="Vision"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ##### Accordians ##### -->
                <div class="col-12 col-lg-6">
                    <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- single accordian area -->
                        <div class="panel single-accordion">
                            <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>News and Events</b>
                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            </a></h6>
                            <div id="collapseOne" class="accordion-content collapse show">
                                <p id="NewsEvents">

                                </p>
                            </div>
                        </div>
                        <!-- single accordian area -->
                        <div class="panel single-accordion">
                            <h6>
                                <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapseTwo" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo"><b>Quick Links</b>
                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        </a>
                            </h6>
                            <div id="collapseTwo" class="accordion-content collapse">
                                <p id="QuickLinks" class="blink"></p>
                            </div>
                        </div>
                        <!-- single accordian area -->
                        <div class="panel single-accordion">
                            <h6>
                                <a role="button" aria-expanded="true" aria-controls="collapseThree" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree"><b>Happening</b>
                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    </a>
                            </h6>
                            <div id="collapseThree" class="accordion-content collapse">
                                <p id="Happening"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ##### Featured staff and student ##### -->
    <div class="col-12">
        <div class="ctve-cool-facts-area mb-50">
            <div class="row">

                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact text-center">
                        <i class="icon-agenda-1"></i>
                        <h5><span class="counter">130</span></h5>
                        <p>Courses</p>
                    </div>
                </div>

                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact text-center">
                        <i class="icon-assistance"></i>
                        <h5><span class="counter">46</span></h5>
                        <p>Staffs</p>
                    </div>
                </div>

                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact text-center">
                        <i class="icon-id-card"></i>
                        <h5><span class="counter">10</span>k</h5>
                        <p>Students</p>
                    </div>
                </div>

                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact text-center">
                        <i class="icon-message"></i>
                        <h5><span class="counter">7</span></h5>
                        <p>Departments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <center><h5 style="margin-top: -50px; margin-bottom: 20px;">Featured Staffs &amp; Students</h5></center>
    <!-- <div class="top-popular-courses-area section-padding-100-10"> -->
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
                <!-- Single Top Popular Course -->
                <!-- <div class="col-12 col-lg-6"> -->
                    <!-- <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="600ms"> -->
                        <!-- <div class="popular-course-thumb bg-img" id="FeaturedImg"></div> -->
                        <!-- <div class="popular-course-content"> -->
                            <!-- <h5 id="FeaturedTitle"></h5> -->
                            <!-- <span><txt id="FeaturedName"></txt> (Staff) | <txt id="FeaturedDate"></txt></span> -->

                            <!-- <p id="FeaturedBody"> -->

                            <!-- </p> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
                <!-- Single Top Popular Course -->
                <!-- <div class="col-12 col-lg-6"> -->
                    <!-- <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms"> -->
                        <!-- <div class="popular-course-thumb bg-img" id="FeaturedImgS"></div> -->
                        <!-- <div class="popular-course-content"> -->
                            <!-- <h5 id="FeaturedTitleS"></h5> -->
                            <!-- <span><txt id="FeaturedNameS"></txt> (Student) | <txt id="FeaturedDateS"></txt></span> -->

                            <!-- <p id="FeaturedBodyS"> -->

                            <!-- </p> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->

            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->

    <div class="top-popular-courses-area section-padding-100-10">
        <div class="container">
            <div class="row" id="new">
                <?php
                    include 'dbh.php';
                    // $featured = $_POST['featuredNew'];
                    $sql = "SELECT * FROM featured LIMIT 2";
                    $result = mysqli_query($conn,$sql);
                    if ($row = mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            if ($row['role'] == 2) {
                                $role = 'Student';
                            }else {
                                $role = 'Staff';
                            }

                            echo "<div class='col-12 col-lg-6'>";
                                echo "<div class='single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp' data-wow-delay='200ms'>";
                                   echo "<div class='popular-course-thumb bg-img' style='background-image: url(".$row['img'].");'></div>";
                                    echo "<div class='popular-course-content'>";
                                        echo "<h5 id='FeaturedTitle'>".$row['title']."</h5>";
                                        echo "<span><txt id='FeaturedName'>".$row['name']."</txt> (".$role.") | <txt id='FeaturedDate'>".$row['date']."</txt></span>";

                                        echo "<p id='FeaturedBody'>".$row['body'];

                                        echo "</p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                    mysqli_close($conn);
                 ?>
            </div>
        </div>
    </div>

    <!-- <div style="margin: 0 10px;" class="ctve-buttons-area mb-100 justify-content-between flex-wrap"> -->
        <!-- <buttton id="btnload" style="float: right;" href="#" class="btn ctve-btn btn-4 m-1">More</buttton> -->
        <!-- <buttton href="#" class="btn ctve-btn btn-4 m-1" hidden=true'>Prev</buttton> -->
    <!-- </div> -->
    <!-- ========== Milestones ========== -->

    <!-- ##### CTA Area Start ##### -->
    <div style="margin-top: -28px;" class="call-to-action-area mt--20">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                        <h4 style="color: #fff">Want to see more featured?</h4>
                        <button style="float: right;" id="btnload" href="#" class="btn ctve-btn">Click me</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <!-- ##### Footer Area Start ##### -->
    <?php include 'includes/footer.php'; ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <?php include 'includes/scripts.php'; ?>

    <script type="text/javascript">
        $(document).ready(function() {
            var featuredCounts = 2;
            $('#btnload').click(function() {
                featuredCounts = featuredCounts + 2;

                $('#new').load('featured.php', {
                    featuredNew: featuredCounts
                });


            });

            $('#Philosophy').load("load_philo.php");
            $('#Welcome').load("load_welc.php");
            $('#Vision').load("load_vm.php");
            $('#NewsEvents').load("load_news.php");
            $('#Happening').load("load_happening.php");
            $('#QuickLinks').load("load_quicklinks.php");
            if ($(window).width() < 400) {

                $('#tab--2').text('Welcome');
            }
            $.post("load_featured.php", function(data) {
                var data = JSON.parse(data);
                $('#FeaturedTitle').text(data.title);
                $('#FeaturedBody').text(data.body);
                $('#FeaturedName').text(data.name);
                $('#FeaturedDate').text(data.date);
                $('#FeaturedImg').css('background-image', 'url('+data.img+')');

            });
            $.post("load_featureds.php", function(data) {
                var data = JSON.parse(data);
                $('#FeaturedTitleS').text(data.title);
                $('#FeaturedBodyS').text(data.body);
                $('#FeaturedNameS').text(data.name);
                $('#FeaturedDateS').text(data.date);
                $('#FeaturedImgS').css('background-image', 'url('+data.img+')');
            });

        });
    </script>
</body>

</html>
