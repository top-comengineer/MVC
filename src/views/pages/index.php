<?php require APPROOT . '/views/layout/header.php'; ?>


<script type="text/javascript">
$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "<?php echo URLROOT; ?>/entity/index"
  })
})
</script>


<?php if(isset($_SESSION['user_id'])) : ?>
<div id="entityTbl">
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>
<?php else : ?>
<div class="container">
  <div class="jumbotron jumbotron-fluid text-center">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
  </div>
</div>
<?php endif; ?>

<?php require APPROOT . '/views/layout/footer.php'; ?>