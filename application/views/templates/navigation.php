

<?php
if($this->session->user_type == 'fo' || $this->session->user_type == 'user'){
  $nav_hide = 'style="display: none"';
  }else{
    $nav_hide = '';
  }

// $badge = "0";
// foreach($notification as $rownotif){
//   $status = $rownotif->status;
//   $badge += ((int)$status);
//   }

  $ta_badge = "0";
  if(isset($ta_notif)) {
      foreach($ta_notif as $rowTAnotif) {
          $ta_status = $rowTAnotif->ta_status;
          $ta_badge += ((int)$ta_status);
      }
  }

if ($this->session->user_type == 'admin'){
    $user_type = 'admin';

  }elseif ($this->session->user_type == 'fo'){
    $user_type = 'fo';

  }elseif ($this->session->user_type == 'user'){
    $user_type = 'user';
  }
?>

<?php 

?>

<body id="page-top"
onload="set_interval()"
onmousemove="reset_interval()"
onclick="reset_interval()"
onkeypress="reset_interval()"
onscroll="reset_interval()">

<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="<?php echo base_url(); ?>">
          <div class="sidebar-brand-icon rotate-n-15"></div>
          <div class="sidebar-brand-text mx-3"><span>SPIS</span></div></a>
          <hr class="sidebar-divider my-0">
          <ul class="navbar-nav text-light" id="accordionSidebar">
              <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
              <li class="nav-item"></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo base_url().'main/add_client';?>"><i class="fas fa-user-plus"></i><span>Add Client</span></a><a class="nav-link" href="<?php echo base_url().'main/search_client';?>"><i class="fas fa-table"></i><span>Search Client</span></a></li>
              <li class="nav-item"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>User Profile</span></a><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Login</span></a></li>
              <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Register</span></a></li>
          </ul>
          <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
    
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group"></div>
                    </form>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                    <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                        
                                    </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>
                        </li>
                    
                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                    <h6 class="dropdown-header">alerts center</h6>
                                    
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </div>

                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                        </li>

                        <div class="d-none d-sm-block topbar-divider"></div>

                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                    <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $this->session->first_name; ?> <?php echo substr($this->session->middle_name, 0, 1); ?><?php echo $this->session->last_name; ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg">
                                </a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                    <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url().'user/logout';?>"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                        </li>
                     </ul>
                </div>
            </nav>
            

            
</div>

