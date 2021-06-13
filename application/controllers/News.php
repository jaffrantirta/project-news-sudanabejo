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
	public function index(){
        $data['headline'] = $this->api_model->custom_query("SELECT headline.* , news_photos.name as photo_name, news_categories.name as category_name FROM `headline` LEFT JOIN `news_photos` ON `news_photos`.`news_id` = `headline`.`id` LEFT JOIN `news_categories` ON `news_categories`.`id` = `headline`.`category_id` WHERE is_delete = false ORDER BY headline.created_at DESC LIMIT 1")->result();
        $data['latest_news'] = $this->api_model->custom_query("SELECT news.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news` LEFT JOIN `news_photos` ON `news_photos`.`news_id` = `news`.`id` LEFT JOIN `news_categories` ON `news_categories`.`id` = `news`.`category_id` WHERE is_delete = false ORDER BY news.created_at DESC LIMIT 3")->result();
        $data['popular'] = $this->api_model->custom_query("SELECT popular_news.* , news_photos.name as photo_name, news_categories.name as category_name FROM `popular_news` LEFT JOIN `news_photos` ON `news_photos`.`news_id` = `popular_news`.`id` LEFT JOIN `news_categories` ON `news_categories`.`id` = `popular_news`.`category_id` WHERE is_delete = false AND popular_news.is_active = true LIMIT 3")->result();
        $data['recommendation'] = $this->api_model->custom_query("SELECT news.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news` LEFT JOIN `news_photos` ON `news_photos`.`news_id` = `news`.`id` LEFT JOIN `news_categories` ON `news_categories`.`id` = `news`.`category_id` WHERE is_delete = false  LIMIT 9")->result();  
        $data['our_choice'] = $this->api_model->custom_query("SELECT news.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news` LEFT JOIN `news_photos` ON `news_photos`.`news_id` = `news`.`id` LEFT JOIN `news_categories` ON `news_categories`.`id` = `news`.`category_id` WHERE is_delete = false LIMIT 11")->result();
        $data['header_categories'] = $this->api_model->custom_query("SELECT * FROM `news_categories` LIMIT 6")->result();
        $data['all_categories'] = $this->api_model->custom_query("SELECT * FROM `news_categories`")->result();
        // echo json_encode($data);
        // print_r($data);
        $this->load->view('News/index', $data);
	}
}