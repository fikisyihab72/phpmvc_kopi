$(function() {

    $('.tombolTambahData').on('click', function() {
        $('#judulModal').html('Tambah Data Kopi');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama_kopi').val('');
        $('#deskripsi').val('');
        $('#harga_kopi').val('');
        $('#gambar_kopi').val('');
        $('#id_kopi').val('');
    });

    $('.tampilModalUpdate').on('click', function() {
        $('#judulModal').html('Update Data Kopi');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/update');

        const id_kopi = $(this).data('id_kopi');
        
        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getupdate',
            data: {id_kopi : id_kopi},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama_kopi').val(data.nama_kopi);
                $('#deskripsi').val(data.deskripsi);
                $('#harga_kopi').val(data.harga_kopi);
                $('#gambar_kopi').val(data.gambar_kopi);
                $('#id_kopi').val(data.id_kopi);
            }
        });

    });
}

);