<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/14/2018
 * Time: 7:52 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_teacher extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata['id_user'])) {
            redirect(site_url() . 'admin/login/');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->load->model('Admin_teacher_model', 'teacher_model', TRUE);
    }

    public function read()
    {
        $teachers = $this->teacher_model->read();
        $this->load->view('admin/teachers', array('template' => 'read', 'teachers' => $teachers));
    }

    public function create()
    {
        $this->form_validation->set_rules('name', 'Teacher Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/teachers', array('template' => 'create'));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->teacher_model->create($cleanPost['name'], $cleanPost['email']);
            redirect(site_url() . 'admin/teachers');
        }
    }

    public function update($id = false)
    {
        $this->form_validation->set_rules('name', 'Teacher Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $teacher = $id ? $this->teacher_model->getTeacherById($id) : false;
            $this->load->view('admin/teachers', array('template' => 'update','teacher' => $teacher));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->teacher_model->update($id, $cleanPost['name'], $cleanPost['email']);
            redirect(site_url() . 'admin/teachers');
        }
    }

    public function delete()
    {
        $this->teacher_model->delete($this->input->post('id'));
    }

}