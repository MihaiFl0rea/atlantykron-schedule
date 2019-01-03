<?php

/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 12:13 AM
 */
class Admin_location_model extends CI_Model {

    public function read()
    {
        $query = $this->db->get('location');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array('id' => $result->id_location, 'name' => $result->name);
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function create($location)
    {
        $data = array('name' => $location);
        $this->db->insert('location', $data);
    }

    public function update($id, $location)
    {
        $this->db->where('id_location', $id);
        $this->db->update('location', array('name' => $location));
    }

    public function delete($id)
    {
        $this->db->where('id_location', $id);
        $this->db->delete('location');
    }

    public function getLocationById($id)
    {
        $this->db->select('*');
        $this->db->where('id_location', $id);
        $query = $this->db->get('location');
        $result = $query->row();

        return array('id' => $result->id_location, 'name' => $result->name);
    }

}