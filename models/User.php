<?php

class User{
    public static function register($name,$surname,$email,$password){
        $db = Db::getConnection();
        $query = "INSERT INTO clients(
                              `name`,
                              surname,
                              email,
                              password)
  VALUES ('".$name."','".$surname."','".$email."','".$password."');";
        $result = $db->query($query);
        return $result;
    }

    public static function auth($email){
        $db = Db::getConnection();
        $query = "SELECT
                      clients.id_client,
                      clients.name,
                      clients.surname,
                      clients.email,
                      clients.password,                      
                      statuses_clients.status_client
                FROM clients
                  INNER JOIN statuses_clients
                    ON clients.id_status = statuses_clients.id_status
                WHERE clients.email = ?";
        $result = $db->prepare($query);
        $result->execute(["$email"]);
        $dataUser = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $dataUser;//сохраняем массив пользовательских данных в переменную user
    }

    public static function checkUserData($email,$password){
        $errors = false;

        $db = Db::getConnection();
        $query = "SELECT COUNT(email) FROM clients WHERE email=?;";
        $result = $db->prepare($query);
        $result->execute(["$email"]);
        $checkEmail = $result->fetch(PDO::FETCH_NUM);
        if ($checkEmail[0] == 1){
            $query = "SELECT email, password FROM clients WHERE email=?;";
            $result = $db->prepare($query);
            $result->execute(["$email"]);
            $userData = $result->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password,$userData['password'])){
                return false;
            }else{
                $errors[]="Пароль введен не верно";
            }
        }else{
            $errors[]="Введенный email не существует";
        }

        return $errors;
    }

    /**
     * @param $name
     * @param $surname
     * @param $email
     * @param $password
     * @param $password_repeat
     * @param $phone
     * @return array|bool
     */
    public static function checkAllData($name, $surname, $email, $password, $password_repeat){
        $errors = false;

        if (!self::checkName($name)){
            $errors[] = "Поле Имя должно содержать от 2 до 15 букв кирилицы или латинского алфавита";
        }

        if (!self::checkSurname($surname)){
            $errors[] = "Поле Фамилия должно содержать от 2 до 15 букв кирилицы или латинского алфавита";
        }

        if (!self::checkEmail($email)){
            $errors[] = "Не корректный email";
        }

        if (!self::checkPassword($password)){
            $errors[] = "Поле Пароль должно содержать от 5 до 15 цифр и/или букв латинского алфавита";
        }

        if (!self::checkPasswordAgain($password, $password_repeat)){
            $errors[] = "Пароли не совпадают";
        }

        if (!self::checkEmailExist($email)){
            $errors[] = "Пользователь с таким email-ом уже существует";
        }


        return $errors;
    }
    
    private static function checkName($name){
        $pattern = '~[a-zA-ZА-Яа-я]{2,15}~';
        if (preg_match($pattern, $name) != false){
            return true;
        }else{
            return false;
        }
    }

    private static function checkSurname($surname){
        $pattern = '~[a-zA-ZА-Яа-я]{2,15}~';
        if (preg_match($pattern, $surname) != false){
            return true;
        }else{
            return false;
        }
    }

    private static function checkEmail($email){
        $pattern = '~.+@.+\..+~';
        if (preg_match($pattern,$email) != false){
            return true;
        }else{
            return false;
        }
    }

    private static function checkPassword($password){
        $pattern = '~[a-zA-Z0-9]{5,15}~';
        if (preg_match($pattern,$password)){
            return true;
        }else{
            return false;
        }
    }

    private static function checkPasswordAgain($password, $password_repeat){
        if ($password === $password_repeat){
            return true;
        }else{
            return false;
        }
    }


    private static function checkEmailExist($email){
        $db = Db::getConnection();
        $query = "SELECT COUNT(clients.email) FROM clients WHERE clients.email=?;";
        $result = $db->prepare($query);
        $result->execute(["$email"]);
        $checkEmailExist = $result->fetch(PDO::FETCH_NUM);
        if ($checkEmailExist[0] == 0){
            return true;
        }else{
            return false;
        }
    }


}