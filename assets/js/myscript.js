

$('.tombol-daftar-buku').click(function() {
   const id = $(this).data('id');
   console.log(id);

   $.ajax({
         url : 'http://localhost/perpustakaan-oop-php/page/theme-backend.php?page=peminjaman&act=daftar_buku',
         method : 'post',
         dataType : 'json',
         data : {id: id},
         success: function(data) {
            console.log(data);
         },
         error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
      });
});
