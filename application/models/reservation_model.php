<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// define("RECAPTCHA_V3_SECRET_KEY", '6Ldl0nobAAAAALYBbv1GbHah52mJcXyGn43qufvO');

class Reservation_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_reservation($id)
    {
        $this->db->select('*');
        $this->db->where('idreservations', $id);
        $query = $this->db->get('reservations');
        return    $query->result_array();
    }


    public function count_reservations_by_event($event_id)
    {
        $this->db->select('COUNT(*)');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('reservations');
        return    $query->row_array();
    }

    public function get_reservations_for_event($event_id, $limit, $start)
    {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('reservations');
        return    $query->result_array();
    }


    public function add_reservation($event_id)
    {
        $uniqid = 'RE' . uniqid();

        $data = array(
            'idreservations' => $uniqid,
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'phone_nr' => $this->input->post('phone_nr'),
            'total_persons' => $this->input->post('total_persons'),
            'payment_status' => $this->input->post('payment_status'),
            'event_id' => $event_id,
        );
        $this->db->insert('admin_forms', $data);
        $this->session->set_flashdata('post_created', 'Your request has been created share this url: <a href="' . base_url() . 'request/submit/' . $data['id'] . '" >' . base_url() . 'request/submit/' . $data['id'] . '</a>');
    }


    public function update_reservation($event_id)
    {

        $data = array(
            'idreservations' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'phone_nr' => $this->input->post('phone_nr'),
            'total_persons' => $this->input->post('total_persons'),
            'payment_status' => $this->input->post('payment_status'),
            'event_id' => $event_id,
        );
        $this->db->update('admin_forms', $data, ['idreservattion' => $data['id']]);
        $this->session->set_flashdata('post_created', 'Your request has been created share this url: <a href="' . base_url() . 'request/submit/' . $data['id'] . '" >' . base_url() . 'request/submit/' . $data['id'] . '</a>');
    }
}
