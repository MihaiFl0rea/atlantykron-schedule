<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/9/2018
 * Time: 9:39 PM
 */
?>

<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
<!--            <a class="navbar-brand" href="#">Dashboard</a>-->
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <!--<li>
                    <a href="">
                        <i class="fa fa-search"></i>
                        <p class="hidden-lg hidden-md">Search</p>
                    </a>
                </li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <p class="red">Hello, <strong><i><?php echo $this->session->first_name . ' ' . $this->session->last_name; ?></i></strong></p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo 'admin/logout'; ?>">
                        <p>Log out</p>
                    </a>
                </li>
                <li class="separator hidden-lg hidden-md"></li>
            </ul>
        </div>
    </div>
</nav>
