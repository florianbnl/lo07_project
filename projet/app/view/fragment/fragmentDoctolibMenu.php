
<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router1.php?action=DoctolibAccueil">Bonelli-GUINET|</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand">|</a>
    <?php
    if (!is_null($_SESSION["id"])){
        switch ($_SESSION["statut"]){
        case 0:
            echo("<a class='navbar-brand' href='router1.php?action=DoctolibAccueil'>administrateur</a>");
            echo("<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'"
                    . "aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>");
            echo("<span class='navbar-toggler-icon'></span></button>");
            break;
        case 1:
            echo("<a class='navbar-brand' href='router1.php?action=DoctolibAccueil'>praticien</a>");
            echo("<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'"
                    . "aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>");
            echo("<span class='navbar-toggler-icon'></span></button>");
            break;
        case 2:
            echo("<a class='navbar-brand' href='router1.php?action=DoctolibAccueil'>patien</a>");
            echo("<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'"
                    . "aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>");
            echo("<span class='navbar-toggler-icon'></span></button>");
            break;
        
        default :
            break;
        }
    }
    echo("<a class='navbar-brand'>|</a>");
    
    if (!is_null($_SESSION["id"])){
        echo("<a classe='navbar-brand' href='router1.php?action=DoctolibAccueil'>" . $_SESSION["prenom"] . " " . $_SESSION["nom"] ."</a>");
        echo("<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'"
                    . "aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>");
            echo("<span class='navbar-toggler-icon'></span></button>");
    }
    echo("<a class='navbar-brand'>|</a>");
    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php 
          if (!is_null($_SESSION["id"])){
                echo("<li class='nav-item dropdown>");
                switch ($_SESSION["statut"]){
                    case 0:
                        echo("<a class='nav-link-dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>administrateur</a>");
                        echo("<ul class='dropdown-menu'>");
                        echo("<li><a class='dropdown-item' href='router1?action=specialiteReadAll'>Liste des spécialités</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=specialiteReadId'>Sélection d'une spécialité par son id</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=specialiteCreate'>Insertion d'un vin</a></li><hr>");
                        echo("<li><a class='dropdown-item' href='router1?action=PersonneReadPraticienSpecialite'>Liste des praticiens avec leur spécialité</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=PersonneReadPraticiensParPatient'>Nombre de praticiens par patient</a></li>hr>");
                        echo("<li><a class='dropdown-item' href='router1?action=AdministrateurReadInfo'>Info</a></li>");
                        break;
                    case 1:
                        echo("<a class='nav-link-dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>praticien</a>");
                        echo("<ul class='dropdown-menu'>");
                        echo("<li><a class='dropdown-item' href='router1?action=RDVReadDisponibilite'>Liste des disponibilités</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=RDVCreateDisponibilite'>Ajout de nouvelles disponibilités</a></li><hr>");
                        echo("<li><a class='dropdown-item' href='router1?action=RDVReadListRDV'>Liste des rendez-vous avec le nom des patients</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=RDVReadMesPatients'>Liste de mes patients (sansdoublon)</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=AdministrateurReadInfo'>Info</a></li>");
                        break;
                    case 2:
                        echo("<a class='nav-link-dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>patient</a>");
                        echo("<ul class='dropdown-menu'>");
                        echo("<li><a class='dropdown-item' href='router1?action=PersonneReadId'>MonCompte</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=PersonneReadRDV'>Liste de mes rendez-vous</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=PersonneReadPrendreRDV'>Prendre un RDV avec un praticien</a></li>");
                        break;
                    
                    default :
                        break;
                }
                echo("</ul></li>");
            }
          ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=Achoisir">Proposez une fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href="router1.php?action=Achoisir">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=Login">Login</a></li>
            <li><a class="dropdown-item" href="router1.php?action=AccueilInscription">S'inscrire</a></li>
            <li><a class="dropdown-item" href="router1.php?action=AccueilDeconnexion">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentCaveMenu -->

