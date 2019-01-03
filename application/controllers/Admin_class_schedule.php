<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/14/2018
 * Time: 7:53 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_class_schedule extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata['id_user'])) {
            redirect(site_url() . 'admin/login/');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->load->model('Admin_class_schedule_model', 'class_schedule_model', TRUE);
    }

    public function read()
    {
        $class_schedules = $this->class_schedule_model->read();
        $this->load->view('admin/class_schedules', array('template' => 'read', 'class_schedules' => $class_schedules));
    }

    public function create()
    {
        $this->form_validation->set_rules('id_class', 'Class', 'required');
        $this->form_validation->set_rules('id_day', 'Day', 'required');
        $this->form_validation->set_rules('start_hour', 'Start hour', 'required');
        $this->form_validation->set_rules('end_hour', 'End hour', 'required');

        if ($this->form_validation->run() == FALSE) {
            $classes = $this->class_schedule_model->get_classes();
            $locations = $this->class_schedule_model->get_locations();
            $days = $this->class_schedule_model->get_days();
            $this->load->view('admin/class_schedules', array('template' => 'create', 'classes' => $classes, 'locations' => $locations, 'days' => $days));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->class_schedule_model->create($cleanPost['id_class'], $cleanPost['id_location'], $cleanPost['id_day'], $cleanPost['start_hour'], $cleanPost['end_hour']);
            redirect(site_url() . 'admin/class-schedules');
        }
    }

    public function update($id = false)
    {
        $this->form_validation->set_rules('id_class', 'Class', 'required');
        $this->form_validation->set_rules('id_day', 'Day', 'required');
        $this->form_validation->set_rules('start_hour', 'Start hour', 'required');
        $this->form_validation->set_rules('end_hour', 'End hour', 'required');

        if ($this->form_validation->run() == FALSE) {
            $class_schedule = $id ? $this->class_schedule_model->get_class_schedule_by_id($id) : false;
            $classes = $this->class_schedule_model->get_classes();
            $locations = $this->class_schedule_model->get_locations();
            $days = $this->class_schedule_model->get_days();
            $this->load->view('admin/class_schedules', array('template' => 'update', 'class_schedule' => $class_schedule, 'classes' => $classes, 'locations' => $locations, 'days' => $days));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->class_schedule_model->update($id, $cleanPost['id_class'], $cleanPost['id_location'], $cleanPost['id_day'], $cleanPost['start_hour'], $cleanPost['end_hour']);
            redirect(site_url() . 'admin/class-schedules');
        }
    }

    public function delete()
    {
        $this->class_schedule_model->delete($this->input->post('id'));
    }

    public function get_classes($id)
    {
        $day_name = $this->class_schedule_model->get_day_name($id);
        $classes = $this->class_schedule_model->get_class_schedule_by_day_id($id);
        $this->load->view('admin/home', array('template' => 'get_classes', 'day_name' => $day_name, 'day_id' => $id, 'classes' => $classes));
    }

    public function get_schedule_as_pdf($id, $font)
    {
        $this->class_schedule_model->get_day_schedule_as_pdf($id, $font);
    }

}