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
                    'teacher' => $this->getTeacherById($result->id_teacher),
                    'language' => $this->getLanguageById($result->language)
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

    public function getTeachers()
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

    public function getTeacherById($id)
    {
        $this->db->select('*');
        $this->db->where('id_teacher', $id);
        $query = $this->db->get('teacher');
        $result = $query->row();

        return $result->name;
    }

    public function getClassById($id)
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

    public function getLanguageById($id)
    {
        if ($id == 1) {
            return "Romanian";
        } else {
            return "English";
        }
    }

}