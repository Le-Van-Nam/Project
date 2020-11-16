<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $this->title_page; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <?php if (isset($_SESSION['error'])): ?>
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
    <?php endif; ?>
    <?php if (!empty($this->error)): ?>
            <?php echo $this->error; ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
    <?php endif; ?>
    <?php echo $this->content;?>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<!-- endinject -->
</body>

</html>


