<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/16/2018
 * Time: 11:19 PM
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

                <?php if ($template == 'read'): ?>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h3 class="title">Atlantykron's class schedules</h3>
                                            <hr>
                                        </div>
                                        <div class="content">
                                            <?php if ($class_schedules): ?>
                                                <table class="table table-striped table-hover table-bordered" id="class_schedules_table">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center">Name Ro</th>
                                                            <th scope="col" class="text-center">Name En</th>
                                                            <th scope="col" class="text-center">Teacher</th>
                                                            <th scope="col" class="text-center">Language</th>
                                                            <th scope="col" class="text-center">Location</th>
                                                            <th scope="col" class="text-center">Time period</th>
                                                            <th scope="col" class="text-center">Day</th>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($class_schedules as $class_schedule): ?>
                                                            <!--<div class="row" id="class-schedule-record-<?php /*echo $classSchedule['id']; */?>">
                                                                <div class="col-md-12">
                                                                    <h5 class="pad-l-30">
                                                                        <span><?php /*echo $classSchedule['class']['name_ro']; */?> (<?php /*echo $classSchedule['class']['language']; */?>)</span> |
                                                                        <span><?php /*echo $classSchedule['class']['teacher']; */?></span> |
                                                                        <span><?php /*echo $classSchedule['location']; */?></span> |
                                                                        <span><?php /*echo $classSchedule['time_period']; */?></span> |
                                                                        <span><?php /*echo $classSchedule['day']; */?></span>
                                                                        <div class="pull-right">
                                                                            <a class="btn btn-success btn-fill" href="<?php /*echo site_url() . 'admin/edit-class-schedule/' . $classSchedule['id']; */?>">Modify class schedule</a>
                                                                            <button class="btn btn-danger btn-fill delete-class" id="<?php /*echo $classSchedule['id']; */?>">Delete class schedule</button>
                                                                        </div>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <hr>-->
                                                            <tr id="class-schedule-record-<?php echo $class_schedule['id']; ?>">
                                                                <td class="text-center"><?php echo $class_schedule['class']['name_ro']; ?></td>
                                                                <td class="text-center"><?php echo $class_schedule['class']['name_en']; ?></td>
                                                                <td class="text-center"><?php echo $class_schedule['class']['teacher']; ?></td>
                                                                <td class="text-center"><?php echo $class_schedule['class']['language']; ?></td>
                                                                <td class="text-center"><?php echo $class_schedule['location']; ?></td>
                                                                <td class="text-center"><?php echo $class_schedule['time_period']; ?></td>
                                                                <td class="text-center"><?php echo $class_schedule['day']; ?></td>
                                                                <td class="text-center"><a class="btn btn-success btn-fill" href="<?php echo site_url() . 'admin/edit-class-schedule/' . $class_schedule['id']; ?>">Modify</a></td>
                                                                <td class="text-center"><button class="btn btn-danger btn-fill delete-class-schedule" id="<?php echo $class_schedule['id']; ?>">Delete</button></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>

                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-class-schedule'; ?>">Add class schedule</a>
                                                <div class="clearfix"></div>
                                            <?php else: ?>
                                                <h5 class="pad-l-30 text-danger">No data is available at the moment.</h5>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-class-schedule'; ?>">Add class schedule</a>
                                                <div class="clearfix"></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($template == 'create'): ?>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Add class schedule | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/class-schedules'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/add-class-schedule'); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Day*'); ?>
                                                        <select name="id_day" id="id_day" class="form-control">
                                                            <option value="none" disabled selected>Select day*</option>
                                                            <?php foreach ($days as $day): ?>
                                                                <option value="<?php echo $day['id']; ?>"><?php echo $day['name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_day'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Location*'); ?>
                                                        <select name="id_location" id="id_location" class="form-control">
                                                            <option value="none" disabled selected>Select location*</option>
                                                            <?php foreach ($locations as $location): ?>
                                                                <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_location'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <?php echo form_label('Class*'); ?>
                                                        <select name="id_class" id="id_class" class="form-control">
                                                            <option value="none" disabled selected>Select class*</option>
                                                            <?php foreach ($classes as $class): ?>
                                                                <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_class'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo form_label('Start hour'); ?>
                                                        <?php echo form_input(array('id' => 'start_hour', 'name' => 'start_hour', 'class' => 'form-control', 'placeholder' => 'Start hour')); ?>
                                                        <?php echo form_error('start_hour'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo form_label('End hour'); ?>
                                                        <?php echo form_input(array('id' => 'end_hour', 'name' => 'end_hour', 'class' => 'form-control', 'placeholder' => 'End hour')); ?>
                                                        <?php echo form_error('end_hour'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Add class schedule', 'class' => 'btn btn-primary btn-fill pull-right')) ?>
                                            <div class="clearfix"></div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($template == 'update'): ?>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Update class schedule | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/class-schedules'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/edit-class-schedule/' . $class_schedule['id']); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Day*'); ?>
                                                        <select name="id_day" id="id_day" class="form-control">
                                                            <option value="none" disabled selected>Select day*</option>
                                                            <?php foreach ($days as $day): ?>
                                                                <option value="<?php echo $day['id']; ?>"
                                                                    <?php if($class_schedule['id_day'] == $day['id']): echo 'selected'; endif; ?>>
                                                                    <?php echo $day['name']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_day'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Location*'); ?>
                                                        <select name="id_location" id="id_location" class="form-control">
                                                            <option value="none" disabled selected>Select location*</option>
                                                            <?php foreach ($locations as $location): ?>
                                                                <option value="<?php echo $location['id']; ?>"
                                                                    <?php if($class_schedule['id_location'] == $location['id']): echo 'selected'; endif; ?>>
                                                                    <?php echo $location['name']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_location'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <?php echo form_label('Class*'); ?>
                                                        <select name="id_class" id="id_class" class="form-control">
                                                            <option value="none" disabled selected>Select class*</option>
                                                            <?php foreach ($classes as $class): ?>
                                                                <option value="<?php echo $class['id']; ?>"
                                                                    <?php if($class_schedule['id_class'] == $class['id']): echo 'selected'; endif; ?>>
                                                                    <?php echo $class['name']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_class'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo form_label('Start hour'); ?>
                                                        <?php echo form_input(array('id' => 'start_hour', 'name' => 'start_hour', 'class' => 'form-control', 'value' => $class_schedule['start_hour'])); ?>
                                                        <?php echo form_error('start_hour'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo form_label('End hour'); ?>
                                                        <?php echo form_input(array('id' => 'end_hour', 'name' => 'end_hour', 'class' => 'form-control', 'value' => $class_schedule['end_hour'])); ?>
                                                        <?php echo form_error('end_hour'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Update class', 'class' => 'btn btn-warning btn-fill pull-right')) ?>
                                            <div class="clearfix"></div>
                                            <?php form_close(); ?>
                                        </div>
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

