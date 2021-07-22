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
		$this->load->helper('url', 'form');
		$this->load->library("pagination");
	}
	public function index()
	{
		// Pagination Config	
		$config['base_url'] = base_url() . 'request/index/';
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-link');

		$data = [];

		$this->load->view('templates/header');
		$this->load->view('packages/index', $data);
		$this->load->view('templates/footer');
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
		$config = Events::get_pagination_config();
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



	public function submit_to_admin()
	{
		$data['form'] = $this->request_model->get_admin_forms_by_id($this->uri->segment('3'));
		$data['title'] = 'Submit Request for ' . $data['form'][0]['form_title'] . ' form';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('packages/submit_to_admin', $data);
			$this->load->view('templates/footer');
		} else {
			$this->request_model->submit_to_admin();
			// Set message
			redirect('/request/submit/' . $this->input->post('reqID'));
		}
	}

	public function delete($id)
	{

		$this->event_model->delete_event($id);

		// Set message
		$this->session->set_flashdata('post_deleted', 'Your event has been deleted');

		redirect('events/list');
	}


	public static function get_pagination_config()
	{
		$config = array();
		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul> </nav>';
		$config["per_page"] = 20;
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['first_url'] = '?page=1';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');

		return $config;
	}
}
