
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.html';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>
    <h4 class="text-danger">Sélection spécialité par son id</h4>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='SpecialiteReadOne'>
        <label for="id">id : </label> <select class="form-control" id='id' name='id' style="width: 100px">
            <?php
            foreach ($results as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewId -->