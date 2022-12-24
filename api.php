<?php

include __DIR__.'/connect.php';

function addFoto($db){
  if(!empty($_FILES['file'])){
  $file = $_FILES['file'];
  $name = $file['name'];
  $pathFile = __DIR__.'/img/'.$name;

  if(!move_uploaded_file($file['tmp_name'], $pathFile)){
    echo "";
  }
}
  return $name;
}

function getTopFilm($db){
  $sql = "SELECT * FROM `video` ORDER BY `mark` DESC LIMIT 4;
          ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_video']] = $row;
  }
  return $resualt;
}

function getTopActor($db){
  $sql = "
SELECT actors.*, COUNT(actors.id_actors) 
FROM actor_vid JOIN actors ON actor_vid.id_actorss=actors.id_actors 
GROUP BY id_actors ORDER BY 7 DESC LIMIT 4;
          ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_actors']] = $row;
  }
  return $resualt;
}

function getAllvideo($db) {
  $sql = "SELECT * FROM video
          INNER JOIN `country` ON video.id_country = country.id_country
          INNER JOIN `producer` ON video.id_producer = producer.id_producer
          INNER JOIN `genre` ON video.id_genre = genre.id_genre;          
          ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_video']] = $row;
  }
  return $resualt;
}

function getAlltrailer($db, $id_videos) {
  $sql = "SELECT * FROM video INNER JOIN `country` ON video.id_country = country.id_country
          INNER JOIN `producer` ON video.id_producer = producer.id_producer
          INNER JOIN `genre` ON video.id_genre = genre.id_genre
           WHERE id_video LIKE ". $id_videos ."
  ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_video']] = $row;
  }
  return $resualt;
}

function getActor($db, $id_actor) {
  $sql = "SELECT * FROM actors INNER JOIN `country` ON actors.id_country = country.id_country
          
           WHERE id_actors LIKE ". $id_actor ."
  ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_actors']] = $row;
  }
  return $resualt;
}

function getActorByVid($db, $id_video) {
  $sql = "SELECT actors.* FROM `video` JOIN actor_vid ON actor_vid.id_videoo=video.id_video JOIN `actors` ON actors.id_actors=actor_vid.id_actorss  WHERE video.id_video = $id_video;

  ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_actors']] = $row;
  }
  return $resualt;
}

function getVideoByAct($db, $id_actor) {
  $sql = "SELECT video.*, genre.*, producer.*, country.* FROM `actors` JOIN actor_vid ON actor_vid.id_actorss=actors.id_actors JOIN `video` ON video.id_video=actor_vid.id_videoo INNER JOIN `country` ON video.id_country = country.id_country INNER JOIN `producer` ON video.id_producer = producer.id_producer INNER JOIN `genre` ON video.id_genre = genre.id_genre WHERE actors.id_actors = $id_actor;

  ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_video']] = $row;
  }
  return $resualt;
}

function getSomeVideo($db, $name) {

  if($name == null){
    $sql = "SELECT * FROM video
          INNER JOIN `country` ON video.id_country = country.id_country
          INNER JOIN `producer` ON video.id_producer = producer.id_producer
          INNER JOIN `genre` ON video.id_genre = genre.id_genre;
          ";
  }

  $sql = "SELECT * FROM video INNER JOIN `country` ON video.id_country = country.id_country INNER JOIN `producer` ON video.id_producer = producer.id_producer INNER JOIN `genre` ON video.id_genre = genre.id_genre 
  WHERE fname LIKE '%" .$name."%'
          
          ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_video']] = $row;
  }
  return $resualt;
}

function getSomeActors($db, $names){
  if($names == null){
    $sql = "SELECT * FROM actors
          INNER JOIN `country` ON actors.id_country = country.id_country;
          ";
  }

  $sql = "SELECT * FROM `actors` INNER JOIN `country` ON actors.id_country = country.id_country WHERE name LIKE '%".$names."%' OR secName LIKE '%".$names."%'
          
          ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_actors']] = $row;
  }
  return $resualt;
}



function getAllactors($db) {
  $sql = "SELECT * FROM actors
          INNER JOIN `country` ON actors.id_country = country.id_country;
  ";
  $resualt = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resualt[$row['id_actors']] = $row;
  }
  return $resualt;
}

function getAllgenre($db) {
  $sql = "SELECT * FROM genre";
  $res = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $res[$row['id_genre']] = $row;
  }
  return $res;
}

function getAllcountry($db) {
  $sql = "SELECT * FROM country";
  $res = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $res[$row['id_country']] = $row;
  }
  return $res;
}

function getUser($db, $login, $password){
 $sql = "SELECT * FROM `user` WHERE `login` = '$login' AND `pass` = '$password'";
  $res = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $res[$row['id_user']] = $row;
  }
  return $res; 
}

function getAllproducer($db) {
  $sql = "SELECT * FROM producer";
  $res = array();
  $stmt = $db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $res[$row['id_producer']] = $row;
  }
  return $res;
}

function ADDvideo($db, $videoname, $videogenre, $videomark, $videodata, $videocountry, $videoproducer, $videotrail, $videodiscr) {
  
$foto=addFoto($db);

$sql = "INSERT INTO `video` (`fname`, `mark`, `releas`, `id_country`, `id_producer`, `id_genre`, `trailer`, `discr`, `photo`)
        VALUES ('$videoname', '$videomark', '$videodata', '$videocountry', '$videoproducer', '$videogenre', '$videotrail', '$videodiscr', '$foto')
      ";
$stmt = $db->prepare($sql);
$stmt->execute();
}

function addUser($db, $username, $login, $password, $email, $phone){
  $sql= "INSERT INTO `user` (`login`,`userName`,`pass`, `email`, `phone`) VALUES('$login', '$username', '$password', '$email', '$phone')";

$stmt = $db->prepare($sql);
$stmt->execute();

}

function ADDactor($db, $actorname, $actorsname, $actordate, $actorcountry) {

$foto=addFoto($db);

$sql = "INSERT INTO `actors` (`secName`, `name`, `act_birth`, `id_country`, `actor_photo`) VALUES ('$actorname', '$actorsname', '$actordate', '$actorcountry', '$foto')";
$stmt = $db->prepare($sql);
$stmt->execute();
}

function addContacts($db, $actor_id, $video_id){
  $sql = "INSERT INTO `actor_vid` (`id_videoo`, `id_actorss`) VALUES ('$video_id', '$actor_id')";
$stmt = $db->prepare($sql);
$stmt->execute();  
}

function UPDATEvideo($db,$id_video, $videoname, $videogenre, $videomark, $videodata, $videocountry, $videoproducer, $videotrail, $videodiscr) {

$foto= addFoto($db);

$sql = "UPDATE `video` SET `fname` = '$videoname', `id_genre` = '$videogenre', `mark` = '$videomark', `releas` = '$videodata', `id_country` = '$videocountry', `id_producer` = '$videoproducer', `discr` = '$videodiscr', `trailer` = '$videotrail', `photo` = '$foto' WHERE `video`.`id_video` = $id_video";
$stmt = $db->prepare($sql);
$stmt->execute();
}

function UPDATEactor($db, $actorname,$id_actor , $actorsname, $actordate, $actorcountry) {
$sql = "UPDATE `actors` SET `secName` = '$actorsname', `name` = '$actorname', `act_birth` = '$actordate', `id_country` = '$actorcountry' WHERE `actors`.`id_actors` = $id_actor";
$stmt = $db->prepare($sql);
$stmt->execute();
}


function DELETEvideo($db, $id_video) {
$sql = "DELETE FROM `video` WHERE `video`.`id_video` = $id_video";
$stmt = $db->prepare($sql);
$stmt->execute();
}

function DELETEactor($db, $id_actor) {
  $sql = "DELETE FROM `actors` WHERE `actors`.`id_actors` = $id_actor";
  $stmt = $db->prepare($sql);
  $stmt->execute();
}?>
