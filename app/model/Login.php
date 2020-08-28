<?php

require_once('../security/WebLogic.php');
require_once('../config/DatabaseConnection.php');

class Login
{
    public static $URL_ADMIN = './admin/index.php';
    public static $URL_USER = './user/index.php';

    public static $ROLE_ADMIN = 'ROLE_ADMIN';
    public static $ROLE_USER = 'ROLE_USER';

    public function findUserByEmail($email, $password)
    {
        if ($email ==  null) {
            throw new Exception("El Email es obligatorio para realizar esta acción.");
        }
        if ($password == null) {
            throw new Exception("La Contraseña es obligatoria para realizar esta acción.");
        }

        $webLogic = new WebLogic();
        $password = $webLogic->encryptDecrypt('encrypt', $password);

        $database = new DatabaseConnection();
        $connection = $database->getConnection();

        //echo 'Este texto ' . 'y este también irán unidos';
        //También puedes colocar comillas con el o sin el texto
        //echo '"Este texto unido'.' '.'con este saldrá entre comillas"';
        //si la quieres simple, solo invierte las comillas, aunque en lo general las comillas,
        //echo "'este es un texto con comillas simples "."unido a otro'";

        $query = "SELECT  u.id AS id_user, u.name AS name_user, f.id AS id_factory, f.name AS name_factory, r.id AS id_role, r.name AS name_role, r.value AS value_role
                FROM  user AS u  INNER JOIN user_has_role AS uhr ON uhr.user_id = u.id INNER JOIN role AS r ON r.id = uhr.role_id 
                LEFT JOIN factory AS f ON f.id = u.factory_id WHERE r.status = true AND uhr.status = true 
                AND u.status = true AND f.status = true
                AND u.email ='" . $email . "' AND u.password = '" . $password . "'";
        try {
            $executeQuery = $connection->query($query);
            $result = array();
            while ($row = $executeQuery->fetch_assoc()) {
                $row['id_user'] = $webLogic->encryptDecrypt('encrypt', $row['id_user']);
                $row['id_role'] = $webLogic->encryptDecrypt('encrypt', $row['id_role']);
                $row['id_factory'] = $webLogic->encryptDecrypt('encrypt', $row['id_factory']);
                $result[] = $row;
            }
            if (count($result) == 0) {
                return null;
            } else {
                return $result;
            }
        } catch (Exception $exception) {
            throw new Exception("Ocurrió un errro al obtener los datos de logion. " . $exception->getMessage());
        } finally {
            if ($connection != null) {
                $connection->close();
            }
        }
    }

    public function saveSession($idUser, $valueRole)
    {
        if ($idUser == null) {
            throw new Exception('El identificador del Usuario es incorrecto.');
        }
        if ($valueRole == null) {
            throw new Exception('El identificador del Role del Usuario es incorrecto');
        }

        try {
            session_start();
            $_SESSION["id_user"] = $valueRole;
            $_SESSION["value_role"] = $valueRole;
            if (Login::$ROLE_ADMIN == $valueRole) {
                return Login::$URL_ADMIN;
            } else {
                return Login::$URL_USER;
            }
        } catch (Exception $exception) {
            throw new Exception('Ocurrió un error al inicilizar la sesión. ' + $exception->getMessage());
        }
    }
}
