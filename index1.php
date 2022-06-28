<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div id="new">
        <?php
        include 'dbh.php';
            $sql = "SELECT * FROM featured LIMIT 2";
            $result = mysqli_query($conn,$sql);
            if ($row = mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>";
                    // echo "<img src='".$row['img']."'>";
                    echo "<br>";
                    echo $row['date'];
                    echo "<br>";
                    echo $row['title'];
                    echo "<br>";
                    echo $row['body'];
                }
            // echo json_encode($row);
            }
            // $row = mysqli_fetch_assoc($result);


            mysqli_close($conn);
         ?>

    </div>
    <button id="btnload">Load</button>
    <!-- ##### CTA Area Start ##### -->

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
        });
    </script>
</body>

</html>
