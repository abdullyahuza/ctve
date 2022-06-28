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



    <!-- ##### Google Maps ##### -->
    <div class="map-area wow fadeInUp" data-wow-delay="300ms">
        <div id="googleMap"></div>
    </div>

    <!-- ##### Contact Area Start ##### -->
    <section style="margin-bottom: -200px;" class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-content">
                        <div class="row">
                            <!-- Contact Information -->
                            <div class="col-12 col-lg-5">
                                <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
                                    <div class="section-heading text-left">
                                        <h3>Contact Us</h3>
                                        <h5 class="mt-30">College of Technical &amp; Vocational Education</h5>
                                    </div>


                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <p>Polytechnic Road Tudun Wada PMB 2021, Kaduna<br>Kaduna State, Nigeria</p>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-telephone-1"></i>
                                        </div>
                                        <p>Main: 08000000000 <br> Office: 08000000000</p>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-contract"></i>
                                        </div>
                                        <p>ctve@kadpoly.edu.ng</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Form Area -->
                            <div class="col-12 col-lg-7">
                                <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
                                    <form action="p_contact.php" method="post">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        <button class="btn ctve-btn mt-30" type="submit">Contact Us</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'includes/footer.php'; ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <?php include 'includes/scripts.php'; ?>
</body>

</html>
