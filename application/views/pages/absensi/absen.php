<div class="card frame-form-weecom">
	<div class="card-body">
    	<?php 
    		//mengeluarkan semua error
			// echo validation_errors();

			$atribut = array('class' => 'form-weecom');
			$action= base_url('/Absensi/create');
			echo form_open($action, $atribut); 
		?>
		<div class="form-group row">
	        <label for="sesi_absen" class="col-3 control-label">Sesi Absen</label>
	        <div class="col-9">
				<select name="sesi_absen" class="form-control">
					<option value="Berangkat">Berangkat</option>
					<option value="Pulang">Pulang</option>
				</select>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="apakah_hadir" class="col-3 control-label">Apakah Hadir</label>
	        <div class="col-9">
				<select name="apakah_hadir" class="form-control">
					<option value="Hadir">Hadir</option>
					<option value="Tidak Hadir">Tidak Hadir</option>
					<option value="Sakit">Sakit</option>
					<option value="Izin">Izin</option>
				</select>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="keterangan" class="col-3 control-label">Keterangan</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array(
					        'type'  => 'text',
					        'name'  => 'keterangan',
					        'id'    => 'keterangan',
					        'class' => 'form-control',
					        'value' => set_value('keterangan'),
					        'placeholder' => 'Keterangan'
					);
					echo form_input($atribut);

					//bikin delimeter untuk semua error
					//bikin file form_validation di config
					//load di config/autoload
					echo form_error('keterangan');
				?>
	        </div>

	        <div class="col-9">
	        	<?php 
					$atribut = array(
					        'type'  => 'hidden',
					        'name'  => 'id_karyawan',
					        'id'    => 'id_karyawan',
					        'value' => $id_karyawan,
					);

					echo form_input($atribut);
				?>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-9 col-9 ml-auto">	    
				<?php 
					$atribut = array(
					        'name'  => 'submit',
					        'class' => 'btn btn-dark btn-block'
					);
					echo form_submit($atribut, 'Create');
				?>
	        </div>
	    </div>

		<?php
			echo form_close();
		?>
	</div>
</div>	