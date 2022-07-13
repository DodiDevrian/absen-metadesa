<?php

	class Dashboard extends CI_Controller {

		private $template = 'templates/dashboard/template';

		public function __construct(){
			parent::__construct();

			apakahLoginRedirect();
<<<<<<< HEAD
			$this->load->model('Karyawan_model');
=======
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
		}

        public function index($page = 'pages/home/list')
        {
			$data['title'] = 'Dashboard';
			$data['titleDashboard'] = 'Dashboard';
			$data['kontenDinamis'] = $page;
<<<<<<< HEAD

			$rows = $this->Karyawan_model->profile($this->session->userdata('user_id'))->row();
			$data['data_karyawan']= $rows;
=======
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
			
			$this->load->view($this->template, $data);        
        }

	}