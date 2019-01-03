<?php

/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 12:11 AM
 */
class Admin_class_model extends CI_Model {

    public function read()
    {
        $query = $this->db->get('class');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array(
                    'id' => $result->id_class,
                    'name_ro' => $result->name_ro,
                    'name_en' => $result->name_en,
                    'teacher' => $this->get_teacher_by_id(explode(',', $result->id_teacher)),
                    'language' => $this->get_language_by_id($result->language)
                );
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function create($id_teacher, $name_ro, $name_en, $language)
    {
        $data = array('id_teacher' => $id_teacher, 'name_ro' => $name_ro, 'name_en' => $name_en, 'language' => $language);
        $this->db->insert('class', $data);
    }

    public function update($id, $id_teacher, $name_ro, $name_en, $language)
    {
        $this->db->where('id_class', $id);
        $this->db->update('class', array('id_teacher' => $id_teacher, 'name_ro' => $name_ro, 'name_en' => $name_en, 'language' => $language));
    }

    public function delete($id)
    {
        $this->db->where('id_class', $id);
        $this->db->delete('class');
    }

    public function get_teachers()
    {
        $query = $this->db->get('teacher');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array('id_teacher' => $result->id_teacher, 'name' => $result->name);
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function get_teacher_by_id($array)
    {
        $this->db->select('*');
        $this->db->where_in('id_teacher', $array);
        $query = $this->db->get('teacher');
        $results = $query->result();

        if (!empty($results)) {
            $teachers = '';
            foreach ($results as $result) {
                $teachers .= $result->name . ', ';
            }
            $teachers = rtrim($teachers, ', ');
        } else {
            $teachers = '';
        }

        return $teachers;
    }

    public function get_class_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id_class', $id);
        $query = $this->db->get('class');
        $result = $query->row();

        return array(
            'id' => $result->id_class,
            'id_teacher' => $result->id_teacher,
            'name_ro' => $result->name_ro,
            'name_en' => $result->name_en,
            'language' => $result->language
        );
    }

    public function get_language_by_id($id)
    {
        if ($id == 1) {
            return "Romanian";
        } else {
            return "English";
        }
    }

    public function get_teachers_as_string($array_of_teachers)
    {
        $teachers = '';
        foreach ($array_of_teachers as $teacher_id) {
            $teachers .= $teacher_id . ',';
        }

        return rtrim($teachers, ',');
    }

}