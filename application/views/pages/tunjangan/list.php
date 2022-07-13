<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="table" class="table table-striped table-hover" style="width:100%">
            	<thead>
            	    <tr>
            	        <th>Nama Karyawan</th>
                        <th>Kategori</th>
                        <th>Nominal</th>
            	        <th>Status</th>
            	        <th colspan="2">&nbsp;</th>
                        <th colspan="2">&nbsp;</th>
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
        $('#table').DataTable({
            //ATUR POSISI TOMBOL & INFORMASI TABLE (PENJELASAN DI AKHIR2 VIDEO)
            'dom': '<"row dataTables_weecom"<"col-12 col-lg-4"f><"col-12 col-lg-3"l><"col-12 col-lg-5 toolbar text-right">><t><"row"<"col-6"i><"col-6"p>>',

        	//ambil data pakai ajax
            'ajax': {
                'url': '<?php echo base_url('tunjangan/data'); ?>',
                'type': 'POST'
            },

            //tambahkan data dari database ke table
            'columns': [
                {'data': 'nama_depan'},
                {'data': 'nama_kategori'},
                {'data': 'nominal'},
                {'data': 'status'}
            ],
            'columnDefs': [
                {
                    //bikin tombol
                    'render': function (data, type, row ) {
                        return row.nama_depan+' '+row.nama_belakang;
                    },
                    'targets': 0
                },
                {
                    //bikin tombol
                    'render': function (data, type, row ) {
                        function formatRupiah(angka, prefix){
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split           = number_string.split(','),
                        sisa            = split[0].length % 3,
                        rupiah          = split[0].substr(0, sisa),
                        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

                        // tambahkan titik jika yang di input sudah menjadi angka ribuan
                        if(ribuan){
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                    }
                        return formatRupiah(row.nominal, 'Rp. ');
                    },
                    'targets': 2
                },
                {
                	//bikin tombol
                    'render': function (data, type, row ) {
                    	let btnEdit = '<a class="btn btn-dark btn-sm" href="<?php echo base_url('dashboard/gaji-dan-tunjangan/edit/'); ?>'+row.id+'">EDIT</a>';

                        return btnEdit;
                    },
                    'targets': 4
                },
                {
                    //bikin tombol
                    'render': function (data, type, row ) {
<<<<<<< HEAD
                        let btnDelete = '<a class="btn btn-danger btn-sm" href="<?php echo base_url('dashboard/gaji-dan-tunjangan/delete/'); ?>'+row.id+'">DELETE</a>';
=======
                        let btnDelete = '<a class="btn btn-danger btn-sm" href="<?php echo base_url('dashboard/gaji-dan-tunjangan/edit/'); ?>'+row.id+'">DELETE</a>';
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a

                        return btnDelete;
                    },
                    'targets': 5
                },
				{ 
					'className': 'align-middle',
					'targets'  : '_all' 
				}
            ]
        });

        let tombolTambah = '<a class="btn btn-success btn-sm" href="<?php echo base_url('dashboard/gaji-dan-tunjangan/add/'); ?>">+ Setting Gaji & Tunjangan</a>';
        $("div.toolbar").html(tombolTambah);
    });
</script>