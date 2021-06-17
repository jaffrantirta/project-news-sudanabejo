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
  public function cek_session(){
    echo json_encode($this->session->all_userdata());
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
        $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Data ditemukan', 'english'=>'data is founded'));
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Data tidak ditemukan', 'english'=>'data not found'));
        $this->output->set_status_header(404);
      }
      echo json_encode($result);
    }
    public function get_data_where($param){
      $decode = explode("/", base64_decode($param));
      $table = $decode[0];
      $where_clause = $decode[1];
      $where_condition = $decode[2];
      $where_value = $decode[3];
      $data = array(
        'is_active' => true,
        $where_clause.$where_condition=>$where_value
      );
      if(count($result['data'] = $this->api_model->get_data_by_where($table, $data)->result()) > 0){
        $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Data ditemukan', 'english'=>'data is founded'));
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Data tidak ditemukan', 'english'=>'data not found'));
        $this->output->set_status_header(404);
      }
      echo json_encode($result);
    }
    public function get_data_news($table){
      $data = array(
        'is_delete' => false,
      );
      if(count($result['data'] = $this->api_model->get_data_by_where($table, $data)->result()) > 0){
        $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Data ditemukan', 'english'=>'data is founded'));
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Data tidak ditemukan', 'english'=>'data not found'));
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
          $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Tersimpan', 'english'=>'data is saved'));
        }else{
          $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menyimpan', 'english'=>'failed to save'));
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
      $where_clause = array('id' => $id);
      if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
        $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Data telah diubah', 'english'=>'data has been updated'));
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Data tidak berhasi diubah', 'english'=>"data doesn't update"));
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
      $where_clause = array('id' => $id);
      if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
        $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Terhapus', 'english'=>'deleted'));
      }else{
        $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menghapus', 'english'=>"failed to delete"));
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
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Tersimpan', 'english'=>'data is saved'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menyimpan', 'english'=>'failed to save'));
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
    $where_clause = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Terhapus', 'english'=>'deleted'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menghapus', 'english'=>"failed to delete"));
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
    $where_clause = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Data telah diubah', 'english'=>'data has been updated'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Data tidak berhasi diubah', 'english'=>"data doesn't update"));
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

  // --------------------------------------------------- NEWS CATEGORIES -------------------------------

  public function delete_news_categories(){
    $id = $this->input->post('id');
    $table = 'news_categories';
    $data = array(
      'is_active' => false
    );
    $where_clause = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Terhapus', 'english'=>'deleted'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menghapus', 'english'=>"failed to delete"));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }

  public function edit_news_categories_view($id){
    if(count($result['data']['news_categories'] = $this->api_model->get_data_by_where("news_categories", array('id'=>$id))->result()) > 0){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'mengambil data berhasil', 'english'=>'data is catched'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'mengambil data gagal', 'english'=>"data doesn't catch"));
      $this->output->set_status_header(404);
    }
    echo json_encode($result);
  }

  public function insert_news_categories(){
    $news_categories_name = $this->input->post('news_categories_name');
    $table = 'news_categories';
    $data = array(
      'name' => $news_categories_name,
    );
    if($result['data'] = $this->api_model->insert_data($table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Tersimpan', 'english'=>'data is saved'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menyimpan', 'english'=>'failed to save'));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }

  public function update_news_categories(){
    $news_categories_name = $this->input->post('news_categories_name');
    $id = $this->input->post('id');
    $table = 'news_categories';
    $data = array(
      'name' => $news_categories_name,
    );
    $where_clause = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Data telah diubah', 'english'=>'data has been updated'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Data tidak berhasi diubah', 'english'=>"data doesn't update"));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }

  // --------------------------------------------------- POPULAR NEWS -------------------------------

  public function delete_popular_news(){
    $id = $this->input->post('id');
    $table = 'populars';
    $data = array(
      'is_active' => false
    );
    $where_clause = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Terhapus', 'english'=>'deleted'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menghapus', 'english'=>"failed to delete"));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }

  public function insert_popular_news(){
    $news_id = $this->input->post('news_id');
    $table = 'populars';
    $data = array(
      'news_id' => $news_id,
    );
    if($result['data'] = $this->api_model->insert_data($table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Tersimpan', 'english'=>'data is saved'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menyimpan', 'english'=>'failed to save'));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }


  // --------------------------------------------------- USERS -------------------------------------

  public function update_user(){
    $id = $this->input->post('id');
    $table = 'users';
    $data = array(
      'name' => $users_name,
    );
    $where_clause = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Data telah diubah', 'english'=>'data has been updated'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Data tidak berhasi diubah', 'english'=>"data doesn't update"));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }
  public function edit_user_view($id){
    $data = $this->api_model->get_data_by_where("users_complate_data", array('id'=>$id))->result();
    if(count($data) > 0){
      $result['user'] = $data[0];
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'mengambil data berhasil', 'english'=>'data is catched'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'mengambil data gagal', 'english'=>"data doesn't catch"));
      $this->output->set_status_header(404);
    }
    echo json_encode($result);
  }

  // --------------------------------------------------- HEADLINE NEWS -------------------------------

  public function delete_headline_news(){
    $id = $this->input->post('id');
    $table = 'headline_news';
    $data = array(
      'is_active' => false
    );
    $where_clause = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Terhapus', 'english'=>'deleted'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menghapus', 'english'=>"failed to delete"));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }

  public function insert_headline_news(){
    $news_id = $this->input->post('news_id');
    $table = 'headline_news';
    $data = array(
      'news_id' => $news_id,
    );
    if($result['data'] = $this->api_model->insert_data($table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Tersimpan', 'english'=>'data is saved'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menyimpan', 'english'=>'failed to save'));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }

  // --------------------------------------------------- NEWS -------------------------------

  public function delete_news(){
    $id = $this->input->post('id');
    $news = $this->api_model->get_data_by_where('news_photos', array('news_id'=>$id))->result();
    unlink("assets/images/news/".$news[0]->name);
    $table = 'news';
    $data = array(
      'is_delete' => true
    );
    $where_clause = array('id' => $id);
    if($result['data'] = $this->api_model->update_data($where_clause, $table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Terhapus', 'english'=>'deleted'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menghapus', 'english'=>"failed to delete"));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }

  public function insert_news(){
    $title = $this->input->post('title');
    $content = $this->input->post('content');
    $category = $this->input->post('category');
    $table = 'news';
    $data = array(
      'title'=>$title,
      'content'=>$content,
      'category_id'=>$category
    );
    if($result['data'] = $this->api_model->insert_data($table, $data)){
      $result['response'] = $this->response(array('status'=>true, 'indonesia'=>'Tersimpan', 'english'=>'data is saved'));
    }else{
      $result['response'] = $this->response(array('status'=>false, 'indonesia'=>'Gagal menyimpan', 'english'=>'failed to save'));
      $this->output->set_status_header(501);
    }
    echo json_encode($result);
  }
  public function insert_news_2(){
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
          $this->session->set_flashdata('msg', 'Sukses');
          
        }else{
          $this->session->set_flashdata('msg', 'Gagal Upload');
        }
      }else{
        $this->session->set_flashdata('msg', 'Gagal Input Gambar');
      }
    }else{
      $this->session->set_flashdata('msg', 'Gagal Input Berita');
    }
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
          'whatsapp_number'=>$whatsapp_number,
          'account_scope'=>'regencies'
        );
      $this->session->set_userdata($session);
      $result['response']['status'] = true;
      $result['response']['message']['indonesia'] = 'sesi dibuat';
      $result['response']['message']['english'] = 'session created';
      $result['response']['data'][] = true;
      echo json_encode($result);
    }

    // --------------------------------------------------- DASHBOARD FUNCTION -------------------------------

    public function get_regencies_count($table, $data){
        $regencies = $this->api_model->get_data_by_where($table, $data)->result();
        $sum_regencies = count($regencies);
        if($sum_regencies > 0){
            for($i=0;$i<$sum_regencies;$i++){
              $table_2 = 'count_regencies';
              $data_2 = array('is_active'=>true, 'id'=>$regencies[$i]->id);
              if(count($data = $this->api_model->get_data_by_where($table_2, $data_2)->result()) > 0){
                $result['regencies'][$i] = $data[0];
              }else{
                $result['regencies'][$i] = array(
                  'count_by_regency'=>'0',
                  'id'=>$regencies[$i]->id,
                  'name'=>$regencies[$i]->name,
                  'is_active'=>$regencies[$i]->is_active,
                  'created_at'=>$regencies[$i]->created_at,
                  'updated_at'=>$regencies[$i]->updated_at
                );
              }
            }
        }else{
          $result = null;
        }
      return $result;
    }

    public function get_districts_count($table, $data){
        $districts = $this->api_model->get_data_by_where($table, $data)->result();
        $sum_districts = count($districts);
        if($sum_districts > 0){
          $regency_data = $this->get_regencies_count('regencies', array('is_active'=>true, 'id'=>$districts[0]->regency_id));
          $result['regencies'] = $regency_data['regencies'];
          for($i=0;$i<$sum_districts;$i++){
            $table_2 = 'count_districts';
            $data_2 = array('is_active'=>true, 'id'=>$districts[$i]->id);
            if(count($data = $this->api_model->get_data_by_where($table_2, $data_2)->result()) > 0){
              $result['districts'][$i] = $data[0];
            }else{
              $result['districts'][$i] = array(
                'count_by_districts'=>'0',
                'id'=>$districts[$i]->id,
                'name'=>$districts[$i]->name,
                'regency_id'=>$districts[$i]->regency_id,
                'is_active'=>$districts[$i]->is_active,
                'created_at'=>$districts[$i]->created_at,
                'updated_at'=>$districts[$i]->updated_at
              );
            }
          }
        }else{
          $result = null;

        }
      return $result;
    }

    public function get_sub_districts_count($table, $data){
        $sub_districts = $this->api_model->get_data_by_where($table, $data)->result();
        $sum_sub_districts = count($sub_districts);
        if($sum_sub_districts > 0){
          $districts_data = $this->get_districts_count('districts', array('is_active'=>true, 'id'=>$sub_districts[0]->distric_id));
          $result = $districts_data;
          for($i=0;$i<$sum_sub_districts;$i++){
            $table_2 = 'count_sub_districts';
            $data_2 = array('is_active'=>true, 'id'=>$sub_districts[$i]->id);
            if(count($data = $this->api_model->get_data_by_where($table_2, $data_2)->result()) > 0){
              $result['sub_districts'][$i] = $data[0];
            }else{
              $result['sub_districts'][$i] = array(
                'count_by_sub_districts'=>'0',
                'id'=>$sub_districts[$i]->id,
                'name'=>$sub_districts[$i]->name,
                'distric_id'=>$sub_districts[$i]->distric_id,
                'is_active'=>$sub_districts[$i]->is_active,
                'created_at'=>$sub_districts[$i]->created_at,
                'updated_at'=>$sub_districts[$i]->updated_at
              );
            }
          }
        }else{
          $result = null;

        }
      return $result;
    }

    public function get_data_sum($v){
      $decode = explode("/", base64_decode($v));
      $based_by = $decode[0];
      $where_clause = $decode[1];
      $where_condition = $decode[2];
      $where_value = $decode[3];
      $data = array(
        'is_active'=>true,
        $where_clause.$where_condition=>$where_value
      );

      switch($based_by){
        case 'regencies':
          $response['data'] = $this->get_regencies_count($based_by, $data);
          break;
        case 'districts':
          $response['data'] = $this->get_districts_count($based_by, $data);
          break;
        case 'sub_districts':
          $response['data'] = $this->get_sub_districts_count($based_by, $data);
          break;
      }
      if($response['data'] != null){
        $response['response'] = $this->response(array('status'=>true, 'indonesia'=>'ditemukan', 'english'=>'founded'));
      }else{
        $response['response'] = $this->response(array('status'=>false, 'indonesia'=>'tidak ditemukan', 'english'=>'not found'));
      }
      echo json_encode($response);
    }
    public function test(){
      $marge = 'users/2';
      echo base64_encode($marge);
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
		    $sspwhere='id>=0';
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

    public function get_news_categories_data_table(){
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
                <a href="#edit">
                  <i title="edit" onClick="edit_news_categories('.$d.')" class="fa fa-edit"></i>
                </a>
                <a href="#delete">
                  <i title="hapus" onClick="delete_news_categories('.$d.')" class="fa fa-trash"></i>
                </a>
            </center>
            ';
          }
        ),
      );
      $ssptable='news_categories';
      $sspprimary='id';
      $sspjoin='';
      $sspwhere='is_active = 1';
      $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
      echo json_encode($go);
    }

    public function get_news_data_table(){
      $columns = array(
        array(
          'db' => 'category_name',  'dt' => 0,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'title',  'dt' => 1,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'visit_sum',  'dt' => 2,
          'formatter' => function($d, $row){
            if($d == null){
              $view = 'belum ada kunjungan';
            }else{
              $view = $d;
            }
            return $view;
          }
        ),
        array(
          'db' => 'is_pending',  'dt' => 3,
          'formatter' => function($d, $row){
            if($d == 1){
              $view = 'TRUE';
            }else{
              $view = 'FALSE';
            }
            return $view;
          }
        ),
        array(
          'db' => 'created_at',  'dt' => 4,
          'formatter' => function($d, $row){
            $date = date("l, d-F-Y H:i:s", strtotime($d));  
            return $date;
          }
        ),
        array(
          'db' => 'updated_at',  'dt' => 5,
          'formatter' => function($d, $row){
            $date = date("l, d-F-Y H:i:s", strtotime($d));  
            return $date;
          }
        ),
        array(
          'db' => 'is_post',  'dt' => 6,
          'formatter' => function($d, $row){
            if($row[3] == 1){
              $view = '<h5 style="color: yellow">PENDING</h5>';
            }else{
              $view = '<h5 style="color: green">TAYANG</h5>';
            }
            return $view;
          }
        ),
        array(
          'db' => 'id',  'dt' => 7,
          'formatter' => function($d, $row){
            $encode = base64_encode($d);
            $final = base64_encode($encode);
            return '
            <center>
                <a href="'.base_url("admin/update_news/".$final).'">
                  <i title="edit" class="fa fa-edit"></i>
                </a>
                <a href="#delete">
                  <i title="hapus" onClick="delete_news('.$d.')" class="fa fa-trash"></i>
                </a>
            </center>
            ';
          }
        ),
      );
      $ssptable='news_complate_data';
      $sspprimary='id';
      $sspjoin='';
      $sspwhere='is_delete = 0';
      $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
      echo json_encode($go);
    }
    public function get_popular_news_data_table(){
      $columns = array(
        array(
          'db' => 'category_name',  'dt' => 0,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'title',  'dt' => 1,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'visit_sum',  'dt' => 2,
          'formatter' => function($d, $row){
            if($d == null){
              $view = 'belum ada kunjungan';
            }else{
              $view = $d;
            }
            return $view;
          }
        ),
        array(
          'db' => 'is_pending',  'dt' => 3,
          'formatter' => function($d, $row){
            if($d == 1){
              $view = 'TRUE';
            }else{
              $view = 'FALSE';
            }
            return $view;
          }
        ),
        array(
          'db' => 'created_at',  'dt' => 4,
          'formatter' => function($d, $row){
            $date = date("l, d-F-Y H:i:s", strtotime($d));  
            return $date;
          }
        ),
        array(
          'db' => 'updated_at',  'dt' => 5,
          'formatter' => function($d, $row){
            $date = date("l, d-F-Y H:i:s", strtotime($d));  
            return $date;
          }
        ),
        array(
          'db' => 'is_post',  'dt' => 6,
          'formatter' => function($d, $row){
            if($row[3] == 1){
              $view = '<h5 style="color: yellow">PENDING</h5>';
            }else{
              $view = '<h5 style="color: green">TAYANG</h5>';
            }
            return $view;
          }
        ),
        array(
          'db' => 'popular_id',  'dt' => 7,
          'formatter' => function($d, $row){
            return '
            <center>
                <a href="#edit">
                  <i title="edit" onClick="edit_news_categories('.$d.')" class="fa fa-edit"></i>
                </a>
                <a href="#delete">
                  <i title="hapus" onClick="delete_popular_news('.$d.')" class="fa fa-trash"></i>
                </a>
            </center>
            ';
          }
        ),
      );
      $ssptable='popular_news';
      $sspprimary='id';
      $sspjoin='';
      $sspwhere='is_active = 1 AND is_delete = 0 AND news_category_is_active = 1';
      $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
      echo json_encode($go);
    }
    public function get_headline_data_table(){
      $columns = array(
        array(
          'db' => 'category_name',  'dt' => 0,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'title',  'dt' => 1,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'visit_sum',  'dt' => 2,
          'formatter' => function($d, $row){
            if($d == null){
              $view = 'belum ada kunjungan';
            }else{
              $view = $d;
            }
            return $view;
          }
        ),
        array(
          'db' => 'is_pending',  'dt' => 3,
          'formatter' => function($d, $row){
            if($d == 1){
              $view = 'TRUE';
            }else{
              $view = 'FALSE';
            }
            return $view;
          }
        ),
        array(
          'db' => 'created_at',  'dt' => 4,
          'formatter' => function($d, $row){
            $date = date("l, d-F-Y H:i:s", strtotime($d));  
            return $date;
          }
        ),
        array(
          'db' => 'updated_at',  'dt' => 5,
          'formatter' => function($d, $row){
            $date = date("l, d-F-Y H:i:s", strtotime($d));  
            return $date;
          }
        ),
        array(
          'db' => 'is_post',  'dt' => 6,
          'formatter' => function($d, $row){
            if($row[3] == 1){
              $view = '<h5 style="color: yellow">PENDING</h5>';
            }else{
              $view = '<h5 style="color: green">TAYANG</h5>';
            }
            return $view;
          }
        ),
        array(
          'db' => 'headline_id',  'dt' => 7,
          'formatter' => function($d, $row){
            return '
            <center>
                <a href="#edit">
                  <i title="edit" onClick="edit_news_categories('.$d.')" class="fa fa-edit"></i>
                </a>
                <a href="#delete">
                  <i title="hapus" onClick="delete_headline_news('.$d.')" class="fa fa-trash"></i>
                </a>
            </center>
            ';
          }
        ),
      );
      $ssptable='headline';
      $sspprimary='id';
      $sspjoin='';
      $sspwhere='is_active = 1 AND is_delete = 0 AND news_category_is_active = 1';
      $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
      echo json_encode($go);
    }

    public function get_users_data_table(){
      $columns = array(
        array(
          'db' => 'name',  'dt' => 0,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'email',  'dt' => 1,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'occupation_name',  'dt' => 2,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'sub_districts_name',  'dt' => 3,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'districts_name',  'dt' => 4,
          'formatter' => function($d, $row){
            return $d;
          }
        ),
        array(
          'db' => 'regency_name',  'dt' => 5,
          'formatter' => function($d, $row){ 
            return $d;
          }
        ),
        array(
          'db' => 'id',  'dt' => 6,
          'formatter' => function($d, $row){
            $encode = base64_encode('users/'.$d);
            $url = base_url('admin/details/'.$encode);
            $v = '
            <center>
                <a href="'.$url.'">
                  <i title="edit" class="fa fa-edit"></i>
                </a>
            </center>
            ';
            return $v;
          }
        ),
      );
      $ssptable='users_complate_data';
      $sspprimary='id';
      $sspjoin='';
      $sspwhere='id>=0';
      $go=SSP::simpleCustom($_GET,$this->datatable_config(),$ssptable,$sspprimary,$columns,$sspwhere,$sspjoin);
      echo json_encode($go);
    }
}

