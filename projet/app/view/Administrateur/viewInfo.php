
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.html';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
        <h4 class="text-danger">Liste des spécialités (générique)</h4>
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">Label</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
              echo("<tr><td>" . $element->getId() . "</td>");
              echo("<td>" . $element->getLabel() . "</td></tr>");
          }
          ?>
      </tbody>
    </table><br>
    
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
              echo("<td>" . $element["specialite"] . "</td></tr>");
          }
          ?>
      </tbody>
    </table><br>
    
    <h4 class="text-danger">Liste des patients</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Nom</th>
          <th scope = "col">Prenom</th>
          <th scope = "col">adresse</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
              echo("<tr><td>" . $element->getNon() . "</td>");
              echo("<td>" . $element->getPrenom() . "</td>");
              echo("<td>" . $element->getAdresse() . "</td></tr>");
          }
          ?>
      </tbody>
    </table><br>
    
    <h4 class="text-danger">Liste des administrateur</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Nom</th>
          <th scope = "col">Prenom</th>
          <th scope = "col">adresse</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
              echo("<tr><td>" . $element->getNon() . "</td>");
              echo("<td>" . $element->getPrenom() . "</td>");
              echo("<td>" . $element->getAdresse() . "</td></tr>");
          }
          ?>
      </tbody>
    </table><br>
    
    <h4 class="text-danger">Liste des rendrez-vous</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Nom (patient)</th>
          <th scope = "col">Prenom (patient)</th>
          <th scope = "col">Nom (praticien)</th>
          <th scope = "col">Prenom (praticien)</th>
          <th scope = "col">rdv_date</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
              echo("<tr><td>" . $element["nom_patient"] . "</td>");
              echo("<td>" . $element["prenom_patient"] . "</td>");
              echo("<td>" . $element["nom_praticien"] . "</td>");
              echo("<td>" . $element["prenom_praticien"] . "</td>");
              echo("<td>" . $element["rdv_date"] . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  
