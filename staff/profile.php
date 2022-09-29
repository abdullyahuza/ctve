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
        $path = '../';
        $wholeUrl = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']."";
        if(substr($wholeUrl , -1)=='/'){
          $path = '../../';
        }
        $data = $user->data();
        $sData = DB::getInstance()->get('staff_details',array('user_id', '=', $data->id))->first();
        // echo $sData->firstName;
    ?>

    <html lang="en-us">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Favicon -->
      <link rel="icon" href="../img/core-img/favicon.ico">
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700&display=swap" rel="stylesheet">
      <link href="<?php echo $path; ?>staff/styles.css" rel="stylesheet">
      <link href="<?php echo $path; ?>staff/all.css" rel="stylesheet">
      <script src="<?php echo $path; ?>staff/jquery.min.js"></script>
      <script src="<?php echo $path; ?>staff/bootstrap.bundle.min.js"></script>
      <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" rel="stylesheet">
    </head>
    <body>
      <title>
        CTVE - <?php echo $sData->firstName." ". $sData->lastName; ?>
      </title>
    </head>
    <body>
        <div class="container">
            <div class="row">
              <aside class="col-md-5">
                  <h2 class="mb-1 text-muted">Home page of <?php echo escape($sData->title); ?></h2>
                  <h1 class="mb-1"><a href="<?php echo $path ?>s/<?php echo escape($data->username); ?>"><?php echo escape($sData->firstName)." ".escape($sData->middleName)." ".escape($sData->lastName); ?></a></h1>
                  <h2 class="mb-1 pl-md-5"><?php echo escape($sData->field); ?></h2>
                  <h2 class="mb-1 pl-md-5"><a href="<?php echo $path ?>departments">Department</a> of <?php echo escape($sData->department); ?></h2>
                  <h3 class="mb-4"><a href="https://www.kadunapoly.edu.ng/">University of Common Sense</a></h3>
                  <h3 class="mb-0"><a href="mailto:<?php echo escape($sData->email); ?>"><?php echo escape($sData->email); ?></a></h3>
                  <p class="mb-0">
                      <a class="text-dark" href="https://www.facebook.com/<?php echo escape($data->username); ?>"><i class="fab fa-facebook"></i></a>
                      <a class="text-dark" href="https://www.instagram.com/<?php echo escape($data->username); ?>"><i class="fab fa-instagram"></i></a>
                      <a class="text-dark" href="https://www.linkedin.com/in/<?php echo escape($data->username); ?>"><i class="fab fa-linkedin"></i></a>
                      <a class="text-dark" href="https://www.quora.com/profile/<?php echo escape($data->username); ?>"><i class="fab fa-quora"></i></a>
                      <a class="text-dark" href="https://www.reddit.com/user/<?php echo escape($data->username); ?>"><i class="fab fa-reddit"></i></a>
                      <a class="text-dark" href="https://twitter.com/<?php echo escape($data->username); ?>"><i class="fab fa-twitter"></i></a>
                  </p>
                  <nav class="d-block mb-4 p-0 navbar navbar-expand-md navbar-light">
                      <button aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation" class="collapsed mt-3 navbar-toggler" data-target="#navbar" data-toggle="collapse" type="button">
                          <i class="fas fa-bars"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbar">
                          <ul class="flex-column ml-md-auto mt-3 nav">

                              <li class="nav-item">
                                  <a class="nav-link p-0" href="<?php echo $path ?>s/<?php echo escape($data->username); ?>/bio">Bio</a>
                              </li>


                              <li class="nav-item">
                                  <a class="nav-link p-0" href="<?php echo $path ?>s/<?php echo escape($data->username); ?>/cv">CV</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link p-0" href="<?php echo $path ?>s/<?php echo escape($data->username); ?>/teaching">Teaching</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link p-0" href="<?php echo $path ?>s/<?php echo escape($data->username); ?>/schedule">Schedule</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link p-0" href="<?php echo $path ?>s/<?php echo escape($data->username); ?>/research">Research</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link p-0" href="<?php echo $path ?>s/<?php echo escape($data->username); ?>/publications">Publications</a>
                              </li>

                          </ul>
                      </div>
                  </nav>
              </aside>

                <main class="col-md-7">
                    <p>
                    <?php 
                    if($data->img != ''){
                    ?>
                      <a href="<?php echo $path ?>staff/pimg/<?php echo $data->img; ?>">
                          <img src="<?php echo $path ?>staff/pimg/<?php echo $data->img; ?>" alt="<?php echo escape($sData->firstName)." ".escape($sData->lastName); ?>" class="rounded-sm">
                      </a>
                    <?php
                    }
                    else
                    {
                    ?>
                      <a href="<?php echo $path ?>staff/pimg/cat.JPG">
                          <img src="<?php echo $path ?>staff/pimg/cat.JPG" class="rounded-sm">
                      </a>
                    <?php
                    }
                    ?>
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
                         echo "<dd><a href='{$path}staff/".$data->username."/files/".$wall[$i]->link."' target='blank'>".$wall[$i]->title."</a>, ".$wall[$i]->description."</dd>";
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
