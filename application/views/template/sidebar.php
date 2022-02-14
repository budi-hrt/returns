<div class="app-body">
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">


        <!-- Dashboard -->
        <li class="nav-item">
          <!-- Query Dashboard -->
          <?php
          $roleId = $this->session->userdata('role_id');
          $querydashboard = "SELECT `user_dashboard`.`id`,`dashboard`,`icon`,`url_dashboard`
                                  FROM `user_dashboard` JOIN `access_dashboard`
                                  ON `user_dashboard`.`id`= `access_dashboard`.`dashboard_id`
                                  WHERE `access_dashboard`.`role_id`=$roleId";
          $dashboard = $this->db->query($querydashboard)->row_array();; ?>

          <?php
          $url_dash = $dashboard['url_dashboard'];
          $home = $dashboard['dashboard'];
          if ($title == $home) {
            echo '<a class="nav-link active" href="' . base_url($url_dash) . '">
                                    <i class="nav-icon icon-speedometer"></i> Dashboard
                                   
                                  </a>';
          } else {
            echo '<a class="nav-link" href="' . base_url($url_dash) . '">
                                    <i class="nav-icon icon-speedometer"></i> Dashboard
                                   
                                  </a>';
          }; ?>


        </li>

        <!-- end Dashboard -->
        <li class="divider"></li>

        <!-- QUERY MENU -->
        <?php
        $user_id = $this->session->userdata('id');
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`,`icon`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- LOOPING MENU -->
        <li class="nav-title">Menu</li>
        <?php foreach ($menu as $m) : ?>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon <?= $m['icon']; ?>"></i> <?= $m['menu']; ?></a>
            <ul class="nav-dropdown-items">
              <!-- SIAPKAN SUB-MENU SESUAI MENU -->
              <?php
                $menuId = $m['id'];


                $querySubMenu = "SELECT `user_sub_menu`.`id`
                               FROM `user_sub_menu` JOIN `user_menu` 
                                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                              WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1
                        ";

                $subMenu = $this->db->query($querySubMenu)->result_array();

                ?>
              <?php foreach ($subMenu as $sm) : ?>
                <?php

                    $smId = $sm['id'];



                    $userId = $user['id'];
                    $queryUserSubMenu = "SELECT *
                          FROM `user_access_sub_menu`
                          JOIN `user_sub_menu`
                          ON `user_access_sub_menu`.`submenu_id`=`user_sub_menu`.`id`
                          JOIN `user_menu`
                          ON `user_access_sub_menu`.`menu_id`=`user_menu`.`id`
                          WHERE `user_access_sub_menu`.`submenu_id`=$smId
                          AND `user_access_sub_menu`.`menu_id`=$menuId
                          AND `user_access_sub_menu`.`user_id`=$userId
                          ";
                    $accessSubMenu = $this->db->query($queryUserSubMenu)->result_array();
                    ?>


                <?php foreach ($accessSubMenu as $asm) : ?>
                  <li class="nav-item">
                    <?php if ($title == $asm['title']) : ?>
                      <a class="nav-link active" href="<?= base_url($asm['url']); ?>">
                      <?php else : ?>
                        <a class="nav-link" href="<?= base_url($asm['url']); ?>">
                        <?php endif; ?>
                        <i class="nav-icon <?= $asm['icon_sub']; ?>"></i> <?= $asm['title']; ?></a>
                  </li>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </ul>
          </li>

        <?php endforeach; ?>




        <li class="nav-title">Extras</li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#">
            <i class="nav-icon icon-star"></i> Icons</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('extras'); ?>" target="blank">
                <i class="nav-icon icon-star"></i> Simple Line Icons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.html" target="_top">
                <i class="nav-icon icon-star"></i> Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="404.html" target="_top">
                <i class="nav-icon icon-star"></i> Error 404</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="500.html" target="_top">
                <i class="nav-icon icon-star"></i> Error 500</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="nav-icon icon-logout"></i> Logout</a>
        </li>
        <li class="nav-item mt-auto">
          <a class="nav-link nav-link-success" href="<?= base_url('extras/tes'); ?>">
            <i class="nav-icon icon-cloud-download"></i> Download CoreUI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">
            <i class="nav-icon icon-layers"></i> Try CoreUI
            <strong>PRO</strong>
          </a>
        </li>

      </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
  </div>