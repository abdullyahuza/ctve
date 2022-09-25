<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Navigation</div>
                <a class="nav-link" href="/ctve/dashboard/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <?php
                if ($user->hasPermission('admin')) {
                    include 'admin.php';
                }else{
                    include 'staff.php';
                }
        ?>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php
            if ($user->hasPermission('admin')) {
              echo "An Admininistrator";
            }else{
              echo "A Staff";
            }
             ?>
        </div>
    </nav>
</div>
