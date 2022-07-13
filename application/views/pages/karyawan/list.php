<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="table" class="table table-striped table-hover" style="width:100%">
            	<thead>
            	    <tr>
            	        <th>Nama Lengkap</th>
            	        <th>Jenis Kelamin</th>
            	        <th>Email</th>
            	        <th>Handphone</th>
                        <th>Status</th>
<<<<<<< HEAD
                        <th colspan="2">&nbsp;</th>
                        <th colspan="2">&nbsp;</th>
=======
                        <th>Action</th>
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
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
        let table = $('#table').DataTable({
            'dom':'<"row dataTables_weecom"<"col-12 col-lg-4"f><"col-12 col-lg-3"l><"col-12 col-lg-5 toolbar text-right">><t><"row"<"col-6"i><"col-6"p>>',

        	//ambil data pakai ajax<lf<t>ip>
            'ajax': {
                'url': '<?php echo base_url('karyawan/data'); ?>',
                'type': 'POST'
            },
            //tambahkan data dari database ke table
            'columns': [
                {'data': 'nama_depan'},
                {'data': 'jenis_kelamin'},
                {'data': 'email'},
                {'data': 'nomor_hp'},
                {'data': 'status'},
            ],
            'columnDefs': [
                {
                	//gabungin nama depan dan nama belakang
                    'render': function ( data, type, row ) {
                        return row.nama_depan + ' ' + row.nama_belakang;
                    },
                    'targets': 0 //target kolom yg diinginkan, kolom pertama dimulai dari 0
                },{
                    'render': function ( data, type, row ) {
                        if (row.status != 'Karyawan Aktif') {
                            return '<p style="color:red;"> '+row.status+'</p>'
                        }else{
                            return '<p style="color:black;"> '+row.status+'</p>'
                        }
                    },
                    'targets': 4
                },
<<<<<<< HEAD
                // {
                //     //bikin tombol
                //     'render': function (data, type, row ) {
                //         let btnDetail = '<a class="btn btn-secondary btn-sm" href="<?php echo base_url('dashboard/karyawan/detail/'); ?>'+row.id+'">DETAIL</a>';

                //         return btnDetail;
                //     },
                //     'targets': 5
                // },
=======
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
                {
                	//bikin tombol
                    'render': function (data, type, row ) {
                    	let btnEdit = '<a class="btn btn-dark btn-sm" href="<?php echo base_url('dashboard/karyawan/edit/'); ?>'+row.id+'">EDIT</a>';

                        return btnEdit;
                    },
                    'targets': 5
                },
<<<<<<< HEAD
                {
                    //bikin tombol
                    'render': function (data, type, row ) {
                        let btnDelete = '<a class="btn btn-danger btn-sm" href="<?php echo base_url('dashboard/karyawan/delete/'); ?>'+row.id+'">DELETE</a>';

                        return btnDelete;
                    },
                    'targets': 6
                },
=======
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
				{ 
					'className': 'align-middle',
					'targets'  : '_all' 
				}
            ]
        });
        let tombolTambah = '<a class="btn btn-success btn-sm" href="<?php echo base_url('dashboard/karyawan/add/'); ?>">+ Tambah Karyawan</a>'; $("div.toolbar").html(tombolTambah);

    });
</script>