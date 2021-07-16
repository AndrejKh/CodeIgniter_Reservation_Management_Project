<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

define("RECAPTCHA_V3_SECRET_KEY", '6Ldl0nobAAAAALYBbv1GbHah52mJcXyGn43qufvO');

class Reservation_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_reservation($id)
    {
    }
    public function get_reservations_for_event($event_id)
    {
    }
    public function add_reservation($event_id)
    {
        $uniqid = 'RE' . uniqid();

        $data = array(
            'id' => $uniqid,
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'phone_nr' => $this->input->post('phone_nr'),
            'total_persons' => $this->input->post('total_persons'),
            'payment_status' => $this->input->post('payment_status'),
            'event_id' => $this->input->post('event_id'),
        );
        $this->db->insert('admin_forms', $data);
        $this->session->set_flashdata('post_created', 'Your request has been created share this url: <a href="' . base_url() . 'request/submit/' . $data['id'] . '" >' . base_url() . 'request/submit/' . $data['id'] . '</a>');
    }
    public function update_reservation($event_id)
    {
        $uniqid = 'RE' . uniqid();

        $data = array(
            'id' => $uniqid,
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'phone_nr' => $this->input->post('phone_nr'),
            'total_persons' => $this->input->post('total_persons'),
            'payment_status' => $this->input->post('payment_status'),
            'event_id' => $this->input->post('event_id'),
        );
        $this->db->update('admin_forms', $data, ['idreservattion' => $data['id']]);
        $this->session->set_flashdata('post_created', 'Your request has been created share this url: <a href="' . base_url() . 'request/submit/' . $data['id'] . '" >' . base_url() . 'request/submit/' . $data['id'] . '</a>');
    }
}
