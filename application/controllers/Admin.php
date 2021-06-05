<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin_model');
		$this->load->library('Ssp');
		$this->load->library('mailer');
		$this->load->library('pdf');
		$this->load->library('pdf2');
	}
	public function index(){
        if($this->session->userdata('authenticated_admin')){
			$this->dashboard();
		}else{
			$this->login();
		}
	}
	public function dashboard(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Dashboard';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/dashboard', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}
	public function login(){
		$this->load->view('Admin/login');
	}
	public function show_session(){
		$session = $this->session->all_userdata();
    	echo json_encode($session);
	}

	//-----------------------------------------------------------------------------DAERAH

	public function regencies(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Kabupaten';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/regencies', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}
	public function districts(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Kecamatan';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/districts', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}
	public function sub_districts(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Kelurahan';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/sub_districts', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}

	//---------------------------------------------------------------- NEWS

	public function news_categories(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Kategori Berita';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/news_categories', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}

	public function news(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Berita';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/list_news', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}

	public function popular_news(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Berita Populer';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/populars', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}
}
