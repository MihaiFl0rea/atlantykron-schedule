<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/14/2018
 * Time: 7:50 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_year extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata['id_user'])) {
            redirect(site_url() . 'admin/login/');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->load->model('Admin_year_model', 'year_model', TRUE);
    }

    public function read()
    {
        $years = $this->year_model->read();
        $this->load->view('admin/years', array('template' => 'read', 'years' => $years));
    }

    public function create()
    {
        $this->form_validation->set_rules('year', 'Year', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/years', array('template' => 'create'));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->year_model->create($cleanPost['year']);
            redirect(site_url() . 'admin/years');
        }
    }

    public function update($id = false)
    {
        $this->form_validation->set_rules('year', 'Year', 'required');

        if ($this->form_validation->run() == FALSE) {
            $year = $id ? $this->year_model->getYearById($id) : false;
            $this->load->view('admin/years', array('template' => 'update','year' => $year));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->year_model->update($id, $cleanPost['year']);
            redirect(site_url() . 'admin/years');
        }
    }

    public function delete()
    {
        $this->year_model->delete($this->input->post('id'));
    }

}