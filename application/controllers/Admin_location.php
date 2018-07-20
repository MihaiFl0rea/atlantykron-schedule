<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/14/2018
 * Time: 7:51 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_location extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata['id_user'])) {
            redirect(site_url() . 'admin/login/');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->load->model('Admin_location_model', 'location_model', TRUE);
    }

    public function read()
    {
        $locations = $this->location_model->read();
        $this->load->view('admin/locations', array('template' => 'read', 'locations' => $locations));
    }

    public function create()
    {
        $this->form_validation->set_rules('location', 'Location', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/locations', array('template' => 'create'));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->location_model->create($cleanPost['location']);
            redirect(site_url() . 'admin/locations');
        }
    }

    public function update($id = false)
    {
        $this->form_validation->set_rules('location', 'Location', 'required');

        if ($this->form_validation->run() == FALSE) {
            $location = $id ? $this->location_model->getLocationById($id) : false;
            $this->load->view('admin/locations', array('template' => 'update','location' => $location));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->location_model->update($id, $cleanPost['location']);
            redirect(site_url() . 'admin/locations');
        }
    }

    public function delete()
    {
        $this->location_model->delete($this->input->post('id'));
    }

}