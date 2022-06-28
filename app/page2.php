<?php
include 'common.php';
if (isset($_GET['next'])) {
    ++$_SESSION['counter'];
    header('Location: page1.php');
}
?>
</body>
</html>
