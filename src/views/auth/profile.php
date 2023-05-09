<?php require APPROOT . '/views/layout/header.php'; ?>

<div class="container emp-profile">
  <form method="post">
    <div class="row">
      <div class="col-md-10">
        <div class="profile-head">
          <h3>
            <?php echo $_SESSION['user_name'] ?>
          </h3>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">About</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-2">
        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tab-content profile-tab" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="row">
              <div class="col-md-6">
                <label>Name</label>
              </div>
              <div class="col-md-6">
                <p><?php echo $_SESSION['user_name'] ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Email</label>
              </div>
              <div class="col-md-6">
                <p><?php echo $_SESSION['user_email'] ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Created Date</label>
              </div>
              <div class="col-md-6">
                <p>05/08/2023</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<?php require APPROOT . '/views/layout/footer.php'; ?>