<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin_model');
		$this->load->model('api_model');
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

	public function headline_news(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Berita Headline';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/headline', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}

	public function create_news(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data = array(
				'is_active' => true,
			);
			$table = 'news_categories';
			$data['data'] = $this->api_model->get_data_by_where($table, $data)->result();
			$data['page'] = 'Buat Berita';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/add_news', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}
	public function message(){
		if(!$this->session->userdata('authenticated_admin')){
			$this->login();
		}else{
			$data['page'] = 'Buat Berita';
			$data['session'] = $this->session->all_userdata();
			$this->load->view('Admin/Template/header', $data);
			$this->load->view('Admin/message', $data);
			$this->load->view('Admin/Template/footer', $data);
		}
	}
	public function create_news_process(){
		$file = $_FILES['file']['name'];
		$remove_char = preg_replace("/[^a-zA-Z]/", "", $file);
		$filename = time().$remove_char.'.jpg';
		$location = "assets/images/news/".$filename;
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$category = $this->input->post('category');
		$photo_name = $filename;
		$table = 'news';
		$data = array(
		  'title'=>$title,
		  'content'=>$content,
		  'category_id'=>$category
		);
		if($this->api_model->insert_data($table, $data)){
		  $table2 = 'news_photos';
		  $data2 = array(
			'name'=>$filename,
			'news_id'=>$this->db->insert_id()
		  );
		  if($this->api_model->insert_data($table2, $data2)){
			if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
			  $this->session->set_flashdata('msg_upload', 'Upload Sukses');
			  $this->message();
			}else{
			  $this->session->set_flashdata('msg_upload', 'Gagal Upload');
			  $this->message();
			}
		  }else{
			$this->session->set_flashdata('msg_upload', 'Gagal Input Gambar');
			$this->message();
		  }
		}else{
		  $this->session->set_flashdata('msg_upload', 'Gagal Input Berita');
		  $this->message();
		}
	}
}
