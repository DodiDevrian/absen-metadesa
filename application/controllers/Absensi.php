<?php

	class Absensi extends CI_Controller {

		private $template = 'templates/dashboard/template.php';

		public function __construct(){
			parent::__construct();
			apakahLoginRedirect();

			$this->load->model(['Karyawan_model','Absensi_model']);
		}

        public function index($page = 'pages/absensi/list')
        {
			$data['title'] = 'Absensi';
			$data['titleDashboard'] = 'Absensi';
			$data['kontenDinamis'] = $page;
			
			$this->load->view($this->template, $data);        
        }

        public function detail($id, $page = 'pages/absensi/listDetail')
        {
			$data['title'] = 'Absensi';
			$data['titleDashboard'] = 'Absensi';
			$data['kontenDinamis'] = $page;
			$data['id'] = $id;

			$this->load->view($this->template, $data);        
        }

        public function edit($id = 0, $page = 'pages/absensi/form'){
			$data['title'] = 'Karyawan | Edit';
			$data['titleDashboard'] = 'Karyawan';
			$data['kontenDinamis'] = $page;
			$data['row'] = $this->Karyawan_model->berdasarkanId($id)->row();

			$data['departemen'] = $this->Departemen_model->dropdownList();
			$data['posisi'] = $this->Posisi_model->dropdownList();
			$data['status'] = array_combine($this->config->item('statusUser'), $this->config->item('statusUser'));

			$this->load->view($this->template, $data);    
        }

        public function data(){
        	// echo json_encode(["id" => $this->input->post("id_karyawan")]);
			$rows = $this->Absensi_model->berdasarkanId($this->input->post("id_karyawan"))
										 ->result();

			$dataTable['data'] = $rows;
			echo json_encode($dataTable);
		}

		public function add($id = 0, $page = 'pages/absensi/absen'){
			$data['title'] = 'Absensi | Absen';
			$data['titleDashboard'] = 'Absensi';
			$data['kontenDinamis'] = $page;

           
 		
			$data['id_karyawan'] = $this->uri->segment(4);
			$this->load->view($this->template, $data);   
        }

        public function create(){

	    	date_default_timezone_set('Asia/Jakarta');
	    	$waktu = new DateTime();
	        	$dataAbsen = [
	        		'sesi_absen'=> $this->input->post('sesi_absen'),
	        		'apakah_hadir'=> $this->input->post('apakah_hadir'),
	        		'keterangan' => $this->input->post('keterangan'),
				    'id_karyawan' => $this->input->post('id_karyawan'),
				    'tanggal' => $waktu->format('Y-m-d'),
				    'waktu' => $waktu->format('h:i:s'),
				    ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Absensi_model->create($dataAbsen);
				redirect('dashboard/absensi/detail/'. $this->input->post('id_karyawan'));
	        }   

	}