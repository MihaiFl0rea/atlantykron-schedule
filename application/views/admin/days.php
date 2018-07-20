<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 10:24 PM
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
                                            <h3 class="title">Atlantykron by days</h3>
                                            <hr>
                                        </div>
                                        <div class="content">
                                            <?php if ($days): ?>
                                                <table class="table table-striped table-hover table-bordered" id="days_table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-center">Day</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($days as $day): ?>
                                                        <!--<div class="row" id="day-record-<?php /*echo $day['id']; */?>">
                                                            <div class="col-md-12">
                                                                <h4 class="pad-l-30">
                                                                    <strong><?php /*echo $day['day']; */?></strong>
                                                                    <div class="pull-right">
                                                                        <a class="btn btn-success btn-fill" href="<?php /*echo site_url() . 'admin/edit-day/' . $day['id']; */?>">Modify day</a>
                                                                        <button class="btn btn-danger btn-fill delete-day" id="<?php /*echo $day['id']; */?>">Delete day</button>
                                                                    </div>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <hr>-->

                                                        <tr id="day-record-<?php echo $day['id']; ?>">
                                                            <td class="text-center"><strong><?php echo $day['day']; ?></strong></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-success btn-fill" href="<?php echo site_url() . 'admin/edit-day/' . $day['id']; ?>">Modify</a>
                                                            </td>
                                                            <td class="text-center">
                                                                <button class="btn btn-danger btn-fill delete-day" id="<?php echo $day['id']; ?>">Delete</button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-day'; ?>">Add day</a>
                                                <div class="clearfix"></div>
                                            <?php else: ?>
                                                <h5 class="pad-l-30 text-danger">No data is available at the moment.</h5>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-day'; ?>">Add day</a>
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
                                            <h4 class="title">Add day | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/days'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/add-day'); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Year*'); ?>
                                                        <select name="id_year" id="id_year" class="form-control">
                                                            <option value="none" disabled selected>Select year</option>
                                                            <?php foreach ($years as $year): ?>
                                                            <option value="<?php echo $year['id_year']; ?>"><?php echo $year['year']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_year'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Day*'); ?>
                                                        <?php echo form_input(array('id' => 'timestamp', 'name' => 'timestamp', 'class' => 'form-control', 'placeholder' => 'Day')); ?>
                                                        <?php echo form_error('timestamp'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Add day', 'class' => 'btn btn-primary btn-fill pull-right')) ?>
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
                                            <h4 class="title">Update day | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/days'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/edit-day/' . $day['id']); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Year*'); ?>
                                                        <select name="id_year" id="id_year" class="form-control">
                                                            <?php foreach ($years as $year): ?>
                                                                <option value="<?php echo $year['id_year']; ?>"
                                                                    <?php if($year['id_year'] == $day['id_year']): echo 'selected'; endif; ?>>
                                                                    <?php echo $year['year']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_year'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Day*'); ?>
                                                        <?php echo form_input(array('id' => 'timestamp', 'name' => 'timestamp', 'class' => 'form-control', 'value' => $day['timestamp'])); ?>
                                                        <?php echo form_error('timestamp'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Update day', 'class' => 'btn btn-warning btn-fill pull-right')) ?>
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
