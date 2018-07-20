<?php

/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 12:13 AM
 */
class Admin_teacher_model extends CI_Model {

    public function read()
    {
        $query = $this->db->get('teacher');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array('id' => $result->id_teacher, 'name' => $result->name, 'email' => $result->email);
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function create($location, $email)
    {
        $data = array('name' => $location, 'email' => $email);
        $this->db->insert('teacher', $data);
    }

    public function update($id, $name, $email)
    {
        $this->db->where('id_teacher', $id);
        $this->db->update('teacher', array('name' => $name, 'email' => $email));
    }

    public function delete($id)
    {
        $this->db->where('id_teacher', $id);
        $this->db->delete('teacher');
    }

    public function getTeacherById($id)
    {
        $this->db->select('*');
        $this->db->where('id_teacher', $id);
        $query = $this->db->get('teacher');
        $result = $query->row();

        return array('id' => $result->id_teacher, 'name' => $result->name, 'email' => $result->email);
    }

}