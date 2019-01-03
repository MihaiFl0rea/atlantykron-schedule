<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/18/2018
 * Time: 6:20 PM
 */
?>

<!doctype html>
<html lang="en">

    <?php $this->view('admin/includes/header'); ?>

    <body>

        <div class="wrapper">

            <?php $this->view('admin/includes/left_sidebar'); ?>

            <div class="main-panel">

                <?php $this->view('admin/includes/top_header'); ?>

                <?php if ($template == 'get_years'): ?>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <?php if ($years): ?>
                                        <div class="header">
                                            <h2 class="title text-center">Welcome to Atlantykron schedule app!</h2>
                                            <h2 class="title text-center">Here you can check the final schedule for each day of Atlantykron.</h2>
                                            <hr>
                                            <h4 class="title text-center">Please select the year! (1/3)</h4>
                                        </div>
                                        <div class="content">
                                            <table class="table table-striped table-hover" id="get_years_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Year</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($years as $year): ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <a href="<?php echo site_url() . 'admin/days-of-atlantykron/' . $year['id']; ?>"><?php echo $year['year']; ?></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <div class="clearfix"></div>
                                        </div>
                                        <?php else: ?>
                                        <div class="header">
                                            <h2 class="title">Welcome to Atlantykron schedule app!</h2>
                                            <hr>
                                        </div>
                                        <div class="content">
                                            <h5 class="pad-l-30 text-danger">Unfortunately, no data has been inserted.
                                                Please insert the years, days, locations, teachers, classes and then
                                                link all this data together on class schedules module.</h5>
                                            <div class="clearfix"></div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($template == 'get_days'): ?>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <?php if ($days): ?>
                                            <div class="header">
                                                <h4 class="title text-center">Please select the day! (2/3)</h4>
                                            </div>
                                            <div class="content">
                                                <table class="table table-striped table-hover" id="get_days_table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Day</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($days as $day): ?>
                                                        <tr>
                                                            <td class="text-center">
                                                                <a href="<?php echo site_url() . 'admin/classes-of-atlantykron/' . $day['id']; ?>"><?php echo $day['name']; ?></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php else: ?>
                                            <div class="header">
                                                <h2 class="title">Welcome to Atlantykron schedule app!</h2>
                                                <hr>
                                            </div>
                                            <div class="content">
                                                <h5 class="pad-l-30 text-danger">Unfortunately, no data has been inserted.
                                                    Please insert the years, days, locations, teachers, classes and then
                                                    link all this data together on class schedules module.</h5>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($template == 'get_classes'): ?>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <?php if ($classes): ?>
                                            <div class="header">
                                                <h4 class="title text-center">Schedule for <?php echo $day_name; ?> (3/3) <a class="btn btn-success pull-right" href="<?php echo site_url() . 'admin/download-schedule/' . $day_id . '/comicsansms'; ?>">Generate PDF</a></h4>
                                                <hr>
                                            </div>
                                            <div class="content">
                                                <table class="table table-striped table-hover table-bordered" id="daily_class_schedules_table">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="text-center">Name Ro</th>
                                                        <th scope="col" class="text-center">Name En</th>
                                                        <th scope="col" class="text-center">Teacher</th>
                                                        <th scope="col" class="text-center">Language</th>
                                                        <th scope="col" class="text-center">Location</th>
                                                        <th scope="col" class="text-center">Time period</th>
                                                        <th scope="col" class="text-center">Day</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($classes as $class): ?>
                                                        <tr id="class-schedule-record-<?php echo $class['id']; ?>">
                                                            <td class="text-center"><?php echo $class['class']['name_ro']; ?></td>
                                                            <td class="text-center"><?php echo $class['class']['name_en']; ?></td>
                                                            <td class="text-center"><?php echo $class['class']['teacher']; ?></td>
                                                            <td class="text-center"><?php echo $class['class']['language']; ?></td>
                                                            <td class="text-center"><?php echo $class['location']; ?></td>
                                                            <td class="text-center"><?php echo $class['time_period']; ?></td>
                                                            <td class="text-center"><?php echo $class['day']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php else: ?>
                                            <div class="header">
                                                <h2 class="title">Welcome to Atlantykron schedule app!</h2>
                                                <hr>
                                            </div>
                                            <div class="content">
                                                <h5 class="pad-l-30 text-danger">Unfortunately, no data has been inserted.
                                                    Please insert the years, days, locations, teachers, classes and then
                                                    link all this data together on class schedules module.</h5>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php $this->view('admin/includes/footer'); ?>

            </div>
        </div>

    </body>

</html>