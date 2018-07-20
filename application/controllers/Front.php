<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Front_model', 'front_model', TRUE);
    }

    public function index()
    {
        $days = $this->front_model->get_days();
        $this->load->view('index', array('template' => 'home', 'days' => $days));
    }

    public function daily_schedule($id)
    {
        $days = $this->front_model->get_days();
        $classes = $this->front_model->get_classes_by_day($id);
        $day_name = $this->front_model->get_day_name($id);
        $this->load->view('index', array('template' => 'get_daily_schedule', 'days' => $days, 'classes' => $classes, 'day_name' => $day_name));
    }

}
