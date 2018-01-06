<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php // $this->load->view('layouts/nav-notification'); ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo assets_url('adminlte/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $auth_user['first_name'].' '.$auth_user['last_name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo assets_url('adminlte/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $auth_user['first_name'].' '.$auth_user['last_name']; ?>
                  <small>Since <?php echo date_format(date_create($auth_user['registered']),'d M Y'); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('auth/user/edit/'.$auth_user['id']); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-default btn-flat" data-button="logout">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
