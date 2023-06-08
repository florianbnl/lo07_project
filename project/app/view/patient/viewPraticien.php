
<!-- ----- début viewPraticien -->
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>
    <h4 class="text-danger">Sélection d'un praticien</h4>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='disponibilitesPraticien'>
        <label for="id">ID : </label> <select class="form-control" id='id' name='id' style="width: 200px">
            <?php
            foreach ($results as $value) {
             echo ("<option value=" . $value['id'] . ">". $value['nom'] . " " . $value['prenom'] . " spécialité : " . $value['specialite']  ."</option>");
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

  <!-- ----- fin viewPraticien -->