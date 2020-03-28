<?php 
// use libaries\REST_Controller;
 use \Restserver\Libraries\REST_Controller; 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class LiflowC extends REST_Controller 
{
    
    public function __construct(){
        parent::__construct();
        // $this->load->model('Mahasiswa_model','mhs');
        // echo "oke";
        // $this->load->view('mahasiswa');
       
    }

    public function  index_get()
    {
        date_default_timezone_set("Asia/Jakarta");
		$this->load->model('M_liflowdata');
		if (isset($_GET['temperature'])and $_GET['humidity']) {
			//echo "OK";
			$temperature = $this->input->get('temperature');
			$humidity = $this->input->get('humidity');
			//echo $panjang;

			$datasensor = array('sensor_temperature' => $temperature,'sensor_humidity'=>$humidity, 'time' => date('Y-m-d H:i:s'));

			if($this->M_liflowdata->save($datasensor)){
                $this->response([
                    'status' => TRUE,
                    'data' => ['temperature'=>$temperature,'humidity'=>$humidity] 
                ], REST_Controller::HTTP_OK);
			}else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'no data sensor detected' 
                ], REST_Controller::HTTP_NOT_FOUND);
			}
		}else{
            date_default_timezone_set("Asia/Jakarta");
            $this->load->model('M_liflowdata','data_sensor');
    
            $data['sensor'] = $this->data_sensor->ambildata();
    
            $this->load->view('liflow_view', $data);
		}

    }

    public function index_delete()
    {
        // $id = $this->delete('id');
        // // var_dump($id);
        // if($id === NULL)
        // {
        //     $this->response([
        //         'status' => FALSE,
        //         'message' => 'provide not found' 
        //     ], REST_Controller::HTTP_NOT_FOUND);
        // }
        // else{
        //     if($this->mhs->deleteMahasiswa($id) > 0)
        //     {
        //         $this->response([
        //             'status' => true,
        //             'id' => $id,
        //             'message' => 'mahasiswa has been deleted' 
        //         ], REST_Controller::HTTP_OK);
        //     }
        //     else
        //     {
        //         $this->response([
        //             'status' => false,
        //             'message' => 'id  not found' 
        //         ], REST_Controller::HTTP_BAD_REQUEST);
        //     }

        // }

    }

    public function index_post()
    {

        // $data = [
        //     'id' => '',
        //     'nrp' => $this->post('nrp'),
        //     'nama' => $this->post('nama'),
        //     'email' => $this->post('email'),
        //     'jurusan' => $this->post('jurusan')
        // ];

        // if($this->mhs->createdMahasiswa($data)>0)
        // {
        //     $this->response([
        //         'status' => true,
        //         'message' => 'new mahasiswa has been created' 
        //     ], REST_Controller::HTTP_CREATED);
        // }else{
        //     $this->response([
        //         'status' => false,
        //         'message' => 'Mahasiswa failed to add' 
        //     ], REST_Controller::HTTP_BAD_REQUEST);
        // }
    }

    public  function index_put()
    {
        // $id = $this->put('id');
        // $data = [
        //     'id' => $id,
        //     'nrp' => $this->put('nrp'),
        //     'nama' => $this->put('nama'),
        //     'email' => $this->put('email'),
        //     'jurusan' => $this->put('jurusan')
        // ];
        // if($id === NULL)
        // {
        //     $this->response([
        //         'status' => FALSE,
        //         'message' => 'id not found' 
        //     ], REST_Controller::HTTP_NOT_FOUND);
        // }else{
        //     if($this->mhs->updateMahasiswa($data,$id)>0)
        //     {
        //         $this->response([
        //             'status' => true,
        //             'message' => 'mahasiswa has been updated' 
        //         ], REST_Controller::HTTP_OK);
        //     }
        //     else{
        //         $this->response([
        //             'status' => FALSE,
        //             'message' => 'Mahasiswa failed to update' 
        //         ], REST_Controller::HTTP_BAD_REQUEST);
        //     }

        // }
    }

    public function sensor(){
        // date_default_timezone_set("Asia/Jakarta");
		// $this->load->model('M_liflowdata');
		// if (isset($_GET['temperature'])and $_GET['humidity']) {
		// 	//echo "OK";
		// 	$temperature = $this->input->get('temperature');
		// 	$humidity = $this->input->get('humidity');
		// 	//echo $panjang;

		// 	$datasensor = array('sensor_temperature' => $temperature,'sensor_humidity'=>$humidity, 'time' => date('Y-m-d H:i:s'));

		// 	if($this->M_liflowdata->save($datasensor)){
		// 		echo "BERHASIL";
		// 	}else{
		// 		echo "ERROR";
		// 	}
		// }else{
		// 	echo "Variabel data tidak terdefinisi";
		// }
	}

	public function monitoring(){
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('M_liflowdata');

		$data['sensor'] = $this->M_liflowdata->ambildata();

		$this->load->view('liflow_view', $data);
	}









}