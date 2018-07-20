<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/16/2018
 * Time: 8:35 PM
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
                                            <h3 class="title">Atlantykron's classes</h3>
                                            <hr>
                                        </div>
                                        <div class="content">
                                            <?php if ($classes): ?>
                                                <table class="table table-striped table-hover table-bordered" id="classes_table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-center">Class (Ro)</th>
                                                            <th scope="col" class="text-center">Class (En)</th>
                                                            <th scope="col" class="text-center">Teacher</th>
                                                            <th scope="col" class="text-center">Language</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($classes as $class): ?>
                                                            <!--<div class="row" id="class-record-<?php /*echo $class['id']; */?>">
                                                                <div class="col-md-12">
                                                                    <h4 class="pad-l-30">
                                                                        <strong><?php /*echo $class['name']; */?></strong>
                                                                        <span> (Teacher: <?php /*echo $class['teacher']; */?>, Language: <?php /*echo $class['language']; */?>)</span>
                                                                        <div class="pull-right">
                                                                            <a class="btn btn-success btn-fill" href="<?php /*echo site_url() . 'admin/edit-class/' . $class['id']; */?>">Modify class</a>
                                                                            <button class="btn btn-danger btn-fill delete-class" id="<?php /*echo $class['id']; */?>">Delete class</button>
                                                                        </div>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <hr>-->
                                                            <tr id="class-record-<?php echo $class['id']; ?>">
                                                                <td class="text-center"><?php echo $class['name_ro']; ?></td>
                                                                <td class="text-center"><?php echo $class['name_en']; ?></td>
                                                                <td class="text-center"><?php echo $class['teacher']; ?></td>
                                                                <td class="text-center"><?php echo $class['language']; ?></td>
                                                                <td class="text-center"><a class="btn btn-success btn-fill" href="<?php echo site_url() . 'admin/edit-class/' . $class['id']; ?>">Modify</a></td>
                                                                <td class="text-center"><button class="btn btn-danger btn-fill delete-class" id="<?php echo $class['id']; ?>">Delete</button></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-class'; ?>">Add class</a>
                                                <div class="clearfix"></div>
                                            <?php else: ?>
                                                <h5 class="pad-l-30 text-danger">No data is available at the moment.</h5>
                                                <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-class'; ?>">Add class</a>
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
                                            <h4 class="title">Add class | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/classes'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/add-class'); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Class name (Ro)*'); ?>
                                                        <?php echo form_input(array('id' => 'name_ro', 'name' => 'name_ro', 'class' => 'form-control', 'placeholder' => 'Class name(RO)*')); ?>
                                                        <?php echo form_error('name_ro'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Teacher'); ?>
                                                        <select name="id_teacher" id="id_teacher" class="form-control">
                                                            <option value="none" disabled selected>Select teacher*</option>
                                                            <?php foreach ($teachers as $teacher): ?>
                                                                <option value="<?php echo $teacher['id_teacher']; ?>"><?php echo $teacher['name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_teacher'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Class name (En)'); ?>
                                                        <?php echo form_input(array('id' => 'name_en', 'name' => 'name_en', 'class' => 'form-control', 'placeholder' => 'Class name(EN)')); ?>
                                                        <?php echo form_error('name_en'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php echo form_label('Teaching language*'); ?>
                                                    <select name="language" id="language" class="form-control">
                                                        <option value="none" disabled selected>Select teaching language*</option>
                                                        <option value="1">Romanian</option>
                                                        <option value="2">English</option>
                                                    </select>
                                                    <?php echo form_error('language'); ?>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Add class', 'class' => 'btn btn-primary btn-fill pull-right')) ?>
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
                                            <h4 class="title">Update class | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/classes'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/edit-class/' . $class['id']); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Class name (Ro)*'); ?>
                                                        <?php echo form_input(array('id' => 'name_ro', 'name' => 'name_ro', 'class' => 'form-control', 'value' => $class['name_ro'])); ?>
                                                        <?php echo form_error('name_ro'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo form_label('Teacher'); ?>
                                                        <select name="id_teacher" id="id_teacher" class="form-control">
                                                            <?php foreach ($teachers as $teacher): ?>
                                                                <option value="<?php echo $teacher['id_teacher']; ?>"
                                                                    <?php if($teacher['id_teacher'] == $class['id_teacher']): echo 'selected'; endif; ?>>
                                                                    <?php echo $teacher['name']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php echo form_error('id_teacher'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Class name (En)*'); ?>
                                                        <?php echo form_input(array('id' => 'name_en', 'name' => 'name_en', 'class' => 'form-control', 'value' => $class['name_en'])); ?>
                                                        <?php echo form_error('name_en'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php echo form_label('Teaching language'); ?>
                                                    <select name="language" id="language" class="form-control">
                                                        <option value="1" <?php if(1 == $class['language']): echo 'selected'; endif; ?>>Romanian</option>
                                                        <option value="2" <?php if(2 == $class['language']): echo 'selected'; endif; ?>>English</option>
                                                    </select>
                                                    <?php echo form_error('language'); ?>
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
