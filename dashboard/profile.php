
<?php
require_once '../core/init.php';
$username = Input::get('s');
//$actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actualLink;
if (!$username) {
    Redirect::to(404);
} else {
    $user = new User($username);
    if (!$user->exists()) {
        Redirect::to('../error/');
    } else {
        $data = $user->data();
        $sData = DB::getInstance()->get('staff_details',array('user_id', '=', $data->id))->first();
        // echo $sData->firstName;
    ?>

    <?php include 'includes/pages/staff_header.php'; ?>
      <title>
        CTVE - <?php echo $sData->firstName." ". $sData->lastName; ?>
      </title>
    </head>
    <body>
        <div class="container">
            <div class="row">
              <?php include 'includes/pages/staff_profile_sidebar.php' ?>
                <main class="col-md-7">
                    <p>
                        <a href="../pimg/<?php echo $data->img; ?>">
                            <img src="../pimg/<?php echo $data->img; ?>" alt="<?php echo escape($sData->firstName)." ".escape($sData->lastName); ?>" class="rounded-sm">
                        </a>
                    </p>
                    <br>
                    <h2 style="text-align: center;">My Timeline</h2>

                    <dl>
                      <?php
                      //get wall
                      $wall = DB::getInstance()->get('wall', array('user_id', '=', $data->id))->results();
                      // echo var_dump($wall);
                        for ($i=0; $i < count($wall) ; $i++) {
                         echo "<dt>".$wall[$i]->date."</dt>";
                         echo "<dd><a href='../".$data->username."/files/".$wall[$i]->link."' target='blank'>".$wall[$i]->title."</a>, ".$wall[$i]->description."</dd>";
                        }
                       ?>

                    </dl>
                </main>
            </div>
        </div>
    <?php include 'includes/pages/staff_footer.php'; ?>

<?php
    }
}
?>
