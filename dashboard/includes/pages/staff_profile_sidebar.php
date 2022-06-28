<aside class="col-md-5">
    <h2 class="mb-1 text-muted">Home page of <?php echo escape($sData->title); ?></h2>
    <h1 class="mb-1"><a href="/ctve1/staff/<?php echo escape($data->username); ?>/"><?php echo escape($sData->firstName)." ".escape($sData->middleName)." ".escape($sData->lastName); ?></a></h1>
    <h2 class="mb-1 pl-md-5"><?php echo escape($sData->field); ?></h2>
    <h2 class="mb-1 pl-md-5"><a href="../../departments">Department</a> of <?php echo escape($sData->department); ?></h2>
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
                    <a class="nav-link p-0" href="/ctve1/staff/<?php echo escape($data->username); ?>/bio">Bio</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link p-0" href="/ctve1/staff/<?php echo escape($data->username); ?>/cv">CV</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-0" href="/ctve1/staff/<?php echo escape($data->username); ?>/teaching">Teaching</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-0" href="/ctve1/staff/<?php echo escape($data->username); ?>/schedule">Schedule</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-0" href="/ctve1/staff/<?php echo escape($data->username); ?>/research">Research</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-0" href="/ctve1/staff/<?php echo escape($data->username); ?>/publications">Publications</a>
                </li>

            </ul>
        </div>
    </nav>
</aside>
