<?php

/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 12:12 AM
 */
class Admin_day_model extends CI_Model {

    public function read()
    {
        $query = $this->db->get('schedule_day');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array('id' => $result->id_schedule_day, 'year' => $this->getYearById($result->id_schedule_year), 'day' => date('l, d F Y', strtotime($result->timestamp)));
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function create($id_year, $timestamp)
    {
        $data = array('id_schedule_year' => $id_year, 'timestamp' => $timestamp);
        $this->db->insert('schedule_day', $data);
    }

    public function update($id, $id_year, $timestamp)
    {
        $this->db->where('id_schedule_day', $id);
        $this->db->update('schedule_day', array('id_schedule_year' => $id_year, 'timestamp' => $timestamp));
    }

    public function delete($id)
    {
        $this->db->where('id_schedule_day', $id);
        $this->db->delete('schedule_day');
    }

    public function getYears()
    {
        $query = $this->db->get('schedule_year');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array('id_year' => $result->id_schedule_year, 'year' => $result->year);
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function getYearById($id)
    {
        $this->db->select('*');
        $this->db->where('id_schedule_year', $id);
        $query = $this->db->get('schedule_year');
        $result = $query->row();

        return $result->year;
    }

    public function getDayById($id)
    {
        $this->db->select('*');
        $this->db->where('id_schedule_day', $id);
        $query = $this->db->get('schedule_day');
        $result = $query->row();

        return array('id' => $result->id_schedule_day, 'id_year' => $result->id_schedule_year, 'year' => $this->getYearById($result->id_schedule_year), 'timestamp' => $result->timestamp);
    }

    public function get_days_by_year($id)
    {
        $this->db->select('*');
        $this->db->where('id_schedule_year', $id);
        $query = $this->db->get('schedule_day');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array('id' => $result->id_schedule_day, 'name' => date('l, d F Y', strtotime($result->timestamp)));
            }
        } else {
            $data = false;
        }

        return $data;
    }

}