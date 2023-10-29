

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background-color: #e3f2fd;" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['system']['name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        
                        <?php if($_SESSION['login_type'] == 1): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=alumni">Alumni</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=news">News</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=courses">Courses</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=gallery">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=jobs">Career</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=events">Events</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=helps">Help</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=story">Success Story</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=users">Users</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=site_settings">Settings</a></li>
                        <?php endif; ?>
                        
                        <?php if(!isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" id="login">Login</a></li>
                        <?php else: ?>
                        <li class="nav-item">
                          <div class=" dropdown mr-4">
                          <a href="#" class="text-dark dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><?php echo $_SESSION['login_name'] ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
                          </div>
                        </li>
                        <?php endif; ?>
                        
                     
                    </ul>  
                </div>
            </div>
        </nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>