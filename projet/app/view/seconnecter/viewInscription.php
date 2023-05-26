
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.html';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>
    <h4 class="text-danger">Formulaire d'inscription</h4>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='AccueilInscrire'>
        <label class='w-25' for="nom">nom : </label><input type="text" name='nom' value=''> <br/> 
        <label class='w-25' for="prenom">prenom : </label><input type="text" name='prenom' value=''> <br/>
        <label class='w-25' for="adresse">adresse : </label><input type="text" name='adresse' value=''> <br/>
        <label class='w-25' for="login">Label : </label><input type="text" name='login' value=''> <br/>
        <label class='w-25' for="password">password : </label><input type="password" name='password' value=''> <br/> 
        <label for="statut">Votre statut : </label> <select class="form-control" id='statut' name='statut' style="width: 100px">
            <option value="ModelPersonne::ADMINISTRATEUR">administrateur</option>
            <option value="ModelPersonne::PRATICIEN">praticien</option>
            <option value="ModelPersonne::PATIENT">patient</option>
        </select> <br>
        
        <label for="specialite">Votre spécialité si vous êtes praticien : </label> <select class="form-control" id='statut' name='statut' style="width: 100px">
            <?php
            $compteur=0;
            foreach($results as $value){
                echo("<option value='$compteur'>$value</option>");
                $compteur +=1;
            }
            ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewId -->