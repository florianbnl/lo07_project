
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
          // La liste des vins est dans une variable $results             
          foreach ($results_specialite as $element) {
              echo("<tr><td>" . $element['id'] . "</td>");
              echo("<td>" . $element['label'] . "</td></tr>");
          }
          ?>
      </tbody>
    </table><br>
    
    <h4 class="text-danger">Liste des praticiens (générique)</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Id</th>
          <th scope = "col">Nom</th>
          <th scope = "col">Prenom</th>
          <th scope = "col">Adresse</th>
          <th scope = "col">Specialite</th>
        </tr>
      </thead>
      <tbody>
          <?php             
          foreach ($results_praticien as $element) {
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
          <th scope = "col">Adresse</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results_patient as $element) {
              echo("<tr><td>" . $element["nom"] . "</td>");
              echo("<td>" . $element["prenom"] . "</td>");
              echo("<td>" . $element["adresse"] . "</td></tr>");
          }
          ?>
      </tbody>
    </table><br>
    
    <h4 class="text-danger">Liste des administrateurs</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Nom</th>
          <th scope = "col">Prenom</th>
          <th scope = "col">Adresse</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results_administrateur as $element) {
              echo("<tr><td>" . $element["nom"] . "</td>");
              echo("<td>" . $element["prenom"] . "</td>");
              echo("<td>" . $element["adresse"] . "</td></tr>");
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
          foreach ($results_rendezvous as $element) {
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
  
  
  
