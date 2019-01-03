<?php

/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 12:14 AM
 */
class Admin_year_model extends CI_Model {

    public function read()
    {
        $query = $this->db->get('schedule_year');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array('id' => $result->id_schedule_year, 'year' => $result->year);
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function create($year)
    {
        $data = array('year' => $year);
        $this->db->insert('schedule_year', $data);
    }

    public function update($id, $year)
    {
        $this->db->where('id_schedule_year', $id);
        $this->db->update('schedule_year', array('year' => $year));
    }

    public function delete($id)
    {
        $this->db->where('id_schedule_year', $id);
        $this->db->delete('schedule_year');
    }

    public function getYearById($id)
    {
        $this->db->select('*');
        $this->db->where('id_schedule_year', $id);
        $query = $this->db->get('schedule_year');
        $result = $query->row();

        return array('id' => $result->id_schedule_year, 'year' => $result->year);
    }

}