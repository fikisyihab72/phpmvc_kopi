$(function() {

    $('.tombolTambahData').on('click', function() {
        $('#judulModal').html('Tambah Data Kopi');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama_kopi').val('');
        $('#deskripsi').val('');
        $('#harga_kopi').val('');
        $('#gambar_kopi').val('');
        $('#id_kopi').val('');
        $('.mb-3 img').attr('src', '');
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
                $('.mb-3 img').attr('src', data.gambar_kopi);
                
                //$('#gambar_kopi').val('');
                $('#id_kopi').val(data.id_kopi);
            }
        });

    });

    

});


    
document.addEventListener('DOMContentLoaded', function () {
    var imageInput = document.getElementById('gambar_kopi');
    var imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function (e) {

        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes

        if (imageInput.files.length > 0) {
            var fileSize = imageInput.files[0].size;

            if (fileSize > maxSize) {
                alert('File size is too large. Please upload an image with a maximum size of ' + (maxSize / (1024 * 1024)) + ' MB.');
                // Clear the file input to prevent submission
                imageInput.value = '';
                imagePreview.src = '';
            } else {
                var fileInput = e.target;
                var file = fileInput.files[0];
    
                if (file) {
                    var reader = new FileReader();
    
                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                    };
    
                    reader.readAsDataURL(file);
                }
            }
        } 
    });

});


