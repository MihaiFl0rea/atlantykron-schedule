<?php

class Front_model extends CI_Model
{

    public $status;
    public $roles;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->load->model('Admin_class_schedule_model', 'class_schedules_model', TRUE);
    }

    public function insertUser($postData)
    {
        $string = array(
            'first_name' => $postData['firstname'],
            'last_name' => $postData['lastname'],
            'email' => $postData['email'],
            'role' => $this->roles[0],
            'status' => $this->status[0]
        );
        $q = $this->db->insert_string('users', $string);
        $this->db->query($q);
        return $this->db->insert_id();
    }

    public function isDuplicate($email)
    {
        $this->db->get_where('users', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }

    public function insertToken($userId)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $userId,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $userId;
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;

        } else {
            return false;
        }
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id_user' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    public function updateUserInfo($post)
    {
        $data = array(
            'password' => $post['password'],
            'last_login' => date('Y-m-d h:i:s A'),
            'status' => $this->status[1]
        );
        $this->db->where('id_user', $post['user_id']);
        $this->db->update('users', $data);
        $success = $this->db->affected_rows();

        if (!$success) {
            error_log('Unable to updateUserInfo(' . $post['user_id'] . ')');
            return false;
        }

        $user_info = $this->getUserInfo($post['user_id']);
        return $user_info;
    }

    public function checkLogin($post)
    {
        $this->load->library('password');
        $this->db->select('*');
        $this->db->where('email', $post['email']);
        $query = $this->db->get('users');
        $userInfo = $query->row();

        if (!$this->password->validate_password($post['password'], $userInfo->password)) {
            error_log('Unsuccessful login attempt(' . $post['email'] . ')');
            return false;
        }

        $this->updateLoginTime($userInfo->id);

        unset($userInfo->password);
        return $userInfo;
    }

    public function updateLoginTime($id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('users', array('last_login' => date('Y-m-d h:i:s A')));
        return;
    }

    public function getUserInfoByEmail($email)
    {
        $query = $this->db->get_where('users', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $query->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $email . ')');
            return false;
        }
    }

    public function updatePassword($post)
    {
        $this->db->where('id_user', $post['user_id']);
        $this->db->update('users', array('password' => $post['password']));
        $success = $this->db->affected_rows();

        if (!$success) {
            error_log('Unable to updatePassword(' . $post['user_id'] . ')');
            return false;
        }
        return true;
    }

    public function get_days()
    {
        // get current year
        $year = date('Y');

        $this->db->select('id_schedule_year');
        $this->db->where('year', $year);
        $query = $this->db->get('schedule_year');
        $result = $query->row();

        if (empty($result)) {
            return false;
        }

        $this->db->select('*');
        $this->db->from('schedule_day');
        $this->db->where('id_schedule_year', $result->id_schedule_year);
        $this->db->order_by('timestamp', 'asc');
        $query = $this->db->get();
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array('id' => $result->id_schedule_day, 'name' => date('d.m.Y', strtotime($result->timestamp)));
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function get_classes_by_day($id)
    {
        return $this->class_schedules_model->get_pdf_day_classes($id);
    }

    public function get_day_name($id)
    {
        return $this->class_schedules_model->get_day_name($id);
    }

}
