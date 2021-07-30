<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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

    public function get_reservations_for_event($event_id, $limit = 20, $start = 0)
    {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('reservations');
        $r =   $this->db->last_query();
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
        $name = 'qr-reservation' . $uniqid;
        $qr_data =   $this->generate_qrcode(base_url() . 'reservation/' . $uniqid, $name);
        $event_image = 'assets/images/events/' . $this->event_model->get_event_image($event_id)[0]['image'];
        $data = array(
            'idreservations' => $uniqid,
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone_nr' => $this->input->post('phone_nr'),
            'total_persons' => $this->input->post('total_persons'),
            'qr_image' => $qr_data['file'],
            'payment_status' => $payment,
            'event_id' => $event_id,
        );
        $this->db->insert('reservations', $data);
        $email_data = array_merge($data, array('event_image' => $event_image));
        $email_content = $this->load->view('email_template/reservation', $email_data, TRUE);
        $this->send_reservation_email($data['email'], $data['name'] . $data['lastname'], $email_content);
        $this->session->set_flashdata('created', 'Your reservation has been created');
    }


    public function update_reservation($id)
    {
        $payment = $this->input->post('payment_status') === 'on' ? 1 : 0;
        $database_payment_status = $this->reservation_model->get_reservation($id)['payment_status'];
        $data = array(
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone_nr' => $this->input->post('phone_nr'),
            'total_persons' => $this->input->post('total_persons'),
            'payment_status' => $payment,
        );
        $this->db->update('reservations', $data, ['idreservations' => $id]);

        if ($database_payment_status === '0' && $payment === 1) {
            $email_content = $this->load->view('email_template/post-payment', [], TRUE);
            $this->send_reservation_email($data['email'], $data['name'] . $data['lastname'], $email_content);
        }
    }

    function generate_qrcode($data, $file_name)
    {
        /* Load QR Code Library */
        $this->load->library('ciqrcode');

        /* Data */
        $hex_data   = bin2hex($data);
        $save_name  = $file_name . '.png';

        /* QR Code File Directory Initialize */
        $dir = 'assets/media/qrcode/';
        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }

        /* QR Configuration  */
        $config['cacheable']    = true;
        $config['imagedir']     = $dir;
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(255, 255, 255);
        $config['white']        = array(255, 255, 255);
        $this->ciqrcode->initialize($config);

        /* QR Data  */
        $params['data']     = $data;
        $params['level']    = 'L';
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $save_name;

        $this->ciqrcode->generate($params);

        /* Return Data */
        $return = array(
            'content' => $data,
            'file'    => $dir . $save_name
        );
        return $return;
    }

    function  send_reservation_email($emailTo, $username, $content, $subject = 'Here is the subject')
    {

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.zoho.eu';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'request@ihow.info';            //SMTP username
            $mail->Password   = 'Jamatje123@';                                       //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('request@ihow.info', 'URL REQUEST');
            $mail->addAddress($emailTo, $username);     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $content;
            $mail->AltBody = $content;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
