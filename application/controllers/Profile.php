<?php

	class Profile extends CI_Controller {

		private $template = 'templates/dashboard/template.php';

		public function __construct(){
			parent::__construct();
			apakahLoginRedirect();

			$this->load->model('Karyawan_model');
			$this->load->model('Departemen_model');
			$this->load->model('Posisi_model');
			$this->load->library(['password']);
			$this->load->model('User_model');
		}

        public function index($page = 'pages/karyawan/profile')
        {
			$data['title'] = 'Profile Karyawan';
			$data['titleDashboard'] = 'Profile';
			$data['kontenDinamis'] = $page;
			
			$rows = $this->Karyawan_model->profile($this->session->userdata('user_id'))->row();
			$data['data_karyawan']= $rows;


			$kategori=[];
			$tunjangan_rows = $this->Karyawan_model->tunjangan($this->session->userdata('user_id'))->result();
			$katagori_rows = $this->Karyawan_model->kategori($this->session->userdata('user_id'))->result();
			foreach ($katagori_rows as $index => $value) {
				if ($value->id_kategori==$tunjangan_rows[$index]->id_kategori) {
					
					array_push($kategori, $value->nama_kategori);

				}
			}
			$data['kategori']=$kategori;
			$data['nominal']=$tunjangan_rows;
			$this->load->view($this->template, $data);
        }



        public function add($page = 'pages/karyawan/tambah'){
			$data['title'] = 'Karyawan | Create';
			$data['titleDashboard'] = 'Karyawan';
			$data['kontenDinamis'] = $page;

			$this->load->view($this->template, $data);   
        }

        public function create(){
	    	$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
	    	$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
	    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[karyawan.email]');
	    	$this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required');
	    	$this->form_validation->set_rules('alamat', 'alamat', 'required');
	    	$this->form_validation->set_rules('nomor_telepon', 'nomor_telepon', 'numeric');
	    	$this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required|numeric');
	    	$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
	    	$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
	    	$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	//panggil form tambah
	        	$this->add();
	        }

	        else{
	        	$dataRegister = ['nama_depan'		=> $this->input->post('nama_depan'),
				                 'nama_belakang'    => $this->input->post('nama_belakang'),
				                 'email'            => $this->input->post('email'),
				                 'dob'            	=> $this->input->post('dob'),
				                 'nomor_telepon'    => $this->input->post('nomor_telepon'),
				                 'nomor_hp'    		=> $this->input->post('nomor_hp'),
				                 'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
				                 'alamat'   		 => $this->input->post('alamat'),
				                 'password'    		=> $this->password->hash($this->input->post('password')),
				                 'dibuat'    		=> saatIni(),
				                 'diganti'    		=> saatIni(),
				                 'id_departemen'    => 1,
				                 'id_posisi'    	=> 1,
				                 'status'    		=> 'interview'
				             	];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->User_model->create($dataRegister);

				//untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        					  'pesan' => 'Karyawan berhasil ditambahkan'];

	    		$this->session->set_flashdata($dataPesan);

				redirect('dashboard/karyawan');
	        }
        }

        public function edit($id = 0, $page = 'pages/karyawan/form'){
			$data['title'] = 'Karyawan | Edit';
			$data['titleDashboard'] = 'Karyawan';
			$data['kontenDinamis'] = $page;
			$data['row'] = $this->Karyawan_model->berdasarkanId($id)->row();

			$data['departemen'] = $this->Departemen_model->dropdownList();
			$data['posisi'] = $this->Posisi_model->dropdownList();
			$data['status'] = array_combine($this->config->item('statusUser'), $this->config->item('statusUser'));

			$this->load->view($this->template, $data);    
        }

        public function update($id){
	    	$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
	    	$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
	    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_unique_email['.$id.']');
	    	$this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required');
	    	$this->form_validation->set_rules('alamat', 'alamat', 'required');
	    	$this->form_validation->set_rules('nomor_telepon', 'nomor_telepon', 'numeric');
	    	$this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required|numeric');
	    	$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');


	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	if(!$id){
		        	redirect('dashboard/karyawan');
	        	}
	        
	        	//panggil form edit
	        	$this->edit($id);
	        }
	        else{
	        	$dataRegister = ['nama_depan'		=> $this->input->post('nama_depan'),
				                 'nama_belakang'    => $this->input->post('nama_belakang'),
				                 'email'            => $this->input->post('email'),
				                 'dob'            	=> $this->input->post('dob'),
				                 'nomor_telepon'    => $this->input->post('nomor_telepon'),
				                 'nomor_hp'    		=> $this->input->post('nomor_hp'),
				                 'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
				                 'alamat'   		=> $this->input->post('alamat'),
				                 'id_departemen'    => $this->input->post('departemen'),
				                 'id_posisi'    	=> $this->input->post('posisi'),
				                 'status'    		=> $this->input->post('status'),
				                 'diganti'    		=> saatIni()
				             	];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Karyawan_model->update($id, $dataRegister);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Akun '. $this->input->post('nama_depan') .' '. $this->input->post('nama_belakang') .' berhasil di update'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/karyawan');
	        }   
        }

        //Autocomplete di form tunjangan
        public function search()
        {
        	$nama = $this->input->get('term');
        	$rows = $this->Karyawan_model
        				->berdasarkanNama($nama)
        				->result();	
	
			echo json_encode($rows);			    
        }

		//data json untuk datatables
		public function data($tipe = 'semua'){

			if($tipe == 'semua'){
				$rows = $this->Karyawan_model->semua()->result();
			}else if($tipe == 'karyawan-aktif'){
				$rows = $this->Karyawan_model->semuaKaryawanAktif()->result();
			}

			$dataTable['data'] = $rows;
			echo json_encode($dataTable);
		}

		public function unique_email($input, $id){
			$row = $this->Karyawan_model->berdasarkanEmail($input)
										->row();

			if($row){			
				if($row->id != $id){
					$this->form_validation->set_message('unique_email', 'Sudah ada yang daftar dengan email '.$input);
					return FALSE;
				}
				else{
					return TRUE;
				}
			}

			return TRUE;
		}

        //CUMA UNTUK ISI DATA
	  //   public function faker(){
	  //   $masalahWindows = str_replace("\\", "/", APPPATH);

		 // 	include $masalahWindows."third_party/Faker-master/faker/autoload.php";
			
		 // 	$batas = 200;

		 // 	$faker = Faker\Factory::create('en_HK');
		 // 	$faker->seed($batas);

		 // 	for ($i = 0; $i < $batas; $i++) {
		 // 		$dataRegister[] = ['nama_depan'		=> $faker->firstName,
		 // 		                 'nama_belakang'    => $faker->lastName,
		 // 		                 'email'            => $faker->email,
		 // 		                 'dob'            	=> $faker->dateTimeThisCentury->format('Y-m-d'),
		 // 		                 'nomor_telepon'    => $faker->phoneNumber,
		 // 		                 'nomor_hp'    		=> $faker->phoneNumber,
		 // 		                 'jenis_kelamin'    => $faker->randomElement(['Pria', 'Wanita']),
		 // 		                 'alamat'    		=> $faker->address,
		 // 		                 'password'    		=> $faker->password,
		 // 		                 'dibuat'    		=> saatIni(),
		 // 		                 'diganti'    		=> saatIni(),
		 // 		                 'id_departemen'    => 1,
		 // 		                 'id_posisi'    	=> 1 
		 // 		             	];
		 // 	}

		 // 	// hanya faker, jadi langsung di kontroller
		 // 	$this->db->insert_batch('karyawan', $dataRegister);
		 // }

	}