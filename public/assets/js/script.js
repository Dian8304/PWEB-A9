$(function(){

    $('.tombolTambahData').on('click', function(){
        
        $('#formModalLabel').html('Tambah Data Gudang');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#id_gudang').val('');
        $('#nama_gudang').val('');
        $('#kapasitas').val('');
        $('#lokasi').val('');
        $('#operator_id_opr').val('');
        $('#admin_gudang_id_admin').val('');
    });
    
    $('.tampilModalUbah').on('click', function(){
        
        $('#formModalLabel').html('Ubah Data Gudang');
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

    $('.tombolTambahDataPanen').on('click', function(){
        
        $('#formModalLabel').html('Tambah Data Hasil Panen');
        $('.modal-footer button[type=submit]').html('Simpan');
        $('#id_panen').val('');
        $('#tanggalPanen').val('');
        $('#jumlah').val('');
        $('#jenisBuah').val('');
        $('#wilayah').val('');
        $('#namaGudang').val('');
    });

    $('.tampilModalUbahPanen').on('click', function(){
        
        $('#formModalLabel').html('Ubah Data Hasil Panen');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/PWEB-A9/public/panen/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/PWEB-A9/public/panen/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id_panen').val(data.id_panen);
                $('#tanggal').val(data.tanggal);
                $('#jumlah').val(data.jumlah);
                $('#jenis_buah_naga_id_jenis').val(data.jenis_buah_naga_id_jenis);
                $('#wilayah_kebun_id_wilayah').val(data.wilayah_kebun_id_wilayah);
                $('#gudang_penyimpanan_id_gudang').val(data.gudang_penyimpanan_id_gudang);
            }
        })
    });
});