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
        return    $query->result_array()[0];
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
        $this->db->limit($start, $limit);
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('reservations');
        return    $query->result_array();
    }

    public function delete_reservation($id)
    {
        $this->db->where('idreservations', $id);
        $this->db->delete('reservations');
    }

    public function add_reservation($event_id)
    {
        $uniqid = 'RE' . uniqid();

        $payment = $this->input->post('payment_status') === 'on' ? 1 : 0;

        $data = array(
            'idreservations' => $uniqid,
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone_nr' => $this->input->post('phone_nr'),
            'total_persons' => $this->input->post('total_persons'),
            'payment_status' => $payment,
            'event_id' => $event_id,
        );
        $this->db->insert('reservations', $data);
        $this->session->set_flashdata('post_created', 'Your reservation has been created');
    }


    public function update_reservation($id)
    {
        $payment = $this->input->post('payment_status') === 'on' ? 1 : 0;

        $data = array(
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone_nr' => $this->input->post('phone_nr'),
            'total_persons' => $this->input->post('total_persons'),
            'payment_status' => $payment,
        );
        $this->db->update('reservations', $data, ['idreservations' => $id]);
        $l = $this->db->last_query();
    }
}
