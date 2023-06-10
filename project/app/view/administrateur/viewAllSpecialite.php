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
        <h4 class="text-danger">Liste des spécialités (générique)</h4>
      <thead>
        <tr>
          <th scope = "col">Id</th>
          <th scope = "col">Label</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
              echo("<tr><td>" . $element['id'] . "</td>");
              echo("<td>" . $element['label'] . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>