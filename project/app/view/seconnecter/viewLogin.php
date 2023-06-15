<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

      ?>
    <h4 class="text-danger">Formulaire de connexion</h4>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='accueilLogined'>
        <label class='w-25' for="login">Login : </label><input type="text" name='login' value=''> <br/>
        <label class='w-25' for="password">Password : </label><input type="password" name='password' value='secret'> <br/> 
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>