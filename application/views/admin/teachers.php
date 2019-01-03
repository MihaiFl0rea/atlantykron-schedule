<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 5:43 PM
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
                                            <h3 class="title">Atlantykron's teachers</h3>
                                            <hr>
                                        </div>
                                        <div class="content">
                                            <?php if ($teachers): ?>
                                                <table class="table table-striped table-hover table-bordered" id="teachers_table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-center">Name</th>
                                                            <th scope="col" class="text-center">E-Mail</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($teachers as $teacher): ?>
                                                        <!--<div class="row" id="teacher-record-<?php /*echo $teacher['id']; */?>">
                                                            <div class="col-md-12">
                                                                <h4 class="pad-l-30">
                                                                    <strong><?php /*echo $teacher['name']; */?></strong>
                                                                    <?php /*if (!empty($teacher['email'])): */?>
                                                                        ( Email: <?php /*echo $teacher['email']; */?>)
                                                                    <?php /*endif; */?>
                                                                    <div class="pull-right">
                                                                        <a class="btn btn-success btn-fill" href="<?php /*echo site_url() . 'admin/edit-teacher/' . $teacher['id']; */?>">Modify teacher</a>
                                                                        <button class="btn btn-danger btn-fill delete-teacher" id="<?php /*echo $teacher['id']; */?>">Delete teacher</button>
                                                                    </div>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <hr>-->

                                                        <tr id="teacher-record-<?php echo $teacher['id']; ?>">
                                                            <td class="text-center"><strong><?php echo $teacher['name']; ?></strong></td>
                                                            <td class="text-center"><?php echo $teacher['email']; ?></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-success btn-fill" href="<?php echo site_url() . 'admin/edit-teacher/' . $teacher['id']; ?>">Modify</a>
                                                            </td>
                                                            <td class="text-center">
                                                                <button class="btn btn-danger btn-fill delete-teacher" id="<?php echo $teacher['id']; ?>">Delete</button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-teacher'; ?>">Add teacher</a>
                                                <div class="clearfix"></div>
                                            <?php else: ?>
                                                <h5 class="pad-l-30 text-danger">No data is available at the moment.</h5>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-teacher'; ?>">Add teacher</a>
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
                                            <h4 class="title">Add teacher | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/teachers'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/add-teacher'); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Teacher name*'); ?>
                                                        <?php echo form_input(array('id' => 'name', 'name' => 'name', 'class' => 'form-control', 'placeholder' => 'Teacher Name')); ?>
                                                        <?php echo form_error('name'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Teacher email'); ?>
                                                        <?php echo form_input(array('id' => 'email', 'name' => 'email', 'class' => 'form-control', 'placeholder' => 'Teacher Email')); ?>
                                                        <?php echo form_error('email'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Add teacher', 'class' => 'btn btn-primary btn-fill pull-right')) ?>
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
                                            <h4 class="title">Update teacher | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/teachers'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/edit-teacher/' . $teacher['id']); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Teacher name*'); ?>
                                                        <?php echo form_input(array('id' => 'name', 'name' => 'name', 'class' => 'form-control', 'value' => $teacher['name'])); ?>
                                                        <?php echo form_error('name'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Teacher email'); ?>
                                                        <?php echo form_input(array('id' => 'email', 'name' => 'email', 'class' => 'form-control', 'value' => (!empty($teacher['email']) ? $teacher['email'] : '' ))); ?>
                                                        <?php echo form_error('email'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Update teacher', 'class' => 'btn btn-warning btn-fill pull-right')) ?>
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

