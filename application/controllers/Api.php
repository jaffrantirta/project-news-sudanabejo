<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
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
		$this->load->view('admin/template/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/template/footer');
	}
	public function login(){
		$this->load->view('admin/login');
	}
    public function login_process(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result['data'] = $this->api_model->login($email, $password)->result();
        if(count($result['data']) > 0){
          $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'login berhasil', 'english'=>"you're logged"));
        }else{
          $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'login gagal', 'english'=>"logging failed"));
          $this->output->set_status_header(401);
        }
        echo json_encode($result);
    }

    // --------------------------------------------------- DYNAMIC FUNCTION -------------------------------
    public function insert_data($table, $data){
      $result['data'] = $this->api_model->insert_data($table, $data);
        if($result['data']){
            $result['status'] = 'success';
            $result['message']['indonesia'] = 'berhasil ditambahkan';
            $result['message']['english'] = 'successful added';
        }else{
            $result['status'] = 'failed';
            $result['message']['indonesia'] = 'gagal ditambahkan';
            $result['message']['english'] = 'failed to add';
            $this->output->set_status_header(501);
        }
        echo json_encode($result);
    }
    public function response($message){
      $result['status'] = $message['status'];
      $result['message']['indonesia'] = $message['indonesia'];
      $result['message']['english'] = $message['english'];
      return $result;
    }
    public function get_data($table){
      $data = array(
        'is_active' => true,
      );
      if(count($result['data'] = $this->api_model->get_data_by_where($table, $data)->result()) > 0){
        $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'data ditemukan', 'english'=>'data is founded'));
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'data tidak ditemukan', 'english'=>'data not found'));
        $this->output->set_status_header(404);
      }
      echo json_encode($result);
    }
  // --------------------------------------------------- DISTRICTS FUNCTION -------------------------------
    public function edit_districts_view($id){
      if(count($result['data']['regencies'] = $this->api_model->get_data_by_where("regencies", array('is_active'=>true))->result()) > 0){
        if(count($result['data']['districts'] = $this->api_model->get_data_by_where("districts", array('id'=>$id))->result()) > 0){
          $regency_selected = $result['data']['districts'][0]->regency_id;
          if(count($result['data']['districts']['regency'] = $this->api_model->get_data_by_where("regencies", array('id'=>$regency_selected))->result()) > 0){
            $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'mengambil data berhasil', 'english'=>'data is catched'));
          }else{
            $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'mengambil data gagal', 'english'=>"data doesn't catch"));
            $this->output->set_status_header(404);
          }
        }else{
          $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'mengambil data gagal', 'english'=>"data doesn't catch"));
          $this->output->set_status_header(404);
        }
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'mengambil data gagal', 'english'=>"data doesn't catch"));
        $this->output->set_status_header(404);
      }
      echo json_encode($result);
    }
    public function insert_districts(){
        $districts_name = $this->input->post('districts_name');
        $regency_id = $this->input->post('regency_id');
        $table = 'districts';
        $data = array(
          'name' => $districts_name,
          'regency_id' => $regency_id,
        );
        if($result['data'] = $this->api_model->insert_data($table, $data)){
          $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'tersimpan', 'english'=>'data is saved'));
        }else{
          $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'gagal menyimpan', 'english'=>'failed to save'));
          $this->output->set_status_header(501);
        }
        echo json_encode($result);
    }
    public function update_districts(){
      $districts_name = $this->input->post('districts_name');
      $regency_id = $this->input->post('regency_id');
      $id = $this->input->post('id');
      $table = 'districts';
      $data = array(
        'name' => $districts_name,
        'regency_id' => $regency_id,
      );
      $whare_clouse = array('id' => $id);
      if($result['data'] = $this->api_model->update_data($whare_clouse, $table, $data)){
        $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'data telah diubah', 'english'=>'data has been updated'));
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'data tidak berhasi diubah', 'english'=>"data doesn't update"));
        $this->output->set_status_header(501);
      }
      echo json_encode($result);
    }
    public function delete_districts(){
      $id = $this->input->post('id');
      $result['id'] = $id;
      $table = 'districts';
      $data = array(
        'is_active' => false
      );
      $whare_clouse = array('id' => $id);
      if($result['data'] = $this->api_model->update_data($whare_clouse, $table, $data)){
        $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'terhapus', 'english'=>'deleted'));
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'gagal menghapus', 'english'=>"failed to delete"));
        $this->output->set_status_header(501);
      }
      echo json_encode($result);
    }
  // -------------------------------------------------- SUB DISTRICTS FUNCTION -------------------------
  public function insert_sub_districts(){
    $sub_districts_name = $this->input->post('sub_districts_name');
    $districts_id = $this->input->post('districts_id');
    $table = 'sub_districts';
    $data = array(
      'name' => $sub_districts_name,
      'distric_id' => $districts_id,
    );
    if($result['data'] = $this->api_model->insert_data($table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'tersimpan', 'english'=>'data is saved'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'gagal menyimpan', 'english'=>'failed to save'));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }
  public function delete_sub_districts(){
    $id = $this->input->post('id');
    $result['id'] = $id;
    $table = 'sub_districts';
    $data = array(
      'is_active' => false
    );
    $whare_clouse = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($whare_clouse, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'terhapus', 'english'=>'deleted'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'gagal menghapus', 'english'=>"failed to delete"));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }
  public function update_sub_districts(){
    $sub_districts_name = $this->input->post('sub_districts_name');
    $distric_id = $this->input->post('distric_id');
    $id = $this->input->post('id');
    $table = 'sub_districts';
    $data = array(
      'name' => $sub_districts_name,
      'distric_id' => $distric_id,
    );
    $whare_clouse = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($whare_clouse, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'data telah diubah', 'english'=>'data has been updated'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'data tidak berhasi diubah', 'english'=>"data doesn't update"));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }
  public function edit_sub_districts_view($id){
    if(count($result['data']['districts'] = $this->api_model->get_data_by_where("districts", array('is_active'=>true))->result()) > 0){
      if(count($result['data']['sub_districts'] = $this->api_model->get_data_by_where("sub_districts", array('id'=>$id))->result()) > 0){
        $districts_selected = $result['data']['sub_districts'][0]->distric_id;
        if(count($result['data']['sub_districts']['districts'] = $this->api_model->get_data_by_where("districts", array('id'=>$districts_selected))->result()) > 0){
          $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'mengambil data berhasil', 'english'=>'data is catched'));
        }else{
          $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'mengambil data gagal', 'english'=>"data doesn't catch"));
          $this->output->set_status_header(404);
        }
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'mengambil data gagal', 'english'=>"data doesn't catch"));
        $this->output->set_status_header(404);
      }
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'mengambil data gagal', 'english'=>"data doesn't catch"));
      $this->output->set_status_header(404);
    }
    echo json_encode($result);
  }

  // --------------------------------------------------- SESSION FUNCTION -------------------------------
    public function set_session(){
      $id = $this->input->post('id');
      $role_id = $this->input->post('role_id');
      $name = $this->input->post('name');
      $nik = $this->input->post('nik');
      $sub_district_id = $this->input->post('sub_district_id');
      $community_unit = $this->input->post('community_unit');
      $email = $this->input->post('email');
      $date_of_birth = $this->input->post('date_of_birth');
      $sex = $this->input->post('sex');
      $occupation_id = $this->input->post('occupation_id');
      $profile_photo = $this->input->post('profile_photo');
      $ktp_photo = $this->input->post('ktp_photo');
      $whatsapp_number = $this->input->post('whatsapp_number');
      $session = array(
          'authenticated_admin'=>true,
          'id'=>$id, 
          'role_id'=>$role_id, 
          'name'=>$name,
          'nik'=>$nik,
          'sub_district_id'=>$sub_district_id,
          'community_unit'=>$community_unit,
          'email'=>$email,
          'date_of_birth'=>$date_of_birth,
          'sex'=>$sex,
          'occupation_id'=>$occupation_id,
          'profile_photo'=>$profile_photo,
          'ktp_photo'=>$ktp_photo,
          'whatsapp_number'=>$whatsapp_number
        );
      $this->session->set_userdata($session);
      $result['response']['status'] = true;
      $result['response']['message']['indonesia'] = 'sesi dibuat';
      $result['response']['message']['english'] = 'session created';
      $result['response']['data'][] = true;
      echo json_encode($result);
    }

    // --------------------------------------------------- DATA TABLE FUNCTION -------------------------------
    public function get_regencies_data_table(){
			$columns = array(
		      array(
		        'db' => 'name',  'dt' => 0,
		        'formatter' => function($d, $row){
		          return $d;
		        }
		      ),
		      array(
		        'db' => 'id',  'dt' => 1,
		        'formatter' => function($d, $row){
		          return '
		          <center>
		              <a href="'.base_url('admin/detail_driver/'.$d).'">
		              	<i class="fa fa-eye"></i>
		              </a>
		            </center>
		          ';
		        }
		      ),
		    );
		    $ssptable='regencies';
		    $sspprimary='id';
		    $sspjoin='';
		    $sspwhere='is_active = true';
		    $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
		    echo json_encode($go);
	  }
    public function get_districts_data_table(){
			$columns = array(
		      array(
		        'db' => 'name',  'dt' => 0,
		        'formatter' => function($d, $row){
		          return $d;
		        }
		      ),
          array(
		        'db' => 'regency_name',  'dt' => 1,
		        'formatter' => function($d, $row){
		          return $d;
		        }
		      ),
		      array(
		        'db' => 'id',  'dt' => 2,
		        'formatter' => function($d, $row){
		          return '
		          <center>
		              <a href="#edit">
		              	<i title="edit" onClick="edit_districts('.$d.')" class="fa fa-edit"></i>
		              </a>
                  <a href="#delete">
		              	<i title="hapus" onClick="delete_districts('.$d.')" class="fa fa-trash"></i>
		              </a>
		            </center>
		          ';
		        }
		      ),
		    );
		    $ssptable='districts_join_regencies';
		    $sspprimary='id';
		    $sspjoin='';
		    $sspwhere='id>0';
		    $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
		    echo json_encode($go);
	  }
    public function get_sub_districts_data_table(){
        $columns = array(
          array(
            'db' => 'name',  'dt' => 0,
            'formatter' => function($d, $row){
              return $d;
            }
          ),
          array(
            'db' => 'districts_name',  'dt' => 1,
            'formatter' => function($d, $row){
              return $d;
            }
          ),
          array(
            'db' => 'id',  'dt' => 2,
            'formatter' => function($d, $row){
              return '
		          <center>
		              <a href="#edit">
		              	<i title="edit" onClick="edit_sub_districts('.$d.')" class="fa fa-edit"></i>
		              </a>
                  <a href="#delete">
		              	<i title="hapus" onClick="delete_sub_districts('.$d.')" class="fa fa-trash"></i>
		              </a>
		          </center>
		          ';
            }
          ),
        );
        $ssptable='sub_districts_join_districrs';
        $sspprimary='id';
        $sspjoin='';
        $sspwhere='id>=0';
        $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
        echo json_encode($go);
    }
}
