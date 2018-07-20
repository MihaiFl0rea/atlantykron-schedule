<!DOCTYPE HTML>
<html>
    <head>
        <title>Atlantykron schedule app</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <!--[if lte IE 8]><script src="<?php echo assets_js_url(); ?>ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="<?php echo assets_css_url(); ?>forty.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="<?php echo assets_css_url(); ?>ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="<?php echo assets_css_url(); ?>ie8.css" /><![endif]-->
    </head>
    <body>
        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header -->
            <!-- Note: The "styleN" class below should match that of the banner element. -->
            <header id="header" class="alt style2">
                <?php if (isset($day_name)): ?>
                <p style="text-indent: 5%;"><?php echo $day_name; ?></p>
                <?php endif; ?>
                <nav>
                    <a href="#menu">Orar/Schedule</a>
                </nav>
            </header>

            <!-- Menu -->
            <nav id="menu">
                <?php if ($days): ?>
                <ul class="links">
                    <?php foreach ($days as $day): ?>
                    <li><a href="<?php echo site_url() . 'daily-schedule/' . $day['id'] ?>"><?php echo $day['name'] ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="<?php echo site_url(); ?>">Acasa / Home</a></li>
                </ul>
                <?php else: ?>
                    <p>Orar inexistent, pentru moment!</p>
                    <p>No classes, yet!</p>
                <?php endif; ?>
            </nav>

            <!-- Banner -->
            <!-- Note: The "styleN" class below should match that of the header element. -->
            <section id="banner" class="style2" style="background-position-y: -440px;">
                <div class="inner">
                    <span class="image">
                        <img src="<?php echo assets_img_url(); ?>Atlantykron-main-logo3.jpg" alt="" />
                    </span>
                    <header class="major">
                        <h1>Atlantykron</h1>
                    </header>
                    <div class="content">
                        <p>Centenarium <br/>
                            27 Iulie - 5 August 2018</p>
                    </div>
                </div>
            </section>

            <?php if ($template == 'home'): ?>
            <div id="main">
                <section>
                    <div class="inner">
                        <header class="major">
                            <h2>Orar Atlantykron / Atlantykron's schedule</h2>
                        </header>
                        <?php if ($days): ?>
                            <ul class="links">
                                <ul class="actions">
                                    <?php foreach ($days as $day): ?>
                                        <li><a href="<?php echo site_url() . 'daily-schedule/' . $day['id'] ?>" class="button next"><?php echo $day['name'] ?></a></li>
                                        <br/><br/>
                                    <?php endforeach; ?>
                                </ul>
                            </ul>
                        <?php else: ?>
                            <p>Orar inexistent, pentru moment! / No classes, yet!</p>
                        <?php endif; ?>
                    </div>
                </section>
            </div>

            <?php endif; ?>

            <?php if ($template == 'get_daily_schedule'): ?>
                <div id="main">
                    <section>
                        <?php if ($classes): ?>
                            <?php foreach ($classes as $class): ?>
                                <?php $language = ($class['teacher'] == '-') ? '' : '<p>Limba / Language: <strong>' . $class['language'] . '</strong></p>'; ?>
                                <?php $teacher = ($class['teacher'] == '-') ? '' : '<p>Lector / Teacher: <strong>' . $class['teacher'] . '</strong></p>'; ?>
                                <div class="inner">
                                    <header class="major">
                                        <h3><?php echo $class['name_ro'] . (!empty($class['name_en']) ? ' / ' . $class['name_en'] : ''); ?></h3>
                                    </header>
                                    <?php echo $teacher; ?>
                                    <?php echo $language; ?>
                                    <p>Locatia / Location: <strong><?php echo $class['location']; ?></strong></p>
                                    <p>Ora / Hour: <strong><?php echo $class['hour']; ?></strong></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="inner">
                                <header class="major">
                                    <h2>Date indisponibile / No data available</h2>
                                </header>
                                <p>Cursurile inca nu au fost adaugate. Acest lucru se va intampla curand!</p>
                                <p>Classes haven't been uploaded, yet. This will happen soon!</p>
                            </div>
                        <?php endif; ?>
                    </section>
                </div>
            <?php endif; ?>

            <!-- Footer -->
            <footer id="footer">
                <div class="inner">
                    <ul class="copyright">
                        <li style="color: white;">&copy; <a href="https://atlantykron.org/">Atlantykron</a>, <?php echo date('F Y'); ?></li>
                    </ul>
                </div>
            </footer>

        </div>

        <!-- Scripts -->
        <script src="<?php echo assets_js_url(); ?>jquery.min.js"></script>
        <script src="<?php echo assets_js_url(); ?>jquery.scrolly.min.js"></script>
        <script src="<?php echo assets_js_url(); ?>jquery.scrollex.min.js"></script>
        <script src="<?php echo assets_js_url(); ?>skel.min.js"></script>
        <script src="<?php echo assets_js_url(); ?>util.js"></script>
        <!--[if lte IE 8]><script src="<?php echo assets_js_url(); ?>ie/respond.min.js"></script><![endif]-->
        <script src="<?php echo assets_js_url(); ?>main.js"></script>

    </body>
</html>