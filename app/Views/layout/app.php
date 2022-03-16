<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= esc($description); ?>">
  <meta name="author" content="<?= esc($author); ?>">
  <link href="<?= base_url() . '/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css'; ?>">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url('css/sb-admin-2.min.css'); ?> " rel="stylesheet">
  <script src="<?= base_url('vendor/jquery/jquery.min.js'); ?>"></script>
  <title><?= esc($title); ?></title>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('layout/_partials/_sidebar'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?= $this->include('layout/_partials/_topbar'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?= $this->renderSection('page-content'); ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?= $this->include('layout/_partials/_footer'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?= $this->include('layout/_partials/_scrool-top'); ?>

  <!-- Logout Modal-->
  <?= $this->include('layout/_partials/_modal-logout'); ?>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?> "></script>
  <script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>