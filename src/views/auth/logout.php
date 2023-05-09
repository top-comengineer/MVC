<?php require APPROOT . '/views/layout/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto text-center">
    <div class="card card-body bg-light mt-5">
      <h2>Logout Successful</h2>
      <br>
      <div class="row">
        <div class="col">
          <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-success btn-block">
            Login Again
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/layout/footer.php'; ?>