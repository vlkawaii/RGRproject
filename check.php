<?php

include 'api.php';
include 'connect.php';
 
 $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
 $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
 $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
 $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
 $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

function clear_data($val){
	$val = trim($val);
	$val = stripslashes($val);
	$val = strip_tags($val);
	$val = htmlspecialchars($val);
	return $val;
}

$pattern_phone = "/^\+380\d{3}\d{2}\d{2}\d{2}$/";
$patern_lang = '/^.*[^А-Яа-яёЁЇїІіЄєҐґШшЩщУуХхРрТтЬьЮю ].*$/';
$pattern_lat = '/^.*[a-z0-9].*$/';
$err=[];
$flag =0;

if(!preg_match($pattern_lat, $login)){
	$err['login'] = '<small class = "text-danger">Тільки латинські букви та цифри!!!</small>';
	$flag=1;
}

if (empty($login)) {
	$err['login'] = '<small class = "text-danger">Поле не може бути пустим!</small>';
	$flag = 1;
}

if(preg_match($patern_lang, $username)){
	$err['name'] = '<small class = "text-danger">Солв`їною будь-ласка!!!</small>';
	$flag=1;
}

if (empty($username)) {
	$err['name'] = '<small class = "text-danger">Поле не може бути пустим!</small>';
	$flag = 1;
}

if(!preg_match($pattern_phone, $phone)){
	$err['phone'] = '<small class = "text-danger">Не правильний запис номеру. (+380)!</small>';
	$flag=1;
}
if (empty($phone)) {
	$err['phone'] = '<small class = "text-danger">Поле не може бути пустим!</small>';
	$flag = 1;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$err['email'] = '<small class = "text-danger">Пошта записана не коректно!</small>';
	$flag = 1;
}
if (empty($email)) {
	$err['email'] = '<small class = "text-danger">Поле не може бути пустим!</small>';
	$flag = 1;
}
if (mb_strlen($password)<4|| mb_strlen($password)>8) {
	$err['password'] = '<small class = "text-danger">Довжина пароля має складати 4-8 символів!</small>';
	$flag = 1;
}
if (empty($password)) {
	$err['password'] = '<small class = "text-danger">Поле не може бути пустим!</small>';
	$flag = 1;
}

if ($flag==0) {
	$password = md5($password."fn34iysa432");
	
	header('index.php');
	addUser($db, $username, $login, $password, $email, $phone);
	$err['success'] = '<small class = "text-success">Регістрація пройшла успішно!</small>';
	
}
?>