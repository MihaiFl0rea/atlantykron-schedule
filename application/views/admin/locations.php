<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 3:36 PM
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
                                            <h3 class="title">Atlantykron's class locations</h3>
                                            <hr>
                                        </div>
                                        <div class="content">
                                            <?php if ($locations): ?>
                                                <table class="table table-striped table-hover table-bordered" id="locations_table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-center">Name</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($locations as $location): ?>
                                                        <!--<div class="row" id="location-record-<?php /*echo $location['id']; */?>">
                                                            <div class="col-md-12">
                                                                <h4 class="pad-l-30">
                                                                    <strong><?php /*echo $location['name']; */?></strong>
                                                                    <div class="pull-right">
                                                                        <a class="btn btn-success btn-fill" href="<?php /*echo site_url() . 'admin/edit-location/' . $location['id']; */?>">Modify location</a>
                                                                        <button class="btn btn-danger btn-fill delete-location" id="<?php /*echo $location['id']; */?>">Delete location</button>
                                                                    </div>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <hr>-->

                                                        <tr id="location-record-<?php echo $location['id']; ?>">
                                                            <td class="text-center"><strong><?php echo $location['name']; ?></strong></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-success btn-fill" href="<?php echo site_url() . 'admin/edit-location/' . $location['id']; ?>">Modify</a>
                                                            </td>
                                                            <td class="text-center">
                                                                <button class="btn btn-danger btn-fill delete-location" id="<?php echo $location['id']; ?>">Delete</button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-location'; ?>">Add location</a>
                                                <div class="clearfix"></div>
                                            <?php else: ?>
                                                <h5 class="pad-l-30 text-danger">No data is available at the moment.</h5>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-location'; ?>">Add location</a>
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
                                            <h4 class="title">Add location | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/locations'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/add-location'); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Location name*'); ?>
                                                        <?php echo form_input(array('id' => 'location', 'name' => 'location', 'class' => 'form-control', 'placeholder' => 'Location')); ?>
                                                        <?php echo form_error('location'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Add location', 'class' => 'btn btn-primary btn-fill pull-right')) ?>
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
                                            <h4 class="title">Update location | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/locations'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/edit-location/' . $location['id']); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Location name*'); ?>
                                                        <?php echo form_input(array('id' => 'location', 'name' => 'location', 'class' => 'form-control', 'value' => $location['name'])); ?>
                                                        <?php echo form_error('location'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Update location', 'class' => 'btn btn-warning btn-fill pull-right')) ?>
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
