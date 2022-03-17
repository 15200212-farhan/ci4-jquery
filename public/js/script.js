const base_url = 'http://localhost:8080';

$(document).ready(function () {
  viewModalAdd();

});

function viewModalAdd(_) {
  $(".tombol-tambah").on("click", (_)=> {
   $.ajax({
     type: "get",
     url: base_url + '/admin/modal-tambah',
     dataType: "json",
     success: function (response) {
        $('.view-modal').html(response.data).show();
        $('#modalTambah').modal('show'); 
     },
     error: function(xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" +
        thrownError);
    }
   });
  });
} 


function editData(id) {
  $.ajax({
    type: "get",
    url: base_url + '/admin/modal-edit',
    data: {id:id},
    dataType: "json",
    success: function (response) {
      if(response.success) {
        $('.view-modal').html(response.success).show();
        $('#modalEdit').modal('show');
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" +
        thrownError);
    }
  });
}

function hapusData(id) {
  Swal.fire({
    title: 'Hapus',
    text: `Yakin ingin menghapus nim (${id}) ini?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya',
    cancelButtonText: 'tidak',
  }).then((result) => {
    if (result.value) {
        $.ajax({
            type: "post",
            url: base_url + '/admin/hapus-data',
            data: {id: id},
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success,
                    });
                   window.location = base_url + '/admin/list-data';
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
      }
  });
}