<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/14/2018
 * Time: 7:51 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_day extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata['id_user'])) {
            redirect(site_url() . 'admin/login/');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->load->model('Admin_day_model', 'day_model', TRUE);
    }

    public function read()
    {
        $days = $this->day_model->read();
        $this->load->view('admin/days', array('template' => 'read', 'days' => $days));
    }

    public function create()
    {
        $this->form_validation->set_rules('id_year', 'Year', 'required');
        $this->form_validation->set_rules('timestamp', 'Day', 'required');

        if ($this->form_validation->run() == FALSE) {
            $years = $this->day_model->getYears();
            $this->load->view('admin/days', array('template' => 'create', 'years' => $years));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->day_model->create($cleanPost['id_year'], $cleanPost['timestamp']);
            redirect(site_url() . 'admin/days');
        }
    }

    public function update($id = false)
    {
        $this->form_validation->set_rules('id_year', 'Year', 'required');
        $this->form_validation->set_rules('timestamp', 'Day', 'required');

        if ($this->form_validation->run() == FALSE) {
            $day = $id ? $this->day_model->getDayById($id) : false;
            $years = $this->day_model->getYears();
            $this->load->view('admin/days', array('template' => 'update', 'years' => $years, 'day' => $day));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->day_model->update($id, $cleanPost['id_year'], $cleanPost['timestamp']);
            redirect(site_url() . 'admin/days');
        }
    }

    public function delete()
    {
        $this->day_model->delete($this->input->post('id'));
    }

    public function get_days($id)
    {
        $days = $this->day_model->get_days_by_year($id);
        $this->load->view('admin/home', array('template' => 'get_days', 'days' => $days));
    }

}