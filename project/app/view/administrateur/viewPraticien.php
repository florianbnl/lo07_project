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
          <th scope = "col">Id</th>
          <th scope = "col">Nom</th>
          <th scope = "col">Prénom</th>
          <th scope = "col">Adresse</th>
          <th scope = "col">Spécialité</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
              echo("<tr><td>" . $element["id"] . "</td>");
              echo("<td>" . $element["nom"] . "</td>");
              echo("<td>" . $element["prenom"] . "</td>");
              echo("<td>" . $element["adresse"] . "</td>");
              echo("<td>" . $element["specialite"] . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>