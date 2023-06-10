<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
    <h4 class="text-danger">Mes informations</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Id</th>
          <th scope = "col">Nom</th>
          <th scope = "col">Prénom</th>
          <th scope = "col">Adresse</th>
          <th scope = "col">Login</th>
          <th scope = "col">Password</th>
          <th scope = "col">Statut</th>
          <th scope = "col">Specialité</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
              echo("<tr><td>" . $element['id'] . "</td>");
              echo("<td>" . $element['nom'] . "</td>");
              echo("<td>" . $element['prenom'] . "</td>");
              echo("<td>" . $element['adresse'] . "</td>");
              echo("<td>" . $element['login'] . "</td>");
              echo("<td>" . $element['password'] . "</td>");
              echo("<td>" . $element['statut'] . "</td>");
              echo("<td>" . $element['specialite_id'] . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>