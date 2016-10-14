<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Properties extends CI_Controller {

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
		define('RIGHTMOVE_STATUS', $this->Hoosk_model->checkRightmoveStatus());
		define('RIGHTMOVE_LIVE', $this->Hoosk_model->checkRightmoveLive());
		define('NETWORK_ID', $this->Hoosk_model->getNetworkID());
		define('PEMKEY', $this->Hoosk_model->getPEMKEY());
		define('PEMFILE', $this->Hoosk_model->getPEMFile());
		define ('THEME_FOLDER', BASE_URL.'/theme/'.THEME);

		if(RIGHTMOVE_LIVE){
			define('sendpropertydetails', 'https://adfapi.rightmove.co.uk/v1/property/sendpropertydetails');
			define('removeproperty', 'https://adfapi.rightmove.co.uk/v1/property/removeproperty');
		} else {
			define('sendpropertydetails', 'https://adfapi.adftest.rightmove.com/v1/property/sendpropertydetails');
			define('removeproperty', 'https://adfapi.adftest.rightmove.com/v1/property/removeproperty');
		}
	}

	public function index()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		$this->load->library('pagination');
    $result_per_page =15;  // the number of result per page
    $config['base_url'] = BASE_URL. '/admin/properties/';
    $config['total_rows'] = $this->Hoosk_property_model->countProperties();
		$config['uri_segment'] = 3;
    $config['per_page'] = $result_per_page;
		$config['full_tag_open'] = '<div class="form-actions">';
		$config['full_tag_close'] = '</div>';
    $this->pagination->initialize($config);
		//Get properties from database
		$this->data['properties'] = $this->Hoosk_property_model->getProperties($result_per_page, $this->uri->segment(3));
		//Load the view
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/properties', $this->data);
	}

	public function addProperty($n=0)
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		//Load the form helper
		$this->load->helper('form');
		//Load the view
		$this->data['error'] = $n;
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/property_new', $this->data);
	}

	public function confirm()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		//Load the form validation library
		$this->load->library('form_validation');
		//Set validation rules
		$this->form_validation->set_rules('agent_ref', 'Agent Ref', 'trim|alpha_numeric|required|is_unique[hoosk_property.agent_ref]');
		$this->form_validation->set_rules('branch_id', 'Branch', 'trim|required');
		$this->form_validation->set_rules('published', 'Published', 'trim|required');
		$this->form_validation->set_rules('property_type', 'Property Type', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('house_name_number', 'First line of the address', 'trim|required');
		$this->form_validation->set_rules('town', 'Town', 'trim|required');
		$this->form_validation->set_rules('postcode_1', 'Post Code First Half', 'trim|required');
		$this->form_validation->set_rules('postcode_2', 'Post Code Second Half', 'trim|required');
		$this->form_validation->set_rules('display_address', 'Display Address', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|numeric|required');
		$this->form_validation->set_rules('summary', 'Summary', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('bedrooms', 'Bedrooms', 'trim|required');
		$this->form_validation->set_rules('principal_email_address', 'Agent Email Address', 'trim|required');
		$this->form_validation->set_rules('deposit', 'Deposit', 'trim|numeric');
		if($this->form_validation->run() == FALSE) {
			//Validation failed
			$this->addProperty(1);
		}  else  {
			//Validation passed
			//Add the property
			$config['upload_path']          = './brochures/';
			$config['allowed_types']        = 'pdf';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('propertyPDF'))
			{
				$this->Hoosk_property_model->createProperty();
			}
			else
			{
				$this->Hoosk_property_model->createProperty("/brochure/".$this->upload->data('file_name'));
			}

			if(($_POST['rightmoveStatus']==1)&&(RIGHTMOVE_STATUS)){
				$this->load->library('Guzzle');
				$propertyArray = getPropertyDetails($this->input->post('agent_ref'));
				$client     = new GuzzleHttp\Client();
				$url        = sendpropertydetails;
				try {
					$response = $client->request( 'POST',
												   $url,
												  [ 'headers'  => ['content-type' => 'application/json', 'Accept' => 'application/json'],
													'json'	=> $propertyArray ,
													'cert' => [FCPATH.'/pemkey/'.PEMFILE, PEMKEY
													]
												  ]
												);

					$result = json_decode($response->getBody(), true);
					$this->Hoosk_property_model->storeResponse($response->getStatusCode(),$response->getReasonPhrase(),$response->getProtocolVersion(),$result);
					if($result['success']){
						$this->Hoosk_property_model->rightmoveSuccess($result);
					}
				} catch (GuzzleHttp\Exception\BadResponseException $e) {
					#guzzle repose for future use
					$response = $e->getResponse();
					$responseBodyAsString = $response->getBody()->getContents();
					print_r($responseBodyAsString);
				}
			}
			//Return to properties list
			redirect('/admin/properties', 'refresh');
	  	}
	}

	public function editProperty($n=0)
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		//Load the form helper
		$this->load->helper('form');
		//Get properties details from database
		$this->data['property'] = $this->Hoosk_property_model->getProperty($this->uri->segment(4));
		$this->data['images'] = $this->Hoosk_property_model->getPropertyImages($this->uri->segment(4));
		//Load the view
		$this->data['error'] = $n;
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/property_edit', $this->data);
	}

	public function edited()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		//Load the form validation library
		$this->load->library('form_validation');
		//Set validation rules
		$this->form_validation->set_rules('published', 'Published', 'trim|required');
		$this->form_validation->set_rules('property_type', 'Property Type', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('house_name_number', 'First line of the address', 'trim|required');
		$this->form_validation->set_rules('town', 'Town', 'trim|required');
		$this->form_validation->set_rules('postcode_1', 'Post Code First Half', 'trim|required');
		$this->form_validation->set_rules('postcode_2', 'Post Code Second Half', 'trim|required');
		$this->form_validation->set_rules('display_address', 'Display Address', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|numeric|required');
		$this->form_validation->set_rules('summary', 'Summary', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('bedrooms', 'Bedrooms', 'trim|required');
		$this->form_validation->set_rules('principal_email_address', 'Agent Email Address', 'trim|required');
		$this->form_validation->set_rules('deposit', 'Deposit', 'trim|numeric');

		if($this->form_validation->run() == FALSE) {
			//Validation failed
			$this->editProperty(1);
		}  else  {
			//Validation passed
			//Update the properties
			$config['upload_path']          = './brochures/';
			$config['allowed_types']        = 'pdf';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('propertyPDF'))
			{
				$this->Hoosk_property_model->updateProperty($this->uri->segment(4));
			}
			else
			{
				$this->Hoosk_property_model->updateProperty($this->uri->segment(4),"/brochure/".$this->upload->data('file_name'));
			}
			if(($_POST['rightmoveStatus']==1)&&(RIGHTMOVE_STATUS)){
				$this->load->library('Guzzle');
				$propertyArray = getPropertyDetails($this->uri->segment(4));
				$client     = new GuzzleHttp\Client();
				$url        = sendpropertydetails;
				try {
					$response = $client->request( 'POST',
												   $url,
												  [ 'headers'  => ['content-type' => 'application/json', 'Accept' => 'application/json'],
													'json'	=> $propertyArray ,
													'cert' => [FCPATH.'/pemkey/'.PEMFILE, PEMKEY
													]
												  ]
												);

					$result = json_decode($response->getBody(), true);
					$this->Hoosk_property_model->storeResponse($response->getStatusCode(),$response->getReasonPhrase(),$response->getProtocolVersion(),$result);
					if($result['success']){
						$this->Hoosk_property_model->rightmoveSuccess($result);
					}
				} catch (GuzzleHttp\Exception\BadResponseException $e) {
					#guzzle repose for future use
					$response = $e->getResponse();
					$responseBodyAsString = $response->getBody()->getContents();
					print_r($responseBodyAsString);
				}
			}
			//Return to properties list
			redirect('/admin/properties', 'refresh');
	  	}
	}

	function refcheck(){
		$ref = $this->uri->segment(4);
		checkAgentRef($ref);
	}


	function delete()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		if($this->input->post('deleteid')):
			$ref = $this->input->post('deleteid');
			if(RIGHTMOVE_STATUS){
					$this->load->library('guzzle');
					$propertyArray = getPropertyDetailsRemove($ref);
					$client     = new GuzzleHttp\Client();
					$url        = removeproperty;
					try {
					$response = $client->request( 'POST',
												   $url,
												  [ 'headers'  => ['content-type' => 'application/json', 'Accept' => 'application/json'],
													'json'	=> $propertyArray,
													'cert' => [FCPATH.'/pemkey/'.PEMFILE, PEMKEY
													]
												  ]
												);
					#guzzle repose for future use
					$result = json_decode($response->getBody(), true);
					$this->Hoosk_property_model->storeResponse($response->getStatusCode(),$response->getReasonPhrase(),$response->getProtocolVersion(),$result);
					if($result['success']){
						$this->Hoosk_property_model->rightmoveSuccess($result);
						$this->Hoosk_property_model->removeProperty($this->input->post('deleteid'));
					}
				} catch (GuzzleHttp\Exception\BadResponseException $e) {
					#guzzle repose for future use
					$response = $e->getResponse();
					$responseBodyAsString = $response->getBody()->getContents();
					print_r($responseBodyAsString);
				}
			} else {
				$this->Hoosk_property_model->removeProperty($this->input->post('deleteid'));
			}
			redirect('/admin/properties');
		else:
			$this->data['form']=$this->Hoosk_property_model->getProperty($this->uri->segment(4));
			$this->load->view('admin/property_delete.php', $this->data );
		endif;
	}


	public function log()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		$this->load->library('pagination');
    $result_per_page =15;  // the number of result per page
    $config['base_url'] = BASE_URL. '/admin/properties/log';
    $config['total_rows'] = $this->Hoosk_property_model->countLog();
		$config['uri_segment'] = 4;
    $config['per_page'] = $result_per_page;
		$config['full_tag_open'] = '<div class="form-actions">';
		$config['full_tag_close'] = '</div>';
    $this->pagination->initialize($config);
		//Get properties from database
		$this->data['log'] = $this->Hoosk_property_model->getLog($result_per_page, $this->uri->segment(4));
		//Load the view
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/rightmove_log', $this->data);
	}

	public function upload()
	{
		Admincontrol_helper::is_logged_in($this->session->userdata('userName'));
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->load->library('upload', $config);
		foreach ($_FILES as $key => $value) {
			if ( ! $this->upload->do_upload($key))
			{
					$error = array('error' => $this->upload->display_errors());
					echo 0;
			}
			else
			{
					echo '"/uploads/'.$this->upload->data('file_name').'"';
			}
		}
	}
}
