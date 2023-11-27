<!-- Here we will add our header file. -->
<?php require ('./inc/header.php'); ?>
<div class="container" style="margin-top: 40px; width: 60%; margin-bottom: 40px">
  <main>  
        <h3>Admin Sign in Here Please</h3>
        <form method="post" action="./inc/validate.php">
        	<p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
        	<p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          <input class="btn btn-primary" type="submit" value="Login" />
        </form>
      
    
  </main>
  
</div>
<!-- Let's add our footer file. -->
<?php require ('./inc/footer.php'); ?>
