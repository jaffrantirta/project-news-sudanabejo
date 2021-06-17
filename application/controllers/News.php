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
	public function read_news($id){
		return $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 AND news_complate_data.id = '".$id."'")->result();
	}
	public function index(){
		$data['header'] = 'Sudana Bejo | Beranda';
        $data['headline'] = $this->api_model->custom_query("SELECT headline.* , news_photos.name as photo_name, news_categories.name as category_name FROM `headline` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `headline`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `headline`.`category_id` WHERE is_delete = 0 AND headline.is_active = true ORDER BY headline.created_at DESC LIMIT 1")->result();
        $data['latest_news'] = $this->latest_news('LIMIT 3');
        $data['popular'] = $this->popular('LIMIT 3');
        $data['recommendation'] = $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0  LIMIT 9")->result();  
        $data['our_choice'] = $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 LIMIT 11")->result();
        $data['header_categories'] = $this->header_categories('LIMIT 6');
        $data['all_categories'] = $this->api_model->custom_query("SELECT * FROM `news_categories` WHERE is_active = true")->result();
        $this->load->view('News/Template/header', $data);
		$this->load->view('News/index', $data);
		$this->load->view('News/Template/footer', $data);
	}
	public function categories($cat){
		$data['header'] = 'Sudana Bejo | Berita kategori '.$cat;
		$data['category'] = $cat;
		$data['latest_news'] = $this->latest_news('LIMIT 3');
        $data['popular'] = $this->popular('LIMIT 3');
		$data['header_categories'] = $this->header_categories('LIMIT 6');
		$data['news_by_categories'] = $this->news_by_categories($cat, '');
		$this->load->view('News/Template/header', $data);
		$this->load->view('News/by_categories', $data);
		$this->load->view('News/Template/footer', $data);
		// echo json_encode($data);
	}
	public function consumer($x, $y){
		$title = str_replace("-", " ", $this->uri->segment(3));
		$id = base64_decode($this->uri->segment(4));
		$data['header'] = 'Sudana Bejo | Berita - '.$title;
		$data['latest_news'] = $this->latest_news('LIMIT 3');
        $data['popular'] = $this->popular('LIMIT 3');
		$data['header_categories'] = $this->header_categories('LIMIT 6');
		$news = $this->read_news($id);
		$data['news'] = $news[0];
		// $json1 = json_encode($data['news']->content);
		// $json2 = str_replace("\r\n\r", "<br><br>", $json1);
		// $data['content'] = str_replace("\r\n", "<br>", $json2);
		$this->load->view('News/Template/header', $data);
		$this->load->view('News/news_reader', $data);
		$this->load->view('News/Template/footer', $data);
		// echo json_encode($data['news']->content);
		// print_r($content);
	}
}