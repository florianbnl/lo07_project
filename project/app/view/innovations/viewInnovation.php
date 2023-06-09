
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

      ?>
      <div id='map' style='width: 800px; height: 50vh;'></div>
      <script>
       mapboxgl.accessToken = 'pk.eyJ1IjoiZmxvZmxvc2giLCJhIjoiY2xpb2xvZTc0MDlxZzNmbGJmeHhhZDU0NCJ9.HRpcV6c-LpNUbBifaD5JCg';
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [2.4, 46.4],
        zoom: 4
        });
        <?php
        foreach($results as $element){
            echo("var marker = new mapboxgl.Marker()");
            echo(".setLngLat([". $element["coordinates"][0] .",". $element["coordinates"][1]."])");
            echo(".setPopup(new mapboxgl.Popup().setHTML('<h3>". $element['adresse'] . " =</h3><p>Nombre praticien =". $element['praticien']  ."</p>'))");
            echo(".addTo(map);");
        }
        ?>
      </script>


  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewId -->