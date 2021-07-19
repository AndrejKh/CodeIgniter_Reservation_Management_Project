<?php
class Reservations extends CI_Controller
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

	public function view($slug = NULL)
	{
		$data['package'] = $this->request_model->get_package_by_id($slug)[0];
		$data['package']['history'] = $this->request_model->get_history($slug);



		$this->load->view('templates/header');
		$this->load->view('packages/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = 'Submit Request';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('req-text', 'Req text', 'required');
		$this->form_validation->set_rules('referer', 'Referer', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('packages/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->request_model->create_request();
			// Set message
			header("Refresh:0");
		}
	}


	public function create_by_admin()
	{
		$data['title'] = 'Submit Request';
		$this->form_validation->set_rules('urls', 'Urls', 'required');
		$this->form_validation->set_rules('referer', 'Referer', 'required');
		$this->form_validation->set_rules('form-title', 'Form title', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('packages/create_by_admin', $data);
			$this->load->view('templates/footer');
		} else {
			$this->request_model->create_request_by_admin();
			// Set message
			header("Refresh:0");
		}
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

		$this->request_model->delete_requests($id);

		// Set message
		$this->session->set_flashdata('post_deleted', 'Your request has been deleted');

		redirect('request/list');
	}

	public function delete_user_request($id)
	{

		$this->request_model->delete_user_requests($id);

		// Set message
		$this->session->set_flashdata('post_deleted', 'Your request has been deleted');

		redirect('request/list-submited/' . $this->input->post('form_id'));
	}


	public function get($id)
	{

		$data['reservation']	= $this->reservation_model->get_reservation($id);

		$this->load->view('templates/header');
		$this->load->view('reservation/index', $data);
		$this->load->view('templates/footer');
	}




	public function delete_admin_forms($id)
	{

		$this->request_model->delete_admin_forms($id);

		// Set message
		$this->session->set_flashdata('post_deleted', 'Your form has been deleted');

		redirect('request/list-admin');
	}


	public function list()
	{
		$config = Reservations::get_pagination_config();
		$config["base_url"] = base_url() . "request/list";
		$config["total_rows"] = $this->request_model->get_count_active_grouped()['req_nr'];
		$this->pagination->initialize($config);
		$offset = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['requestsList'] = $this->request_model->get_active_requests($config["per_page"], $offset);
		$this->load->view('templates/header');
		$this->load->view('packages/list', $data);
		$this->load->view('templates/footer');
	}

	public function admin_forms_list()
	{
		$config = Reservations::get_pagination_config();
		$config["base_url"] = base_url() . "request/list-admin";
		$config["total_rows"] = $this->request_model->count_admin_forms()['COUNT(*)'];
		$this->pagination->initialize($config);
		$offset = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['formsList'] = $this->request_model->get_admin_forms($config["per_page"], $offset, 1);
		$this->load->view('templates/header');
		$this->load->view('packages/admin_forms_list', $data);
		$this->load->view('templates/footer');
	}

	public function user_submited_list($form_id)
	{
		$config = Reservations::get_pagination_config();
		$config["base_url"] = base_url() . "request/list-submited/" . $form_id;
		$config["total_rows"] = $this->request_model->count_user_requests($form_id)['req_nr'];
		$this->pagination->initialize($config);
		$offset = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['requestsList'] = $this->request_model->get_user_requests($form_id, $config["per_page"], $offset);
		$this->load->view('templates/header');
		$this->load->view('packages/user_request_list', $data);
		$this->load->view('templates/footer');
	}

	public function list_completed()
	{
		$config = Reservations::get_pagination_config();
		$config["base_url"] = base_url() . "request/completed";
		$config["total_rows"] = $this->request_model->get_request_count(1)['COUNT(*)'];
		$this->pagination->initialize($config);
		$offset = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['requestsList'] = $this->request_model->get_completed_requests($config["per_page"], $offset);
		$this->load->view('templates/header');
		$this->load->view('packages/list', $data);
		$this->load->view('templates/footer');
	}

	public function list_by_ip($ip)
	{

		$config = Reservations::get_pagination_config();
		$config["total_rows"] = $this->request_model->get_count_by_ip($ip)['COUNT(*)'];
		$this->pagination->initialize($config);
		$offset = ($this->input->get('page')) ? (($this->input->get('page') - 1) * $config["per_page"]) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['requestsList'] = $this->request_model->get_requests_by_ip($ip, $config["per_page"], $offset);
		$this->load->view('templates/header');
		$this->load->view('packages/list', $data);
		$this->load->view('templates/footer');
	}

	public function edit($slug)
	{


		if (empty($this->request_model->get_request_by_id($slug))) {
			show_404();
		} else {
			$data['request'] = $this->request_model->get_request_by_id($slug)[0];
		}

		$data['title'] = 'Edit Request';

		$this->load->view('templates/header');
		$this->load->view('packages/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{

		$this->request_model->update_request();

		// Set message
		$this->session->set_flashdata('post_updated', 'Your request has been updated');

		redirect('request/list');
	}

	public function	request_submited()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('req-text', 'Req text', 'required');
		$this->form_validation->set_rules('referer', 'Referer', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('bad_request', 'Your request was not correct plese try again!');
			redirect('request/create');
		} else {
			$this->request_model->create_request();
			// Set message
			$data['message']['status'] = 'success';
			$data['message']['title'] = 'Request submited successfully!';
			$data['message']['main'] = 'You will recieve an email very soon with the requested info!';
			$data['message']['footer'] = '(Please also check spam folder on your email!)';
		}

		$this->load->view('templates/header');
		$this->load->view('packages/submit_confirm', $data);
		$this->load->view('templates/footer');
	}

	public function send_free_user_email()
	{

		$this->request_model->send_free_users_email();

		// Set message
		$this->session->set_flashdata('email_sent', 'Your email has been sent');

		redirect('request/list-ip/' . $this->input->post('ip'));
	}

	public function send_free_user_email_admin()
	{

		$this->request_model->send_free_users_email();

		// Set message
		$this->session->set_flashdata('email_sent', 'Your email has been sent');

		redirect('request/list-submited/' . $this->input->post('id'));
	}

	public function send_wrong_username_email_admin()
	{

		$this->request_model->send_wrong_username_email();

		// Set message
		$this->session->set_flashdata('email_sent', 'Your email has been sent');

		redirect('request/list-submited/' . $this->input->post('formID'));
	}


	public function send_admin_to_user_email()
	{

		$this->request_model->send_admin_to_user_email();

		// Set message
		$this->session->set_flashdata('email_sent', 'Your email has been sent');

		redirect('request/list-submited/' . $this->input->post('form_id'));
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
