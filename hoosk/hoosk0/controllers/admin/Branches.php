<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branches extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		define("HOOSK_ADMIN",1);
		$this->load->model('Hoosk_model');
		$this->load->model('Hoosk_property_model');
		$this->load->helper(array('admincontrol', 'url', 'file', 'hoosk_admin'));
		$this->load->library('session');
		define ('LANG', $this->Hoosk_model->getLang());
		$this->lang->load('admin', LANG);
		//Define what page we are on for nav
		$this->data['current'] = $this->uri->segment(2);
		define ('SITE_NAME', $this->Hoosk_model->getSiteName());
		define('THEME', $this->Hoosk_model->getTheme());
		define ('THEME_FOLDER', BASE_URL.'/theme/'.THEME);
	}

	public function index()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		$this->load->library('pagination');
    $result_per_page =15;  // the number of result per page
    $config['base_url'] = BASE_URL. '/admin/branches/';
    $config['total_rows'] = $this->Hoosk_property_model->countBranches();
		$config['uri_segment'] = 3;
    $config['per_page'] = $result_per_page;
		$config['full_tag_open'] = '<div class="form-actions">';
		$config['full_tag_close'] = '</div>';
    $this->pagination->initialize($config);
		//Get properties from database
		$this->data['branches'] = $this->Hoosk_property_model->getBranches($result_per_page, $this->uri->segment(3));
		//Load the view
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/branches', $this->data);
	}

	public function addBranch($n=0)
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		//Load the form helper
		$this->load->helper('form');
		//Load the view
		$this->data['error'] = $n;
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/branch_new', $this->data);
	}

	public function confirm()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		//Load the form validation library
		$this->load->library('form_validation');
		//Set validation rules
		$this->form_validation->set_rules('branchName', 'Branch Name', 'trim|required');
		$this->form_validation->set_rules('branchURL', 'Branch URL', 'trim|alpha_dash|required|is_unique[hoosk_branches.branchURL]');

		if($this->form_validation->run() == FALSE) {
			//Validation failed
			$this->addBranch(1);
		}  else  {
			//Validation passed
			//Add the property
			$this->Hoosk_property_model->createBranch();
			//Return to properties list
			redirect('/admin/branches', 'refresh');
	  	}
	}

	public function editBranch($n=0)
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		//Load the form helper
		$this->load->helper('form');
		//Get properties details from database
		$this->data['branch'] = $this->Hoosk_property_model->getBranch($this->uri->segment(4));
		//Load the view
		$this->data['error'] = $n;
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/branch_edit', $this->data);
	}

	public function edited()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		//Load the form validation library
		$this->load->library('form_validation');
		//Set validation rules
		$this->form_validation->set_rules('branchName', 'Branch Name', 'trim|required');
		$this->form_validation->set_rules('branchURL', 'Branch URL', 'trim|alpha_dash|required|is_unique[hoosk_branches.branchURL.branchID.'.$this->uri->segment(4).']');


		if($this->form_validation->run() == FALSE) {
			//Validation failed
			$this->editBranch(1);
		}  else  {
			//Validation passed
			//Update the properties
			$this->Hoosk_property_model->updateBranch($this->uri->segment(4));
			//Return to properties list
			redirect('/admin/branches', 'refresh');
	  	}
	}




	function delete()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		if($this->input->post('deleteid')):
			$this->Hoosk_property_model->removeBranch($this->input->post('deleteid'));
			redirect('/admin/branches');
		else:
			$this->data['form']=$this->Hoosk_property_model->getBranch($this->uri->segment(4));
			$this->load->view('admin/branch_delete.php', $this->data );
		endif;
	}

}
