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
        $data['headline'] = $this->api_model->custom_query("SELECT headline.* , news_photos.name as photo_name, news_categories.name as category_name FROM `headline` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `headline`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `headline`.`category_id` WHERE is_delete = 0 AND headline.is_active = true ORDER BY headline.created_at DESC LIMIT 1")->result();
        $data['latest_news'] = $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 ORDER BY news_complate_data.created_at DESC LIMIT 3")->result();
        $data['popular'] = $this->api_model->custom_query("SELECT popular_news.* , news_photos.name as photo_name, news_categories.name as category_name FROM `popular_news` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `popular_news`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `popular_news`.`category_id` WHERE is_delete = 0 AND popular_news.is_active = true AND news_categories.is_active = 1 LIMIT 3")->result();
        $data['recommendation'] = $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0  LIMIT 9")->result();  
        $data['our_choice'] = $this->api_model->custom_query("SELECT news_complate_data.* , news_photos.name as photo_name, news_categories.name as category_name FROM `news_complate_data` INNER JOIN `news_photos` ON `news_photos`.`news_id` = `news_complate_data`.`id` INNER JOIN `news_categories` ON `news_categories`.`id` = `news_complate_data`.`category_id` WHERE is_delete = 0 LIMIT 11")->result();
        $data['header_categories'] = $this->api_model->custom_query("SELECT * FROM `news_categories` WHERE is_active = true LIMIT 6")->result();
        $data['all_categories'] = $this->api_model->custom_query("SELECT * FROM `news_categories` WHERE is_active = true")->result();
        // echo json_encode($data);
        // print_r($data);
        $this->load->view('News/index', $data);
	}
}