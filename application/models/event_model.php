<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

define("RECAPTCHA_V3_SECRET_KEY", '6Ldl0nobAAAAALYBbv1GbHah52mJcXyGn43qufvO');

class Event_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function get_count_by_ip($ip)
	{
		$this->db->select('COUNT(*)');
		$this->db->where('completed', 0);
		$this->db->where('ip', $ip);
		$query = $this->db->get('requests');
		return	$query->row_array();
	}


	public function count_events()
	{
		$this->db->select('COUNT(*)');
		$query = $this->db->get('events');
		return	$query->row_array();
	}


	public function count_user_requests($form_id)
	{
		$this->db->select('COUNT(*) as req_nr');
		$this->db->where('form_id', $form_id);
		$query = $this->db->get('user_requests');
		return $query->row_array();
	}

	public function get_request_count($completed = 0)
	{
		$this->db->select('COUNT(*)');
		$this->db->where('completed', $completed);
		$query = $this->db->get('requests');
		return	$query->row_array();
	}

	public function get_count_active_grouped()
	{
		$this->db->select(' COUNT(distinct `ip`) as req_nr ');
		$this->db->where('completed', 0);
		$query = $this->db->get('requests');
		return	$query->row_array();
	}

	public function get_event_by_id($id)
	{
		$this->db->select('*');
		$query = $this->db->get_where('events', array('idevents' => $id));
		return $query->result_array()[0];
	}

	public function get_events($limit, $start)
	{
		$this->db->select('*,(select sum(total_persons)  from reservations where event_id=events.idevents ) as total_ticket');
		$this->db->limit($limit, $start);
		$query = $this->db->get('events');
		return	$query->result_array();
	}

	public function get_requests_by_ip($ip, $limit, $start)
	{
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$query = $this->db->get_where('requests', array('requests.ip' => $ip, 'completed' => 0));
		return $query->result_array();
	}


	public function get_admin_forms($limit, $start)
	{
		$this->db->select('*,  (select count(*) from user_requests where user_requests.form_id= admin_forms.id and completed=0 ) as req_nr');
		$this->db->limit($limit, $start);
		$query = $this->db->get('admin_forms');
		return $query->result_array();
	}

	public function get_admin_forms_by_id($id)
	{
		$query = $this->db->get_where('admin_forms', array('id' => $id));
		return $query->result_array();
	}

	public function delete_admin_forms($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin_forms');
		return true;
	}

	public function get_user_requests($form_id, $limit, $start)
	{
		$this->db->select('user_requests.id as user_req_id, username,email,referer,urls,ip,completed,admin_forms.id as form_id ');
		$this->db->from('user_requests');
		$this->db->join('admin_forms', 'admin_forms.id = user_requests.form_id');
		$this->db->limit($limit, $start);
		$this->db->where('form_id', $form_id);
		$this->db->where('completed', 0);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_active_requests($limit, $start)
	{
		$this->db->select('*, COUNT(id) as ip_nr');
		$this->db->limit($limit, $start);
		$this->db->where('completed', 0);
		$this->db->group_by("ip");
		$query = $this->db->get('requests');
		return	$query->result_array();
	}

	public function get_completed_requests($limit, $start)
	{
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$query = $this->db->get_where('requests', array('completed' => 1));
		return $query->result_array();
	}

	public function create_event($img)
	{
		$uniqid = 'EV' . uniqid();

		$data = array(
			'date' => $this->input->post('date'),
			'guest' => $this->input->post('guest'),
			'image' => $img,
			'ticket_price' => $this->input->post('ticket_price'),
			// 'referer' => $this->input->post('referer'),
			'idevents' =>  $uniqid,
		);
		$this->db->insert('events', $data);
		$this->session->set_flashdata('post_created', 'Your request has been submited,you will recieve an email very soon (please also check spam folder)!');
	}



	public function create_request_by_admin()
	{
		$uniqid = 'AR' . uniqid();

		$data = array(
			'form_title' => $this->input->post('form-title'),
			'urls' => $this->input->post('urls'),
			'referer' => $this->input->post('referer'),
			'id' =>  $uniqid,
		);
		$this->db->insert('admin_forms', $data);
		$this->session->set_flashdata('post_created', 'Your request has been created share this url: <a href="' . base_url() . 'request/submit/' . $data['id'] . '" >' . base_url() . 'request/submit/' . $data['id'] . '</a>');
	}


	public function submit_to_admin()
	{

		$data = array(
			'form_id' => $this->input->post('reqID'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
		);
		$this->db->insert('user_requests', $data);
		$this->session->set_flashdata('post_created', 'Your request has been submited,you will recieve an email very soon (please also check spam folder)!');
	}


	public function delete_event($id)
	{
		$this->db->where('idevents', $id);
		$this->db->delete('events');
		return true;
	}


	public function delete_user_requests($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_requests');
		return true;
	}


	public function update_events($id, $img)
	{

		$date = new DateTime($this->input->post('date'));
		$data['event']['date'] = $date->format('Y/m/d H:i:s');

		$data = array(
			'date' => $this->input->post('date'),
			'guest' => $this->input->post('guest'),
			'image' => $img,
			'ticket_price' => $this->input->post('ticket_price'),
		);
		$this->db->update('events', $data, array('idevents' => $id));
	}


	public function send_free_users_email()
	{

		$data = array(
			'id' => $this->input->post('reqID'),
			'name' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'text' => $this->input->post('req-text'),
			'urls' => $this->input->post('req-urls'),
			'completed' => 1
		);
		$this->db->update('requests', $data, array('id' => $data['id']));

		$automaticMessage = '<h3>Dear user, we hope you are doing great!</h3>
		<p>We have received your file request in a good manner.</p>
		<p>Sorry for the inconvenience caused , but this file is exclusively available for XenUpload Premium Users.</p>
		Make sure, you have a Premium membership with XenUpload to be able to receive protected files/links.</p>
		<p>You can become a Premium Member by going to the link below:<br>
		<a href="https://xenupload.com/upgrade.html">https://xenupload.com/upgrade.html</a></p>';
		Event_model::send_email($data['email'], $data['name'], $automaticMessage, '');
	}

	public function send_wrong_username_email()
	{

		$data = array(
			'id' => $this->input->post('reqID'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'completed' => 1
		);
		$this->db->update('user_requests', $data, array('id' => $data['id']));

		$automaticMessage = '<h3>Dear user, we hope you are doing great!</h3>
		<p>We have received your file request in a good manner.</p>
		<p>Sorry for the inconvenience caused , but this file is exclusively available for XenUpload Premium Users.</p>
		Make sure, you have a Premium membership with XenUpload to be able to receive protected files/links.</p>
		<p>You can become a Premium Member by going to the link below:<br>
		<a href="https://xenupload.com/upgrade.html">https://xenupload.com/upgrade.html</a></p>';
		Event_model::send_email($data['email'], $data['username'], $automaticMessage, '');
	}

	public function send_admin_to_user_email()
	{

		$data = array(
			'id' => $this->input->post('reqID'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'completed' => 1
		);

		$this->db->update('user_requests', $data, array('id' => $data['id']));
		$message = 'Request ID: ' . $data['id'] . '<br>';
		$message .= 'Name: ' . $data['username'] . '<br>';
		$message .= 'Email: ' . $data['email'] . '<br>';
		$message .= $this->input->post('req-urls');
		Event_model::send_email($data['email'], $data['username'], $message, 'URL from xenupload');
	}

	static public	function getIPAddress()
	{
		//whether ip is from the share internet  
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		//whether ip is from the proxy  
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		//whether ip is from the remote address  
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	static public function send_email($emailTo, $username, $urls, $subject = 'Here is the subject')
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
			$mail->Body    = $urls;
			$mail->AltBody = $urls;

			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}
