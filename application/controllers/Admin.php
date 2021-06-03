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
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/template/footer', $data);
		}
	}
	public function login(){
		$this->load->view('admin/login');
	}
	public function show_session(){
		$session = $this->session->all_userdata();
    	echo json_encode($session);
	}
	public function regencies(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Kabupaten';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/regencies', $data);
			$this->load->view('admin/template/footer', $data);
		}
	}
	public function districts(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Kecamatan';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/districts', $data);
			$this->load->view('admin/template/footer', $data);
		}
	}
	public function sub_districts(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Kelurahan';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/sub_districts', $data);
			$this->load->view('admin/template/footer', $data);
		}
	}
}
