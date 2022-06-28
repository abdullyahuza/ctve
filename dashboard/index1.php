<?php
require_once 'core/init.php';

if (Session::exists('home')) {
    echo "<p style='color:coral; text-align: center; font-family: cursive;'>" . Session::flash('home') . "</p>";
}

$user = new User();
if ($user->isloggedIn()) {
?>
  <div class="wrapper">
    <div class="header">
      <h1>Population Analysis System</h1>
    </div>

    <div class="nav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Record</a></li>
        <li><a href="#">View</a></li>
        <li><a href="#">Admin</a></li>
        <li><a href="update.php">Update</a></li>
        <li><a href="changepassword.php">ChangeP</a></li>
        <li><a href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    <?php
      if ($user->hasPermission('admin')) {
        echo "You are an Admininistrator";
      }else{
        echo "Standard User";
      }
     ?>

  </div>
<?php
} else { ?>
  <h4 id='login_register'>You need to <a href='../sslogin/'>login</a> or Contact the administrator to register </h4>
<?php
}

?>

