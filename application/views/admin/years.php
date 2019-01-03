<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 12:25 AM
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
                                        <h3 class="title">Years of Atlantykron schedule</h3>
                                        <hr>
                                    </div>
                                    <div class="content">
                                        <?php if ($years): ?>
                                            <table class="table table-striped table-hover" id="years_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Year</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($years as $year): ?>
                                                    <!--<div class="row" id="year-record-<?php /*echo $year['id']; */?>">
                                                        <div class="col-md-4">
                                                            <h4 class="pad-l-30">
                                                                <?php /*echo $year['year']; */?>
                                                                <div class="pull-right">
                                                                    <a class="btn btn-success btn-fill" href="<?php /*echo site_url() . 'admin/edit-year/' . $year['id']; */?>">Modify year</a>
                                                                    <button class="btn btn-danger btn-fill delete-year" id="<?php /*echo $year['id']; */?>">Delete year</button>
                                                                </div>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <hr>-->

                                                    <tr id="year-record-<?php echo $year['id']; ?>">
                                                        <td class="text-center"><?php echo $year['year']; ?></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-danger btn-fill delete-year" id="<?php echo $year['id']; ?>">Delete</button>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="btn btn-success btn-fill" href="<?php echo site_url() . 'admin/edit-year/' . $year['id']; ?>">Modify</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                            <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-year'; ?>">Add year</a>
                                            <div class="clearfix"></div>
                                        <?php else: ?>
                                            <h5 class="pad-l-30 text-danger">No data is available at the moment.</h5>
                                            <a class="btn btn-success" href="<?php echo site_url() . 'admin/add-year'; ?>">Add year</a>
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
                                        <h4 class="title">Add year | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/years'; ?>">Back</a></h4>
                                    </div>
                                    <div class="content">
                                        <?php echo form_open(site_url() . 'admin/add-year'); ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <?php echo form_label('Year*'); ?>
                                                        <?php echo form_input(array('id' => 'year', 'name' => 'year', 'class' => 'form-control', 'placeholder' => 'Year')); ?>
                                                        <?php echo form_error('year'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Add year', 'class' => 'btn btn-primary btn-fill pull-right')) ?>
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
                                            <h4 class="title">Update year | <a class="btn btn-success btn-sm" href="<?php echo site_url() . 'admin/years'; ?>">Back</a></h4>
                                        </div>
                                        <div class="content">
                                            <?php echo form_open(site_url() . 'admin/edit-year/' . $year['id']); ?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <?php echo form_label('Year*'); ?>
                                                            <?php echo form_input(array('id' => 'year', 'name' => 'year', 'class' => 'form-control', 'value' => $year['year'])); ?>
                                                            <?php echo form_error('year'); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php echo form_submit(array('id' => 'submit', 'value' => 'Update year', 'class' => 'btn btn-warning btn-fill pull-right')) ?>
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