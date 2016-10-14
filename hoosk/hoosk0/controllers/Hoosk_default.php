<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoosk_default extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Hoosk_page_model');
		$this->load->library('session');
		$this->load->helper(array('hoosk_page_helper','form','url'));
		define ('SITE_NAME', $this->Hoosk_page_model->getSiteName());
		define ('THEME', $this->Hoosk_page_model->getTheme());
		define ('THEME_FOLDER', BASE_URL.'/theme/'.THEME);
		$this->data['settings']=$this->Hoosk_page_model->getSettings();
	}


	public function index()
	{
		$totSegments = $this->uri->total_segments();
		if(!is_numeric($this->uri->segment($totSegments))){
		$pageURL = $this->uri->segment($totSegments);
		} else if(is_numeric($this->uri->segment($totSegments))){
		$pageURL = $this->uri->segment($totSegments-1);
		}
		if ($pageURL == ""){ $pageURL = "home"; }
		$this->data['page']=$this->Hoosk_page_model->getPage($pageURL);
		if ($this->data['page']['pageTemplate'] != ""){
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/'.$this->data['page']['pageTemplate'], $this->data);
		} else {
			$this->error();
		}
	}

		public function category()
	{
		$catSlug = $this->uri->segment(2);
		$this->data['page']=$this->Hoosk_page_model->getCategory($catSlug);
		if ($this->data['page']['categoryID'] != ""){
		$this->data['page']['pageTemplate']="category";
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/'.$this->data['page']['pageTemplate'], $this->data);
		} else {
			$this->error();
		}
	}

		public function article()
	{
		$articleURL = $this->uri->segment(2);
		$this->data['page']=$this->Hoosk_page_model->getArticle($articleURL);
		if ($this->data['page']['postID'] != ""){
		$this->data['page']['pageTemplate']="article";
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/'.$this->data['page']['pageTemplate'], $this->data);
		} else {
			$this->error();
		}
	}

	public function error()
	{
		$this->data['page']['pageTitle']="Oops, Error";
		$this->data['page']['pageDescription']="Oops, Error";
		$this->data['page']['pageKeywords']="Oops, Error";
		$this->data['page']['pageID']="0";
		$this->data['page']['pageTemplate']="error";
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/'.$this->data['page']['pageTemplate'], $this->data);
	}

	public function submitSearch()
	{
		$data = array(
      'searchArea'  => $this->input->post('searchArea'),
      'searchBedrooms'     => $this->input->post('searchBedrooms'),
      'searchType' => $this->input->post('searchType')
		);
		if($_POST['searchType']==1){
			$data['searchMinPrice'] = $this->input->post('searchMinPriceSales');
			$data['searchMaxPrice'] = $this->input->post('searchMaxPriceSales');
		} else {
			$data['searchMinPrice'] = $this->input->post('searchMinPriceLet');
			$data['searchMaxPrice'] = $this->input->post('searchMaxPriceLet');
		}
		$this->session->set_userdata($data);
		redirect('/search/results/0');
	}

	public function searchResults()
	{
		$this->data['page']['pageTitle']="Search Results";
		$this->data['page']['pageDescription']="Search Results";
		$this->data['page']['pageKeywords']="Search Results";
		$this->data['page']['pageID']="0";
		$this->data['page']['pageTemplate']="search";
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/'.$this->data['page']['pageTemplate'], $this->data);
	}

	public function propertyDetails(){
		$this->data['property'] = getPropertyDetails($this->uri->segment(2));
		$this->data['page']['pageTitle']=$this->data['property'][0]['display_address'];
		$this->data['page']['pageDescription']=strip_tags(htmlspecialchars(wordlimit($this->data['property'][0]['summary'],'40'),ENT_QUOTES));
		$this->data['page']['pageKeywords']="Property Description";
		$this->data['page']['pageID']="0";
		$this->data['page']['pageTemplate']="property-details";
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/'.$this->data['page']['pageTemplate'], $this->data);
	}
}
