<?php
/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/14/2018
 * Time: 7:52 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_class extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata['id_user'])) {
            redirect(site_url() . 'admin/login/');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->load->model('Admin_class_model', 'class_model', TRUE);
    }

    public function read()
    {
        $classes = $this->class_model->read();
        $this->load->view('admin/classes', array('template' => 'read', 'classes' => $classes));
    }

    public function create()
    {
        $this->form_validation->set_rules('id_teacher', 'Teacher', 'required');
        $this->form_validation->set_rules('name_ro', 'Class Name (Ro)', 'required');
        $this->form_validation->set_rules('language', 'Teaching language', 'required');

        if ($this->form_validation->run() == FALSE) {
            $teachers = $this->class_model->getTeachers();
            $this->load->view('admin/classes', array('template' => 'create', 'teachers' => $teachers));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->class_model->create($cleanPost['id_teacher'], $cleanPost['name_ro'], $cleanPost['name_en'], $cleanPost['language']);
            redirect(site_url() . 'admin/classes');
        }
    }

    public function update($id = false)
    {
        $this->form_validation->set_rules('id_teacher', 'Teacher', 'required');
        $this->form_validation->set_rules('name_ro', 'Class Name (Ro)', 'required');
        $this->form_validation->set_rules('language', 'Teaching language', 'required');

        if ($this->form_validation->run() == FALSE) {
            $class = $id ? $this->class_model->getClassById($id) : false;
            $teachers = $this->class_model->getTeachers();
            $this->load->view('admin/classes', array('template' => 'update', 'teachers' => $teachers, 'class' => $class));
        } else {
            $cleanPost = $this->security->xss_clean($this->input->post());
            $this->class_model->update($id, $cleanPost['id_teacher'], $cleanPost['name_ro'], $cleanPost['name_en'], $cleanPost['language']);
            redirect(site_url() . 'admin/classes');
        }
    }

    public function delete()
    {
        $this->class_model->delete($this->input->post('id'));
    }

}