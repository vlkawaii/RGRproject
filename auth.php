<?php

include 'api.php';
include 'connect.php';

 $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
 $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

 $password = md5($password."fn34iysa432");

 $user=getUser($db, $login, $password);
 if (count($user)==0) {
 	echo "Пользователь не найден";
 	exit();

 }

foreach ($user as $userr) {
     if ($userr['login']=="admin" && $userr['pass']=="a0fbe42fe074dab8a34978d1c75809d7") {
        setcookie('admin', "Admin", time()+3600*24, "/");     

 }else{
setcookie('user', $userr['userName'], time()+3600*24, "/");
}
}

header('Location: index.php');
?>