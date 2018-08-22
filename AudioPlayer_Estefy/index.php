<?php
  // connexion à la base de données
  include 'include/connexion.php';

  // tableau Json avec les données dans music
  $req = $bdd->query('SELECT * FROM music');
  $musics = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Estefy | Music Player</title>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script>
  var musics = <?=json_encode($musics)?>;
  var indexRunningTrack = 0;
  

  var audio = new Audio(musics[indexRunningTrack]["file_path"]);
</script>
</head>

<body>
 
    <div id="player" class="container">
      <div class="album">
      <!--<script>
        var covers = document.querySelector(".album");
        covers.style.background = "url("<?= $musics[1]['cover']?>")";
      </script> -->
      
        <div class="heart"><i class="fas fa-heart"></i></div>
      </div>
      <div class="info">
        <div class="progress-bar">
          <div id="time-current">0:00</div>
          <div id="time-total"><?= $musics[0]['time']?></div>
          <div id="fill"></div>
        </div>
        <div class="currently-playing">
          <h2 id="song-name"> <?= $musics[0]['title']?> </h2>
          <h3 id="artist-name"> <?= $musics[0]['author']?> </h3>
        </div>
      
        <div class="controls">
          <div class="option"><i class="fas fa-bars"></i></div>
          <div class="volume muted"><i class="fas fa-volume-up"></i></div>
          <div class="previous" onclick="PlayPreviousSongOnClick()"><i class="fas fa-backward"></i></div>
          <div class="play"><i class="fas fa-play"></i></div>
          <div class="pause"><i class="fas fa-pause"></i></div>
          <div class="next" onclick="PlayNextSongOnClick()"><i class="fas fa-forward"></i></div>
          <div class="shuffle"><i class="fas fa-random"></i></div>
          <div class="add"><i class="fas fa-plus"></i></div>
        </div>
    </div>
</div>
<script>

function PlayNextSongOnClick() {
  var ElsName =document.getElementById("artist-name");
  var ElsTitle = document.getElementById("song-name");
  var ElsDuration = document.getElementById("time-total");

  indexRunningTrack = indexRunningTrack+1;
  ElsName.innerHTML = musics[indexRunningTrack]['author'];
  ElsTitle.innerHTML = musics[indexRunningTrack]['title'];
  ElsDuration.innerHTML = musics[indexRunningTrack]['time'];

  audio.src = musics[indexRunningTrack]["file_path"];
  audio.load();
  audio.play();
}

function PlayPreviousSongOnClick() {
  var ElsName =document.getElementById("artist-name");
  var ElsTitle = document.getElementById("song-name");
  var ElsDuration = document.getElementById("time-total");

  indexRunningTrack = indexRunningTrack-1;
  ElsName.innerHTML= musics[indexRunningTrack]['author'];
  ElsTitle.innerHTML= musics[indexRunningTrack]['title'];
  ElsDuration.innerHTML = musics[indexRunningTrack]['time'];

  audio.src = musics[indexRunningTrack]["file_path"];
  audio.load();
  audio.play();
}

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.js"></script>

<script  src="js/essai.js"></script>
</body>

</html>
