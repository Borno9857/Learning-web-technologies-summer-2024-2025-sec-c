<?php
include_once __DIR__ . "/../models/UserModel.php";


class AuthController {
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $password = $_POST["password"];

            $user = UserModel::login($id, $password);

            if ($user) {
                $_SESSION["user"] = $user;
                if ($user['user_type'] === 'admin') {
                    header("Location: /home_admin.php");
                } else {
                    header("Location: /home_user.php");
                }
            } else {
                echo "Invalid login credentials";
            }
        }
        include __DIR__ . "/../views/login.php";
    }
 public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirm_password"];
            $name = $_POST["name"];
            $user_type = $_POST["user_type"];

            if ($password === $confirmPassword) {
                UserModel::register($id, $password, $name, $user_type);
                header("Location: /login.php");
            } else {
                echo "Passwords do not match!";
            }
        }
        include __DIR__ . "/../views/register.php";
    }

}