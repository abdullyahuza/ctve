<?php
session_start();
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 1;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1 style="text-align: center;">Mathematics Department</h1>
    <h2 style="text-align: center; font-family: cursive;">A.B.U. Zaria</h2>
    <br>
    <br>
    <div style="text-align: center;">
        <form method="get" action="">
            <h3 style="text-align: center;">Counter: <span id="counter" name="counter"><?php echo $_SESSION['counter']; ?></span></h3>

            <button id="counter" name="next"><b>Next Page</b></button>
        </form>
    </div>
