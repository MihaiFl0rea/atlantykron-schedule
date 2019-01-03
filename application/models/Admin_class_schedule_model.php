<?php

/**
 * Created by PhpStorm.
 * User: Mihai
 * Date: 7/15/2018
 * Time: 12:12 AM
 */
class Admin_class_schedule_model extends CI_Model {

    public function read()
    {
        $query = $this->db->get('class_schedule');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array(
                    'id' => $result->id_class_schedule,
                    'class' => $this->get_class_by_id($result->id_class),
                    'location' => $this->get_location_by_id($result->id_location),
                    'day' => $this->get_day_by_id($result->id_day),
                    'time_period' => date('H:i',strtotime($result->start_hour)) . ' - ' . date('H:i',strtotime($result->end_hour))
                );
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function create($id_class, $id_location, $id_day, $start_hour, $end_hour)
    {
        $data = array('id_class' => $id_class, 'id_location' => $id_location, 'id_day' => $id_day, 'start_hour' => $start_hour, 'end_hour' => $end_hour);
        $this->db->insert('class_schedule', $data);
    }

    public function update($id, $id_class, $id_location, $id_day, $start_hour, $end_hour)
    {
        $this->db->where('id_class_schedule', $id);
        $this->db->update('class_schedule', array('id_class' => $id_class, 'id_location' => $id_location, 'id_day' => $id_day, 'start_hour' => $start_hour, 'end_hour' => $end_hour));
    }

    public function delete($id)
    {
        $this->db->where('id_class_schedule', $id);
        $this->db->delete('class_schedule');
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
            'teacher' => $this->get_teacher_by_id(explode(',', $result->id_teacher)),
            'name_ro' => $result->name_ro,
            'name_en' => $result->name_en,
            'language' => $this->get_language_by_id($result->language),
            'language_id' => $result->language
        );
    }

    public function get_classes()
    {
        $query = $this->db->get('class');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array(
                    'id' => $result->id_class,
                    'name' => $result->name_ro . ' | ' . $this->get_teacher_by_id(explode(',', $result->id_teacher)) . ' | ' . $this->get_language_by_id($result->language) . ' class'
                );
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function get_day_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id_schedule_day', $id);
        $query = $this->db->get('schedule_day');
        $result = $query->row();

        return date('l, d F Y', strtotime($result->timestamp));
    }

    public function get_days()
    {
        $query = $this->db->get('schedule_day');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array(
                    'id' => $result->id_schedule_day,
                    'name' => date('l, d F Y', strtotime($result->timestamp))
                );
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function get_language_by_id($id, $short = false)
    {
        if ($id == 1) {
            if ($short) {
                $language = "Ro";
            } else {
                $language = "Romanian";
            }
        } else {
            if ($short) {
                $language = "En";
            } else {
                $language = "English";
            }
        }

        return $language;
    }

    public function get_location_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id_location', $id);
        $query = $this->db->get('location');
        $result = $query->row();

        return $result->name;
    }

    public function get_locations()
    {
        $query = $this->db->get('location');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array(
                    'id' => $result->id_location,
                    'name' => $result->name
                );
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function get_class_schedule_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id_class_schedule', $id);
        $query = $this->db->get('class_schedule');
        $result = $query->first_row();

        return array(
            'id' => $result->id_class_schedule,
            'id_class' => $result->id_class,
            'id_location' => $result->id_location,
            'id_day' => $result->id_day,
            'start_hour' => $result->start_hour,
            'end_hour' => $result->end_hour
        );
    }

    public function get_day_name($id, $ro = false)
    {
        $this->db->select('*');
        $this->db->where('id_schedule_day', $id);
        $query = $this->db->get('schedule_day');
        $result = $query->first_row();

        if ($ro) {
            return !empty($result->timestamp) ?  date('d.m.Y', strtotime($result->timestamp)) : false;
        } else {
            return !empty($result->timestamp) ? date('l, d F Y', strtotime($result->timestamp)) : false;
        }
    }

    public function get_class_schedule_by_day_id($id)
    {
        $this->db->select('*');
        $this->db->where('id_day', $id);
        $query = $this->db->get('class_schedule');
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $data[] = array(
                    'id' => $result->id_class_schedule,
                    'class' => $this->get_class_by_id($result->id_class),
                    'location' => $this->get_location_by_id($result->id_location),
                    'day' => $this->get_day_by_id($result->id_day),
                    'time_period' => date('H:i',strtotime($result->start_hour)) . ' - ' . date('H:i',strtotime($result->end_hour))
                );
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function get_pdf_day_classes($id)
    {
        $this->db->select('*');
        $this->db->from('class_schedule');
        $this->db->where('id_day', $id);
        $this->db->order_by('start_hour', 'asc');
        $query = $this->db->get();
        $results = $query->result();

        if (!empty($results)) {
            foreach ($results as $result) {
                $class = $this->get_class_by_id($result->id_class);

                $data[] = array(
                    'name_ro' => $class['name_ro'],
                    'name_en' => $class['name_en'],
                    'teacher' => $class['teacher'],
                    'language' => $this->get_language_by_id($class['language_id'], true),
                    'location' => $this->get_location_by_id($result->id_location),
                    'hour' => date('H:i',strtotime($result->start_hour)) . ' - ' . date('H:i',strtotime($result->end_hour))
                );
            }
        } else {
            $data = false;
        }

        return $data;
    }

    public function get_day_schedule_as_pdf($id, $font = false)
    {
        // load tcpdf class
        require_once(APPPATH."third_party/tcpdf/tcpdf.php");
        // load our custom class which extends tcpdf
        require_once(APPPATH."third_party/tcpdf/custom_tcpdf.php");

        // Create a new PDF but using our own class that extends TCPDF
        $pdf = new CustomTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetAuthor('Atlantykron Admin');

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
        // set margins
        $pdf->SetMargins('10', '30', '10');
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $font_family = in_array($font, array('comicsansms', 'papyrus')) ? $font : 'dejavusans';

        $pdf->SetFont($font_family, '', 10);

        // Add a page
        $pdf->AddPage('L');

        $html = '<html>
            <head>
                <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                td {
                    border: 1px solid #dddddd;
                    font-size: 12px;
                    text-align: center;
                    height: 15px;
                }

                th {
                    border: 2px solid #dddddd;
                    font-size: 14px;
                    text-align: center;
                    height: 15px;
                }

                h1 {
                    text-align: center;
                }
                </style>
            </head>
            <body>

            <h1>Orar Atlantykron | ' . $this->get_day_name($id, true) . '</h1>

            <table>
                <thead>
                    <tr>
                        <th>CURS/CLASS</th>
                        <th>LECTOR/TEACHER</th>
                        <th>LOC/PLACE</th>
                        <th>ORA/HOUR</th>
                    </tr>
                </thead>
                <tbody>';

            foreach ($this->get_pdf_day_classes($id) as $class) {
                // handle non-classes (breakfast, lunch, dinner)
                $language = ($class['teacher'] == '-') ? '' : '(' . $class['language'] . ') ';
                $html .= "<tr>" .
                    "<td>" . $language . $class['name_ro'] . (!empty($class['name_en']) ? ' / ' . $class['name_en'] : '') . "</td>" .
                    "<td>" . $class['teacher'] . "</td>" .
                    "<td>" . $class['location'] . "</td>" .
                    "<td>" . $class['hour'] . "</td>" .
                "</tr>";
            }

            $html .= "</tbody>
                </table>
            
            </body>
        </html>";

        $pdf->footer = "Atlantykron's Schedule | " . $this->get_day_name($id);

        $pdf->setCellPaddings('',2,'','2');
        $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output PDF document
        $pdf->Output('Atlantykron_' . str_replace('.','_', $this->get_day_name($id, true)) . '.pdf', 'D');
    }

}