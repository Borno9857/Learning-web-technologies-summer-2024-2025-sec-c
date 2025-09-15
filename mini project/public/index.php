<?php
// Start the session once
session_start();

// Include necessary controllers
require_once _DIR_ . "/../controllers/AuthController.php";
require_once _DIR_ . "/../controllers/UserController.php";

// Initialize controllers
$authController = new AuthController();
$userController = new UserController();

// Get the action from the query string (default is 'login')
$action = $_GET['action'] ?? 'login';

// Route to the appropriate controller method based on the action
switch ($action) {
    case "register":
        $authController->register();
        break;

    case "login":
        $authController->login();
        break;

    case "profile":
        $userController->profile();
        break;
  case "view_users":
        $userController->viewUsers();
        break;

    case "change_password":
        $userController->changePassword();
        break;

    case "logout":
        // Destroy session and redirect to login
        session_destroy();
        header("Location: index.php?action=login");
        break;

    default:
        $authController->login();
}