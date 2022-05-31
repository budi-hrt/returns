<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                    <span class="badge badge-primary">NEW</span>
                </a>
            </li>
            <li class="divider"></li>

            <li class="nav-title">Menu</li>

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
            <!-- Akhir query -->
            <!-- start looping menu-->
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
                                AND `user_sub_menu`.`is_active` = 1 ";
                        $subMenu = $this->db->query($querySubMenu)->result_array(); ?>

                    <!-- start looping sub-menu -->
                    <?php foreach ($subMenu as $sm) : ?>
                    <!-- Query access sub-menu -->
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
                          AND `user_access_sub_menu`.`user_id`=$userId";
                            $accessSubMenu = $this->db->query($queryUserSubMenu)->result_array(); ?>
                    <!-- akhie Query access sub-menu -->

                    <!-- start looping access sub-menu -->
                    <?php foreach ($accessSubMenu as $asm) : ?>
                    <?php if ($asm['sc'] == 'single') : ?>
                    <li class="nav-item">
                        <?php if ($title == $asm['title']) : ?>
                        <a class="nav-link active" href="<?= base_url($asm['url']); ?>">
                            <?php else : ?>
                            <a class="nav-link" href="<?= base_url($asm['url']); ?>">
                                <?php endif; ?>
                                <i class="nav-icon <?= $asm['icon_sub']; ?>"></i> <?= $asm['title']; ?></a>
                    </li>
                    <?php elseif ($asm['sc'] == 'parent') : ?>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="javascript:;">
                            <i class="nav-icon <?= $asm['icon_sub']; ?>"></i> <?= $asm['title']; ?></a>
                        <ul class="nav-dropdown-items">
                            <!-- Query child menu -->
                            <?php
                                            $query_induk = "SELECT * FROM `user_sub_menu` WHERE `sc`='parent'";
                                            $id_induk = $this->db->query($query_induk)->result_array();

                                            ?>
                            <?php foreach ($id_induk as $induk_id) : ?>


                            <!-- Start Queri cild menu -->
                            <?php
                                                $sc = 'cild';
                                                $induk = $induk_id['id'];
                                                $smId = $sm['id'];
                                                $userId = $user['id'];
                                                $queryUserCildSubMenu = "
                                                SELECT * 
                                                FROM `user_access_sub_menu` 
                                                JOIN `user_sub_menu`
                                                ON `user_access_sub_menu`.`submenu_id`=`user_sub_menu`.`id`
                                                JOIN `user_menu`
                                                ON `user_access_sub_menu`.`menu_id`=`user_menu`.`id`
                                                WHERE `user_access_sub_menu`.`menu_id`=$menuId
                                                AND `user_access_sub_menu`.`user_id`=$userId
                                                AND `user_sub_menu`.`sub_menu_id`= $induk
                                                AND `user_sub_menu`.`sc`= 'child'
                                                ";
                                                $accessCildSubMenu = $this->db->query($queryUserCildSubMenu)->result_array();
                                                ?>


                            <!-- Ahir Query cild menu -->
                            <!-- start looping child menu -->
                            <?php foreach ($accessCildSubMenu as $acsm) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url($acsm['url']); ?>">
                                    <i class="nav-icon <?= $acsm['icon_sub']; ?> text-success"></i>
                                    <?= $acsm['title']; ?></a>
                            </li>
                            <?php endforeach; ?>
                            <!-- akhir looping child menu -->
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php endforeach; ?>
                    <!-- start looping access sub-menu -->
                    <?php endforeach; ?>
                    <!-- akhir looping sub-menu -->
                </ul>
            </li>
            <?php endforeach; ?>
            <!-- akhir looping menu -->



            <li class="divider"></li>
            <li class="nav-title">Extras</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-star"></i> Pages</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="login.html" target="_top">
                            <i class="nav-icon icon-star"></i> Login</a>

                </ul>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link nav-link-success" href="https://coreui.io" target="_top">
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