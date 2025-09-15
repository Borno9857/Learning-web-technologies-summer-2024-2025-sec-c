<?php
// Include the UserModel file (corrected relative path)
include_once __DIR__ . "/../models/UserModel.php";

class UserController {

    public function changePassword() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_SESSION["user"]["id"];
            $currentPassword = $_POST["current_password"];
            $newPassword = $_POST["new_password"];
            $confirmNewPassword = $_POST["confirm_new_password"];

            if ($newPassword === $confirmNewPassword) {
                $result = UserModel::changePassword($id, $currentPassword, $newPassword);
                if ($result) {
                    echo "Password changed successfully!";
                } else {
                    echo "Incorrect current password!";
                }
            } else {
                echo "New passwords do not match!";
            }
        }

        // Render change password view
        include __DIR__ . '/../views/change_password.php';
    }

    public function viewUsers() {
        if ($_SESSION["user"]["user_type"] === "admin") {
            $users = UserModel::getUsers();
            // Render view users page
            include __DIR__ . '/../views/view_users.php';
        } else {
            echo "Unauthorized access!";
        }
    }

    public function profile() {
        $user = $_SESSION["user"];
        // Render profile page
        include __DIR__ . '/../views/profile.php';
    }
}
