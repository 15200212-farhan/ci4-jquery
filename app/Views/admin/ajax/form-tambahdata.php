<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="submitForm">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputNim" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10 col-lg-6">
              <input type="number" class="form-control" id="inputNim" name="v_nim">
              <div class="invalid-feedback fb-nim">

              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10 col-lg-6">
              <input type="text" class="form-control " id="inputNama" name="v_nama">
              <div class="invalid-feedback fb-nama">

              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputProdi" class="col-sm-2 col-form-label">Prodi</label>
            <div class="col-sm-10 col-lg-6">
              <select class="custom-select" id="inputProdi" name="v_prodi">
                <option selected>---Pilih prodi---</option>
                <option value="IK">Ilmu komunikasi</option>
                <option value="IKOM">Ilmu komputer</option>
                <option value="SI">Sistem informasi</option>
              </select>
              <div class="invalid-feedback fb-prodi">

              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10 col-lg-6">
              <input type="email" class="form-control " id="inputEmail" name="v_email">
              <div class="invalid-feedback fb-email">

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary tombol-simpan">simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#submitForm").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "<?= site_url('admin/insert-datamahasiswa'); ?>",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
          $('.tombol-simpan').attr('disabled', 1);
          $('.tombol-simpan').html('<i class="fas fa-spin fa-spinner"></i>');
        },
        complete: function() {
          $('.tombol-simpan').removeAttr('disabled');
          $('.tombol-simpan').html('simpan');
        },
        success: function(response) {

          if (response.error) {
            if (response.error.v_nim) {
              $('#inputNim').addClass('is-invalid');
              $('.fb-nim').html(response.error.v_nim);
            } else {
              $('#inputNim').removeClass('is-invalid');
            }
            if (response.error.v_nama) {
              $('#inputNama').addClass('is-invalid');
              $('.fb-nama').html(response.error.v_nama);
            } else {
              $('#inputNama').removeClass('is-invalid');
            }
            if (response.error.v_prodi) {
              $('#inputProdi').addClass('is-invalid');
              $('.fb-prodi').html(response.error.v_prodi);
            } else {
              $('#inputProdi').removeClass('is-invalid');
            }
            if (response.error.v_email) {
              $('#inputEmail').addClass('is-invalid');
              $('.fb-email').html(response.error.v_email);
            } else {
              $('#inputEmail').removeClass('is-invalid');
            }
          } else {
            Swal.fire({
              icon: 'success',
              title: 'success',
              text: response.success,
              timer: 1500,
            });

            $('#modalTambah').modal('hide');
            window.location = 'http://localhost:8080/admin/list-data';
          }

        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" +
            thrownError);
        }
      });
    });
  });
</script>