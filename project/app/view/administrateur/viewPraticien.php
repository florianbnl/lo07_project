
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
    <h4 class="text-danger">Liste des praticiens (générique)</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">specialite</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
              echo("<tr><td>" . $element["id"] . "</td>");
              echo("<td>" . $element["nom"] . "</td>");
              echo("<td>" . $element["prenom"] . "</td>");
              echo("<td>" . $element["adresse"] . "</td>");
              echo("<td>" . $element["specialite_id"] . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  
