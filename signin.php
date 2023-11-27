<?php
  require './inc/header.php';
?>
<div class="container">
  <section class="signin-masthead">
    <div style="margin-top: 50px;">
      <h3>Sign In</h3>
    </div>
  </section>
  <main>
    <section class="row signin-row">
      <div class="col align-self-center" style="margin-top: 20px;">
        
        <form method="post" action="./inc/validate.php">
          <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
          <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          <input class="btn btn-primary" type="submit" value="Login" style="margin-top: 20px;" />
        </form>
      </div>
    </section>
  </main>
</div>    
<?php
  require './inc/footer.php';
?>
