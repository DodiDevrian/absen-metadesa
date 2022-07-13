<div class="profile container">
<<<<<<< HEAD
	<div class="row" style="margin-bottom: 20px;">
		<label class="col-5">Nama Lengkap</label>
		<p class="col-7">: <?php echo $data_karyawan->nama_depan.' '.$data_karyawan->nama_belakang ?></p>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<label class="col-5">Email</label>
		<p class="col-7">: <?php echo $data_karyawan->email ?></p>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<label class="col-5">Tanggal Lahir</label>
		<p class="col-7">: <?php echo $data_karyawan->dob ?></p>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<label class="col-5">Nomor Telepon</label>
		<p class="col-7">: <?php echo $data_karyawan->nomor_telepon ?></p>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<label class="col-5">Nomor HP</label>
		<p class="col-7">: <?php echo $data_karyawan->nomor_hp ?></p>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<label class="col-5">Jenis Kelamin</label>
		<p class="col-7">: <?php echo $data_karyawan->jenis_kelamin ?></p>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<label class="col-5">Departemen</label>
		<p class="col-7">: <?php echo $data_karyawan->nama_departemen ?></p>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<label class="col-5">Posisi</label>
		<p class="col-7">: <?php echo $data_karyawan->nama_posisi ?></p>
	</div>
	<div class="row" style="margin-bottom: 20px;">
=======
	<div class="label-profile row">
		<label class="col-5">Nama Lengkap</label>
		<p class="col-7">: <?php echo $data_karyawan->nama_depan.' '.$data_karyawan->nama_belakang ?></p>
	</div>
	<div class="label-profile row">
		<label class="col-5">Email</label>
		<p class="col-7">: <?php echo $data_karyawan->email ?></p>
	</div>
	<div class="label-profile row">
		<label class="col-5">Tanggal Lahir</label>
		<p class="col-7">: <?php echo $data_karyawan->dob ?></p>
	</div>
	<div class="label-profile row">
		<label class="col-5">Nomor Telepon</label>
		<p class="col-7">: <?php echo $data_karyawan->nomor_telepon ?></p>
	</div>
	<div class="label-profile row">
		<label class="col-5">Nomor HP</label>
		<p class="col-7">: <?php echo $data_karyawan->nomor_hp ?></p>
	</div>
	<div class="label-profile row">
		<label class="col-5">Jenis Kelamin</label>
		<p class="col-7">: <?php echo $data_karyawan->jenis_kelamin ?></p>
	</div>
	<div class="label-profile row">
		<label class="col-5">Departemen</label>
		<p class="col-7">: <?php echo $data_karyawan->nama_departemen ?></p>
	</div>
	<div class="label-profile row">
		<label class="col-5">Posisi</label>
		<p class="col-7">: <?php echo $data_karyawan->nama_posisi ?></p>
	</div>
	<div class="label-profile row">
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
		<label class="col-5">Status</label>
		<p class="col-7">: <?php echo $data_karyawan->status ?></p>
	</div>
		<?php foreach ($kategori as $index => $data) {
			// code...
		 ?>
<<<<<<< HEAD
	<div class="row" style="margin-bottom: 20px;">
=======
	<div class="label-profile row">
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
		<label class="col-5"><?php echo $data  ?></label>
		<p class="col-7">: <?php echo "Rp " . number_format($nominal[$index]->nominal ,2,',','.'); ?></p>
	</div>
	<?php } ?>
</div>