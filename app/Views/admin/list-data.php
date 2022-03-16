<?= $this->extend('layout/app'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">


  <div class="list-data">
    <div class="card shadow mb-4">
      <div class="card-header bg-primary py-3">
        <h6 class="m-0 font-weight-bold text-white">LIST DATA MAHASISWA</h6>
      </div>
      <div class="card-body">
        <div class="card-text mb-3">

          <button type="button" class="btn btn-dark tombol-tambah">
            <i class="fas fa-plus text-white"> Data baru</i>
          </button>

        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="tbody_listdata">

              <?php
              $i = 1;
              $no = 1;
              foreach ($mahasiswa as $v_mahasiswa) :

              ?>

                <?php if ($i++ % 2 == 2) : ?>

                  <tr class="active">
                  <?php else : ?>
                  <tr>
                  <?php endif; ?>
                  <td><?= $no++; ?></td>
                  <td><?= $v_mahasiswa['nim']; ?></td>
                  <td class="text-lowercase text-dark"><?= $v_mahasiswa['nama']; ?></td>
                  <td class="text-lowercase  text-dark"><?= $v_mahasiswa['prodi']; ?></td>
                  <td class="text-dark"><?= $v_mahasiswa['email']; ?></td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm tombol-edit d-inline">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm tombol-hapus d-inline">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                  </tr>

                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="view-modal" style="display: none;"></div>

</div>

<script src="<?= base_url() . '/vendor/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?= base_url() . '/vendor/datatables/dataTables.bootstrap4.min.js'; ?>"></script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();

    viewModalTambah();
  });

  function viewModalTambah(_) {

    $('.tombol-tambah').on('click', function(_) {
      $.ajax({
        type: "post",
        url: "<?= site_url('admin/form-tambahdata'); ?>",
        dataType: "json",
        success: function(response) {
          $('.view-modal').html(response.data).show();
          $('#modalTambah').modal('show');
        }
      });
    })

  }
</script>

<?= $this->endSection(); ?>