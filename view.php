<?php
  // Include database file
  require ('./inc/header.php');

    include ('./inc/database.php');
    $recordsObj = new database();
?>

<main class="container">
  <?php
    if (isset($_GET['msg1']) && $_GET['msg1'] === "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            Your Registration added successfully
          </div>";
    }
  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
      $(".alert .close").on("click", function(e) {
          $(this).parent().hide();
      });
  });
  </script>
  <section>
    <h2 style="margin-top: 30px;">Student Details
      <a href="delete.php" style="float:right;"><button class="btn btn-danger">Remove<i class="fas fa-plus"></i></button></a>
      <a href="update.php" style="float:right; margin-right: 10px;"><button class="btn btn-primary">Update<i class="fas fa-plus"></i></button></a>
      <a href="add.php" style="float:right; margin-right: 10px;"><button class="btn btn-success">Add<i class="fas fa-plus"></i></button></a>
    </h2>
    <table class="table table-hover table-striped table-active"  style="margin-top: 30px;">
      <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Grade</th>
        <th>Image</th>
      </tr>
      </thead>
      <tbody>
      <?php
      $records = $recordsObj->displayData();
      foreach ($records as $record) {
        ?>
        <tr>
          <td><?php echo $record['id'] ?></td>
          <td><?php echo $record['name'] ?></td>
          <td><?php echo $record['email'] ?></td>
          <td><?php echo $record['phone'] ?></td>
          <td><?php echo $record['grade'] ?></td>
          <td><img src="img/<?php echo basename($record["image"]); ?>"height="100" width="100" title="<?php echo $record['image']; ?>"></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </section>
</main>

<?php require ('./inc/footer.php'); ?>
</body>
</html>