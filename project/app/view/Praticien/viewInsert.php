
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?> 
    <h4 class="text-danger">Ajout de nouvelles disponibilités</h4>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='disponibilitesAjoutees'>        
        <label class='w-25' for="label">rdv_date : </label><input type="date" name='rdv_date' value=''> <br/>
        <label class='w-25' for="label">rdv_nombre : </label><input type="number" name='rdv_nombre' value=''> <br/>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInsert -->



