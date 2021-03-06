<?php $this->load->view('templates/open'); ?>
	<div class="dashboard">	

		<nav id="sidebar" class="bg-dark">
            <ul class="menu list-tanpa-style">
            	<?php if ($this->session->userdata('role')==1) {?>
                <li class="<?php echo menuAktif('dashboard') ?>"> <?php echo anchor('dashboard', 'Dashboard'); ?> </li>
                <li class="<?php echo menuAktif('karyawan') ?>"> <?php echo anchor('dashboard/karyawan', 'Karyawan'); ?> </li>
                <li class="<?php echo menuAktif('tunjangan') ?>"> <?php echo anchor('dashboard/gaji-dan-tunjangan', 'Gaji & Tunjangan'); ?> </li>
                <li class="<?php echo menuAktif('absensi') ?>"> <?php echo anchor('dashboard/absensi	', 'Absensi'); ?></li>
                <li class="<?php echo menuAktif('posisi') ?>"> <?php echo anchor('dashboard/posisi', 'Posisi'); ?> </li>
                <li class="<?php echo menuAktif('departemen') ?>"> <?php echo anchor('dashboard/departemen', 'Departemen'); ?> </li>
                <li>
                    <a href="#homeSubmenu" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false">Administrasi</a>
                    <ul class="list-tanpa-style collapse" id="homeSubmenu">
                        <li class="<?php echo menuAktif('kategori') ?>"> <?php echo anchor('dashboard/administrasi/kategori', 'Kategori'); ?>
                        </li>
                    </ul>
                </li>
            <?php }
            else{
             ?>
             <li class="<?php echo menuAktif('profile') ?>"> <?php echo anchor('dashboard/profile/', 'Profile'); ?> </li>
             <li class="<?php echo menuAktif('absensi') ?>"> <?php echo anchor('dashboard/absensi/detail/'.$this->session->userdata('user_id'), 'Absensi'); ?></li>
         <?php } ?>
                
                <li> <?php echo anchor('logout', 'Logout'); ?> </li>
            </ul>
	    </nav>

		<div id="content">
            <nav class="navbar navbar-expand bg-light">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-dark">
                    <i class="fa fa-align-justify"></i>
                </button>
                <a class="navbar-brand logo-dashboard" href="#">METADESA</a>

                <div class="date ml-auto">
					<p><span id="tanggalwaktu"></span></p>
					<script>
					var tw = new Date();
					if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
					else (a=tw.getTime());
					tw.setTime(a);
					var tahun= tw.getFullYear ();
					var hari= tw.getDay ();
					var bulan= tw.getMonth ();
					var tanggal= tw.getDate ();
					var hariarray=new Array("Minggu ||","Senin ||","Selasa ||","Rabu ||","Kamis ||","Jum'at ||","Sabtu ||");
					var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
					document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun+" || " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes();
					</script>
				</div>
            </nav>

            <div class="container-fluid">
				<?php
				    if($this->session->flashdata('pesan')){
				        $alert = $this->session->flashdata('alert');
				        echo '<div class="alert ' . $alert . '">' . $this->session->flashdata('pesan') . '</div>';
				    }
				?>

				<h3 class="dashboard"><?php echo $titleDashboard; ?></h3>
				<?php
					//ini yang akan membuat konten di dalam dashboard berubah-ubah
					$this->load->view($kontenDinamis);
				?>
			</div>
		</div>
	</div>

<?php $this->load->view('templates/close'); ?>