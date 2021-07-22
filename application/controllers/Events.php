<?php
class Events extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}

		$this->load->helper('utils');
		$this->load->helper('url', 'form');
		$this->load->library("pagination");
	}


	public function view($id)
	{
		$data['package'] = $this->event_model->get_event_by_id($id)[0];

		$this->load->view('templates/header');
		$this->load->view('events/view', $data);
		$this->load->view('templates/footer');
	}



	public function create()
	{

		$data['title'] = 'Add Event';

		$this->form_validation->set_rules('guest', 'Guest', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('ticket_price', 'Ticket price', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('events/create', $data);
			$this->load->view('templates/footer');
		} else {
			// Upload Image
			$config['upload_path'] = './assets/images/events';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$file = explode("/", $_FILES['image']['type']);
			$ext = '.' . end($file);
			$config['file_name'] = 'img-event-' . time() . $ext;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = 	$config['file_name'];
			}
			$this->event_model->create_event($post_image);
			// Set message
			header("Refresh:0");
		}
	}
	public function update($id)
	{

		$data['title'] = 'Edit Event';

		$this->form_validation->set_rules('guest', 'Guest', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('ticket_price', 'Ticket price', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['event'] = $this->event_model->get_event_by_id($id);
			$date = new DateTime($data['event']['date']);
			$data['event']['date'] =	substr($date->format(DateTime::ATOM), 0, 16); // Updated ISO8601	
			$this->load->view('templates/header');
			$this->load->view('events/edit', $data);
			$this->load->view('templates/footer');
		} else {
			// Upload Image
			$config['upload_path'] = './assets/images/events';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			if ($_FILES['image']['type']) {
				$file = explode("/", $_FILES['image']['type']);
				$ext = '.' . end($file);
				$config['file_name'] = 'img-event-' . time() . $ext;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$errors = array('error' => $this->upload->display_errors());
					$post_image = '';
					$this->session->set_flashdata('post_deleted', 'Your image was not uploaded!');
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image =	$config['file_name'];
				}
			} else {
				$post_image = '';
			}

			$this->event_model->update_events($id, $post_image);
			// Set message
			header("Refresh:0");
		}
	}


	public function reservations($id)
	{

		$data['reservationList'] = $this->reservation_model->get_reservations_for_event($id, 0, 10);

		$this->load->view('templates/header');
		$this->load->view('reservations/list', $data);
		$this->load->view('templates/footer');
	}

	public function list()
	{
		$config = get_pagination_config();
		$config["base_url"] = base_url() . "events/list";
		$config["total_rows"] = $this->event_model->count_events()['COUNT(*)'];
		$this->pagination->initialize($config);
		$offset = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['eventList'] = $this->event_model->get_events($config["per_page"], $offset);
		$this->load->view('templates/header');
		$this->load->view('events/list', $data);
		$this->load->view('templates/footer');
	}


	public function delete($id)
	{

		$this->event_model->delete_event($id);

		// Set message
		$this->session->set_flashdata('post_deleted', 'Your event has been deleted');

		redirect('events/list');
	}
}
