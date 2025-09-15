<?php
include_once _DIR_ . "/../models/UserModel.php";

class AuthController {

    // Login logic
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
        include _DIR_ . "/../views/login.php";
    }
       // Register logic
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirm_password"];
            $name = $_POST["name"];
            $user_type = $_POST["user_type"];

            if ($password === $confirmPassword) {
                $isRegistered = UserModel::register($id, $password, $name, $user_type);

                if ($isRegistered) {
                    header("Location: /login.php"); // Redirect to login after successful registration
                } else {
                    echo "Registration failed. Please try again.";
                }
            } else {
                echo "Passwords do not match.";
            }
        }

        include _DIR_ . "/../views/register.php";
    }
}
?>

