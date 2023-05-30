
<!-- ----- début viewMonCompte -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
    <h4 class="text-danger">Liste de mes rendez-vous</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialité</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
              echo("<tr><td>" . $element->getId() . "</td>");
              echo("<td>" . $element->getNom() . "</td>");
              echo("<td>" . $element->getPrenom() . "</td>");
              echo("<td>" . $element->getAdresse() . "</td>");
              echo("<td>" . $element->getLogin() . "</td>");
              echo("<td>" . $element->getPassword() . "</td>");
              echo("<td>" . $element->getStatut() . "</td>");
              echo("<td>" . $element->getSpecialite() . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewMonCompte -->
  
  
  
