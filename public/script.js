$(function(){

    $('.tombolTambahData').on('click', function(){
        
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#id_gudang').val('');
        $('#nama_gudang').val('');
        $('#kapasitas').val('');
        $('#lokasi').val('');
        $('#operator_id_opr').val('');
        $('#admin_gudang_id_admin').val('');
    });
    
    $('.tampilModalUbah').on('click', function(){
        
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/PWEB-A9/public/gudang/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/PWEB-A9/public/gudang/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id_gudang').val(data.id_gudang);
                $('#nama_gudang').val(data.nama_gudang);
                $('#kapasitas').val(data.kapasitas);
                $('#lokasi').val(data.lokasi);
                $('#operator_id_opr').val(data.operator_id_opr);
                $('#admin_gudang_id_admin').val(data.admin_gudang_id_admin);
            }
        })

    });

});