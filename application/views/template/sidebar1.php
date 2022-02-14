<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">

                <li class="divider"></li>


                <!-- Query Menu disini -->

                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu =   "SELECT `user_menu`.`id`, `menu`
                                FROM `user_menu` JOIN `user_access_menu` 
                                ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                                WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC
                                ";


                $menu = $this->db->query($queryMenu)->result_array();

                ?>

                <!-- Looping Menu -->

                <?php
                foreach ($menu as $m) : ?>
                    <li class="nav-title"><?= $m['menu']; ?></li>

                    <!-- Query Sub Menu -->
                    <?php
                        $menuId = $m['id'];

                        $querySubMenu = "SELECT * 
                                        FROM `user_sub_menu` 
                                        WHERE `menu_id`= $menuId
                                        AND `is_active`=1";

                        $subMenu = $this->db->query($querySubMenu)->result_array();

                        ?>

                    <!-- Looping Sub Menu -->
                    <?php foreach ($subMenu as $sm) : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                                <i class="<?= $sm['icon']; ?>"></i>
                                <?= $sm['title']; ?>
                            </a>
                        </li>

                    <?php endforeach; ?>
                    <!-- End looping sub menu -->

                    <li class="divider"></li>
                <?php endforeach; ?>
                <!-- end looping Menu -->

                <li class="divider"></li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                        <i class="nav-icon icon-logout"></i> Logout
                    </a>
                </li>

            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>