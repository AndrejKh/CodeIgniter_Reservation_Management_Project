<?php
class Reservations extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$this->load->helper('utils');
		$this->load->helper('url', 'form');
		$this->load->library("pagination");
	}

	public function check_login()
	{
		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}
	}


	public function create_public($event_id)
	{
		$data['title'] = 'Add Reservation';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('last_name', 'Lastname', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone_nr', 'phone', 'required');
		$this->form_validation->set_rules('total_persons', 'Total Persons', 'required');
		// $this->form_validation->set_rules('payment_status', 'Payment status', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('reservations/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->reservation_model->add_reservation($event_id);
			// Set message
			header("Refresh:0");
		}
	}



	public function create()
	{
		$this->check_login();
		$this->check_premissions_reservations('modify');
		$event_id = $this->uri->segment(3);
		$data['title'] = 'Add Reservation';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('last_name', 'Lastname', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone_nr', 'phone', 'required');
		$this->form_validation->set_rules('total_persons', 'Total Persons', 'required');
		// $this->form_validation->set_rules('payment_status', 'Payment status', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['event'] = $this->event_model->get_event_by_id($event_id);

			$this->load->view('templates/header');
			$this->load->view('reservations/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->reservation_model->add_reservation($event_id);
			// Set message
			header("Refresh:0");
		}
	}



	public function delete($id)
	{
		$this->check_login();
		$this->check_premissions_reservations('modify');

		$this->reservation_model->delete_reservation($id);

		// Set message
		$this->session->set_flashdata('created', 'Your reservation has been deleted');

		redirect('events/' . $this->input->post('event_id') . '/reservations');
	}



	public function get($id)
	{
		$this->check_login();

		$data['reservation']	= $this->reservation_model->get_reservation($id);
		$data['event'] = $this->event_model->get_event_by_id($data['reservation']['event_id']);

		$this->load->view('templates/header');
		$this->load->view('reservations/index', $data);
		$this->load->view('templates/footer');
	}


	public function update($id)
	{
		$this->check_login();
		$this->check_premissions_reservations('modify');

		$data['title'] = 'Edit Reservation';
		$event_id = $this->uri->segment(3);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('last_name', 'Lastname', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone_nr', 'phone', 'required');
		$this->form_validation->set_rules('total_persons', 'Total Persons', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['reservation'] = $this->reservation_model->get_reservation($event_id);
			$this->load->view('templates/header');
			$this->load->view('reservations/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->reservation_model->update_reservation($id);

			// Set message
			$this->session->set_flashdata('created', 'Your reservation has been updated');

			header("Refresh:0");
		}
	}

	public function check_premissions_reservations($action)
	{
		$premissions =	$this->session->userdata('user_premissions');
		if ((strpos($premissions, 'reservations') !== false && strpos($premissions, $action) !== false) || $premissions === 'all') {
			return true;
		} else {
			$this->session->set_flashdata('bad_request', 'You dont have premissions!');
			redirect('/');
		}
	}
}
