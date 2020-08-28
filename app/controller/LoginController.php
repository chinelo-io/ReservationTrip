<?php
require_once('../model/Login.php');

$login = new Login();

switch ($_POST['opt']) {
    case 1: //login
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $login->findUserByEmail($email, $password);
        echo json_encode($result);
        break;
    case 2://saveSesion
        $idUser = $_POST['id_user'];
        $valueRole = $_POST['value_role'];
        $result = $login->saveSession($idUser, $valueRole);
        echo json_encode($result);
        break;
}
