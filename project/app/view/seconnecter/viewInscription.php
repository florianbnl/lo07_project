<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

      ?>
    <h4 class="text-danger">Formulaire d'inscription</h4>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='accueilInscrire'>
        <label class='w-25' for="nom">Nom : </label><input type="text" name='nom' value=''> <br/> 
        <label class='w-25' for="prenom">Prénom : </label><input type="text" name='prenom' value=''> <br/>
        <label class='w-25' for="adresse">Adresse : </label><input type="text" name='adresse' value=''> <br/>
        <label class='w-25' for="login">Label : </label><input type="text" name='login' value=''> <br/>
        <label class='w-25' for="password">Password : </label><input type="password" name='password' value=''> <br/> 
        <label for="statut">Votre statut : </label> <select class="form-control" id='statut' name='statut' style="width: 100px">
            <option value=0>Administrateur</option>
            <option value=1>Praticien</option>
            <option value=2>Patient</option>
        </select> <br>
        
        <label for="specialite">Votre spécialité si vous êtes praticien : </label> <select class="form-control" id='specialite' name='specialite_id' style="width: 200px">
            <?php
            foreach($results as $value){
                echo("<option value='" . $value["id"] . "'>". $value["id"] . " : " . $value["label"]. "</option>");
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