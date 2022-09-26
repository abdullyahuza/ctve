<?php
require_once '../core/init.php';

if (!$username = Input::get('username')) {
    Redirect::to('index.php');
} else {
    $user = new User($username);
    if (!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
    }
    ?>
    <div class="wrapper">
        <div class="header">
            <h1>Your Profile</h1>
        </div>
        <h3><?php echo escape($data->username); ?></h3>
        <p>Name: <?php echo escape($data->name); ?></p>

    </div>
<?php
}
?>
