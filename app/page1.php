<?php
include 'common.php';

if (isset($_GET['next'])) {
    // $_SESSION['counter'];
    ++$_SESSION['counter'];
    header('Location: page2.php');
}
 ?>
</body>
</html>
