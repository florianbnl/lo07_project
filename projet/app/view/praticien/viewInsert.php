
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.html';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?> 
    <h4 class="text-danger">Ajout de nouvelles disponibilités</h4>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='PraticienCreated'>        
        <label class='w-25' for="rdv_date">rdv_date : </label><input id='rdv_date' type="date" name='rdv_date' min='<?php echo date('Y-m-d');?>'> <br/> 
        <label class='w-25' for="rdv_nombre">rdv_nombre : </label><input type="text" name='rdv_nombre' value=''> <br/> 
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInsert -->



