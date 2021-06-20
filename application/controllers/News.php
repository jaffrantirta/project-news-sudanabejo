<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class News extends CI_Controller {
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
	public function latest_news($limit){
		return $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 ORDER BY news_complate_data.created_at DESC ".$limit)->result();
	}
	public function popular($limit){
		return $this->api_model->custom_query("SELECT popular_news.* , news_photos.name as photo_name, news_categories.name as category_name FROM `popular_news` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `popular_news`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `popular_news`.`category_id` WHERE is_delete = 0 AND popular_news.is_active = true AND news_categories.is_active = 1 ".$limit)->result();
	}
	public function header_categories($limit){
		return $this->api_model->custom_query("SELECT * FROM `news_categories` WHERE is_active = true ".$limit)->result();
	}
	public function news_by_categories($cat, $limit){
		return $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 AND news_categories.name = '".$cat."' ORDER BY news_complate_data.created_at DESC ".$limit)->result();
	}
	public function news_by_search($kayword, $limit){
		return $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 AND news_complate_data.content LIKE '%".$kayword."%' OR news_complate_data.title LIKE '%".$kayword."%' OR news_complate_data.category_name LIKE '%".$kayword."%' ORDER BY news_complate_data.created_at DESC ".$limit)->result();
	}
	public function read_news($id){
		return $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 AND news_complate_data.id = '".$id."'")->result();
	}
	public function index(){
		if(!$this->session->userdata('authenticated_user')){
			$data['login']['status'] = false;
		}else{
			$data['login']['status'] = true;
			$data['login']['data'] = $this->session->all_userdata();
		}
		$data['header'] = 'Sudana Bejo | Beranda';
        $data['headline'] = $this->api_model->custom_query("SELECT headline.* , news_photos.name as photo_name, news_categories.name as category_name FROM `headline` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `headline`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `headline`.`category_id` WHERE is_delete = 0 AND headline.is_active = true ORDER BY headline.created_at DESC LIMIT 1")->result();
        $data['latest_news'] = $this->latest_news('LIMIT 3');
        $data['popular'] = $this->popular('LIMIT 3');
        $data['recommendation'] = $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0  LIMIT 9")->result();  
        $data['our_choice'] = $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 LIMIT 11")->result();
        $data['header_categories'] = $this->header_categories('LIMIT 5');
        $data['all_categories'] = $this->api_model->custom_query("SELECT * FROM `news_categories` WHERE is_active = true")->result();
        $this->load->view('News/Template/header', $data);
		$this->load->view('News/index', $data);
		$this->load->view('News/Template/footer', $data);
	}
	public function categories($cat){
		if(!$this->session->userdata('authenticated_user')){
			$data['login']['status'] = false;
		}else{
			$data['login']['status'] = true;
			$data['login']['data'] = $this->session->all_userdata();
		}
		$data['header'] = 'Sudana Bejo | Berita kategori '.$cat;
		$data['category'] = $cat;
		$data['latest_news'] = $this->latest_news('LIMIT 3');
        $data['popular'] = $this->popular('LIMIT 3');
		$data['header_categories'] = $this->header_categories('LIMIT 5');
		$data['news_by_categories'] = $this->news_by_categories($cat, '');
		$this->load->view('News/Template/header', $data);
		$this->load->view('News/by_categories', $data);
		$this->load->view('News/Template/footer', $data);
	}
	public function search($keyword){
		if(!$this->session->userdata('authenticated_user')){
			$data['login']['status'] = false;
		}else{
			$data['login']['status'] = true;
			$data['login']['data'] = $this->session->all_userdata();
		}
		$data['header'] = 'Sudana Bejo | Pencarian berdasarkan "'.$keyword.'"';
		$data['category'] = 'Hasil pencarian berdasarkan "'.$keyword.'"';
		$data['latest_news'] = $this->latest_news('LIMIT 3');
        $data['popular'] = $this->popular('LIMIT 3');
		$data['header_categories'] = $this->header_categories('LIMIT 5');
		$data['news_by_categories'] = $this->news_by_search($keyword, '');
		$this->load->view('News/Template/header', $data);
		$this->load->view('News/by_categories', $data);
		$this->load->view('News/Template/footer', $data);
	}
	public function register(){
		$data['occupations'] = $this->api_model->get_data_by_where('occupations', array('is_active'=>true))->result();
		$this->load->view('News/register', $data);
		// echo json_encode($data);
	}
	public function register_process(){
		$count = count($_FILES['file']['name']);
		for($i=0;$i<$count;$i++){
			$file = $_FILES['file']['name'][$i];
			$remove_char = preg_replace("/[^a-zA-Z]/", "", $file);
			$filename[$i] = time().'-user-'.$remove_char.'.jpg';
		}
		
		if($this->input->post('password') != $this->input->post('re-password')){
			$data = array(
				'status'=>false,
				'title'=>'Password konfirmasi tidak sesuai',
				'message'=>'Mohon masukan password yang sesuai',
				'button_text'=>'Kembali ke halaman registrasi',
				'link_redirect'=>base_url('news/register')
			);
			$this->load->view('Message/index', $data);
		}else{
			$data = array(
				'role_id' => '3',
				'name' => $this->input->post('name'),
				'nik' => $this->input->post('nik'),
				'sub_district_id' => $this->input->post('sub_district_id'),
				'community_unit' => $this->input->post('community_unit'),
				'email' => $this->input->post('email'),
				'date_of_birth' => $this->input->post('date_of_birth'),
				'sex' => $this->input->post('sex'),
				'occupation_id' => $this->input->post('occupation_id'),
				'profile_photo' => $filename[1],
				'ktp_photo' => $filename[0],
				'whatsapp_number' => $this->input->post('whatsapp_number'),
				'password' => md5($this->input->post('password'))
			);
		}
		if($this->api_model->insert_data('users', $data)){
			$data['user_auth'] = true;
			$data['id'] = $this->db->insert_id();
			$this->session->set_userdata($data);
			for( $i=0 ; $i < $count ; $i++ ) {
				$tmpFilePath = $_FILES['file']['tmp_name'][$i];
				if($tmpFilePath != ""){
					if($i == 1){
						$newFilePath = "assets/images/profile/".$filename[$i];
					}else{
						$newFilePath = "assets/images/ktp/".$filename[$i];
					}
				  if(move_uploaded_file($tmpFilePath, $newFilePath)){
					$data = array(
						'status'=>true,
						'title'=>'Registrasi berhasil',
						'message'=>'Selamat registrasi anda berhasil',
						'button_text'=>'Kembali ke beranda',
						'link_redirect'=>base_url('news')
					);
				  }
				}
			  }
			  $this->load->view('Message/index', $data);
		}else{
			$data = array(
				'status'=>false,
				'title'=>'Registrasi gagal',
				'message'=>'Kesalahan tidak diketahui',
				'button_text'=>'Kembali ke halaman registrasi',
				'link_redirect'=>base_url('news/register')
			);
			$this->load->view('Message/index', $data);
		}
	}
	public function test_view(){
		$data = array(
			'status'=>true,
			'title'=>'Password konfirmasi tidak sesuai',
			'message'=>'Mohon masukan password yang sesuai',
			'button_text'=>'Kembali ke halaman registrasi',
			'link_redirect'=>base_url('news/register')
		);
		$this->load->view('Message/index', $data);
	}
	public function consumer($x, $y){
		if(!$this->session->userdata('authenticated_user')){
			$data['login']['status'] = false;
		}else{
			$data['login']['status'] = true;
			$data['login']['data'] = $this->session->all_userdata();
		}
		$title = str_replace("-", " ", $this->uri->segment(3));
		$id = base64_decode($this->uri->segment(4));
		if($this->api_model->custom_query("UPDATE `news` SET `visit_sum` = news.visit_sum+1 WHERE `news`.`id` =".$id)){
			$data['header'] = 'Sudana Bejo | Berita - '.$title;
			$data['latest_news'] = $this->latest_news('LIMIT 3');
			$data['popular'] = $this->popular('LIMIT 3');
			$data['header_categories'] = $this->header_categories('LIMIT 5');
			$news = $this->read_news($id);
			$data['news'] = $news[0];
			$this->load->view('News/Template/header', $data);
			$this->load->view('News/news_reader', $data);
			$this->load->view('News/Template/footer', $data);
		}else{
			$data = array(
				'status'=>false,
				'title'=>'Oops! sepertinya ada kesalahan sistem',
				'message'=>'Mohon coba lagi!',
				'button_text'=>'Kembali ke beranda',
				'link_redirect'=>base_url()
			);
			$this->load->view('Message/index', $data);
		}
	}
	
}