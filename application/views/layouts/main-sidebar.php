  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo assets_url('adminlte/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $auth_user['first_name'].' '.$auth_user['last_name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
        function set_active($menus, $curr_uri, $acl)
        {
          foreach ($menus as $index => $menu) {
            $is_active = false;
            $is_allowed = false;
            $has_children = isset($menu['children']) and is_array($menu['children']);
            if ($has_children) {
              $menus[$index]['children'] = set_active($menus[$index]['children'], $curr_uri, $acl);
              foreach ($menus[$index]['children'] as $menu_item) {
                if ($menu_item['is_active']) {
                  $is_active = $is_active || true;
                }
                if ($menu_item['is_allowed']) {
                  $is_allowed = $is_allowed || true;
                }
              }
            } else {
              $is_active = strpos($curr_uri, $menu['uri']) === 0;
              $is_allowed = !isset($menu['uri']) || $acl->is_allowed($menu['uri']);
            }
            $menus[$index]['is_active'] = $is_active;
            $menus[$index]['is_allowed'] = $is_allowed;
          }
          return $menus;
        }

        function display_menu_item($menu, $curr_uri, $lvl=2)
        {
          switch ($lvl) {
            case '1':
            $classLvl = '';
            break;
            case '2':
            $classLvl = 'second';
            break;
            case '3':
            $classLvl = 'third';
            break;
            default:
            $classLvl = '';
            break;
          }

          if (empty($curr_uri)) $curr_uri = 'home';
          $is_active = (isset($menu['is_active']) && $menu['is_active']);
          $is_allowed = (isset($menu['is_allowed']) && $menu['is_allowed']);
          $has_children = isset($menu['children']) and is_array($menu['children']);
          if ($is_allowed) {
            echo '<li class="'.($is_active ? 'active' : '').($has_children ? ' treeview' : '').'">';
            echo '<a href="' . ((isset($menu['uri']) and !empty($menu['uri'])) ? site_url($menu['uri']) : '#') . '" class="' . ($has_children ? ' has-ul' : '') . '" >';
            if (isset($menu['icon']) && !empty($menu['icon']))
              echo '<i class="' . $menu['icon'] . '"></i>&nbsp;';
            echo '<span>' . $menu['title'] . '</span>';
            if ($has_children)
              echo '<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>';
            echo '</a>';
            if ($has_children) {
              echo '<ul class="treeview-menu">';
              foreach ($menu['children'] as $menu_item) {
                display_menu_item($menu_item, $curr_uri, $lvl+1);
              }
              echo '</ul>';
            }
          }
        }

        $curr_uri = $this->uri->uri_string();
        if (empty($curr_uri)) $curr_uri = 'home';
        $this->load->config('navigation');
        $navigation = set_active($this->config->item('navigation'), $curr_uri, $this->acl);
        foreach ($navigation as $menu) {
          display_menu_item($menu, $curr_uri);
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
