
<!-- ----- début viewDisponibilite -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.html';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
    <h4 class="text-danger">Liste de mes rendrez-vous</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">rdv_date</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $rdv_date) {
              echo("<tr><td>" . $rdv_date . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewDisponibilite -->
  
  
  
