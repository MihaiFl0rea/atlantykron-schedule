<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/9/2018
 * Time: 9:39 PM
 */
?>

<div class="sidebar" data-color="purple" data-image=<?php echo assets_img_url() ?>sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?php echo base_url() . 'admin'; ?>" class="simple-text">
                Atlantykron Schedule
            </a>
        </div>

        <ul class="nav">
            <li class="<?php echo checkActiveState(base_url() . 'admin'); ?>">
                <a href="<?php echo base_url() . 'admin'; ?>">
                    <i class="pe-7s-graph"></i>
                    <p>Home</p>
                </a>
            </li>
            <li class="<?php echo checkActiveState(base_url() . 'admin/years'); ?>">
                <a href="<?php echo base_url() . 'admin/years'; ?>">
                    <i class="pe-7s-user"></i>
                    <p>Years</p>
                </a>
            </li>
            <li class="<?php echo checkActiveState(base_url() . 'admin/days'); ?>">
                <a href="<?php echo base_url() . 'admin/days'; ?>">
                    <i class="pe-7s-note2"></i>
                    <p>Days</p>
                </a>
            </li>
            <li class="<?php echo checkActiveState(base_url() . 'admin/locations'); ?>">
                <a href="<?php echo base_url() . 'admin/locations'; ?>">
                    <i class="pe-7s-news-paper"></i>
                    <p>Locations</p>
                </a>
            </li>
            <li class="<?php echo checkActiveState(base_url() . 'admin/teachers'); ?>">
                <a href="<?php echo base_url() . 'admin/teachers'; ?>">
                    <i class="pe-7s-science"></i>
                    <p>Teachers</p>
                </a>
            </li>
            <li class="<?php echo checkActiveState(base_url() . 'admin/classes'); ?>">
                <a href="<?php echo base_url() . 'admin/classes'; ?>">
                    <i class="pe-7s-map-marker"></i>
                    <p>Classes</p>
                </a>
            </li>
            <li class="<?php echo checkActiveState(base_url() . 'admin/class-schedules'); ?>">
                <a href="<?php echo base_url() . 'admin/class-schedules'; ?>">
                    <i class="pe-7s-bell"></i>
                    <p>Class Schedules</p>
                </a>
            </li>
        </ul>
    </div>
</div>
