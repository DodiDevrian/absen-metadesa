
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="table" class="table table-striped table-hover" style="width:100%">
            	<thead>
            	    <tr>
                        <th>Sesi</th>
                        <th>Apakah hadir</th>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
            	        <th>Keterangan</th>
            	    </tr>
            	</thead>
            	<tbody></tbody>
            </table>
        </div>
    </div>
</div>

 <script type="text/javascript">

    $(document).ready(function() {
        //datatables

        <?php

            $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        ?>
            let id_karyawan = <?php echo array_pop($uriSegments); ?>;

            console.log(id_karyawan);

        let table = $('#table').DataTable({
            //ATUR POSISI TOMBOL & INFORMASI TABLE (PENJELASAN DI AKHIR2 VIDEO)
            'dom': '<"row dataTables_weecom"<"col-12 col-lg-4"f><"col-12 col-lg-3"l><"col-12 col-lg-5 toolbar text-right">><t><"row"<"col-6"i><"col-6"p>>',


        	//ambil data pakai ajax<lf<t>ip>
            'ajax': {
                'url': '<?php echo base_url('absensi/data/'); ?>',
                'type': 'POST',
                'data' : { 'id_karyawan' : id_karyawan},
                // success: function (data) {
                //     console.log(data.id);
                // },
        
            },
            //tambahkan data dari database ke table
            'columns': [
                {'data': 'sesi_absen'},
                {'data': 'apakah_hadir'},
                {'data': 'nama_hari'},
                {'data': 'tanggal'},
                {'data': 'waktu'},
                {'data': 'keterangan'},
            ],
            'columnDefs': [
                { 
                    'className': 'align-middle',
                    'targets'  : '_all' 
                }
            ]
        });
        <?php 
        
<<<<<<< HEAD
        if ($this->session->userdata('status')=="Karyawan Aktif" && $this->session->userdata('role')!="1") {
=======
        if ($this->session->userdata('status')=="Karyawan Aktif") {
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
         ?>
        let tombolTambah = '<a class="btn btn-success btn-sm" href="<?php echo base_url('dashboard/absensi/add/'); ?>'+id_karyawan+'"  >Absen</a>';
        $("div.toolbar").html(tombolTambah);

    <?php }

     ?>
    });
</script>