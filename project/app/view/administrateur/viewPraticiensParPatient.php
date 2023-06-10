<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
        <h4 class="text-danger">Nombre de praticiens par patient</h4>
      <thead>
        <tr>
          <th scope = "col">Nom du patient</th>
          <th scope = "col">Prénom du patient</th>
          <th scope = "col">Nombre de praticiens consultés</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
              echo("<tr><td>" . $element[0] . "</td>");
              echo("<td>" . $element[1] . "</td>");
              echo("<td>" . $element[2] . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>