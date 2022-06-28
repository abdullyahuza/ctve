<?php include 'dbh.php'; ?>


<?php
    $featured = $_POST['featuredNew'];
    $sql = "SELECT * FROM featured LIMIT $featured";
    $result = mysqli_query($conn,$sql);
    if ($row = mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // echo "<p>";
            // echo "<img src='".$row['img']."'>";
            // echo "<br>";
            // echo $row['date'];
            // echo "<br>";
            // echo $row['title'];
            // echo "<br>";
            // echo $row['body'];

            echo "<div class='col-12 col-lg-6'>";
                echo "<div class='single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp' data-wow-delay='200ms'>";
                   echo "<div class='popular-course-thumb bg-img' style='background-image: url(".$row['img'].");'></div>";
                    echo "<div class='popular-course-content'>";
                        echo "<h5 id='FeaturedTitle'>".$row['title']."</h5>";
                        echo "<span><txt id='FeaturedName'>".$row['name']."</txt> (Staff) | <txt id='FeaturedDate'>".$row['date']."</txt></span>";

                        echo "<p id='FeaturedBody'>".$row['body'];

                        echo "</p>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
    // echo json_encode($row);
    }
    // $row = mysqli_fetch_assoc($result);


    mysqli_close($conn);
 ?>
