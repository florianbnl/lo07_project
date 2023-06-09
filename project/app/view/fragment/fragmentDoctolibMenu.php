
<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router1.php?action=doctolibAccueil">Bonelli-GUINET|</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    if (!($_SESSION["login"]=="vide")){
        switch ($_SESSION["login"]->getStatut()){
        case 0:
            echo("<a class='navbar-brand' href='router1.php?action=doctolibAccueil'>administrateur</a>");
            echo("<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'"
                    . "aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>");
            echo("<span class='navbar-toggler-icon'></span></button>");
            break;
        case 1:
            echo("<a class='navbar-brand' href='router1.php?action=doctolibAccueil'>praticien</a>");
            echo("<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'"
                    . "aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>");
            echo("<span class='navbar-toggler-icon'></span></button>");
            break;
        case 2:
            echo("<a class='navbar-brand' href='router1.php?action=doctolibAccueil'>patient</a>");
            echo("<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'"
                    . "aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>");
            echo("<span class='navbar-toggler-icon'></span></button>");
            break;
        
        default :
            break;
        }
    }
    echo("<a class='navbar-brand'>|</a>");
    
    if ($_SESSION["login"] != "vide") {
        echo("<a class='navbar-brand' href='router1.php?action=doctolibAccueil'>" . $_SESSION["login"]->getNom() . " " . $_SESSION["login"]->getPrenom() . "</a>");
        echo("<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>");
        echo("<span class='navbar-toggler-icon'></span></button>");
    }
    echo("<a class='navbar-brand'>|</a>");

    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php 
          if ($_SESSION["login"]!="vide"){
                echo("<li class='nav-item dropdown'>");
                switch ($_SESSION["login"]->getStatut()){
                    case 0:
                        echo("<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>administrateur</a>");
                        echo("<ul class='dropdown-menu'>");
                        echo("<li><a class='dropdown-item' href='router1?action=specialitesReadAll'>Liste des spécialités</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=selectionDUneSpecialite'>Sélection d'une spécialité par son id</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=specialitesCreate'>Insertion d'une spécialité</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=praticienReadSpecialites'>Liste des praticiens avec leur spécialité</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=nombrePraticiensParPatient'>Nombre de praticiens par patient</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=administrateurInfo'>Info</a></li>");
                        break;
                    case 1:
                        echo("<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>praticien</a>");
                        echo("<ul class='dropdown-menu'>");
                        echo("<li><a class='dropdown-item' href='router1?action=praticienReadDisponibilite'>Liste des disponibilités</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=ajoutDisponibilites'>Ajout de nouvelles disponibilités</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=listeRDVPraticien'>Liste des rendez-vous avec le nom des patients</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=listePatients'>Liste de mes patients (sansdoublon)</a></li>");
                        break;
                    case 2:
                        echo("<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>patient</a>");
                        echo("<ul class='dropdown-menu'>");
                        echo("<li><a class='dropdown-item' href='router1?action=patientReadInfo'>MonCompte</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=listeRDVPatient'>Liste de mes rendez-vous</a></li>");
                        echo("<li><a class='dropdown-item' href='router1?action=priseDeRDV'>Prendre un RDV avec un praticien</a></li>");
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
            <li><a class="dropdown-item" href="router1.php?action=accueilInnovation">Proposez une fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href="router1.php?action=ameliorationMVC">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=accueilLogin">Login</a></li>
            <li><a class="dropdown-item" href="router1.php?action=accueilInscription">S'inscrire</a></li>
            <li><a class="dropdown-item" href="router1.php?action=accueilDeconnexion">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentCaveMenu -->
