<?php
//session_start();
include '../Control/db.php';

function login($email, $password) {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'] . ' ' . $user['familyname'];
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}

function register($name, $familyname, $email, $password, $check_password) {
    global $conn;

    if ($password !== $check_password) {
        return false;
    }

    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, familyname, email, password) VALUES (:name, :familyname, :email, :password)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':familyname', $familyname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        return false;
    }
}

function logout() {
    // Unset all of the session variables
    session_unset();

    // Destroy the session
    session_destroy();

    return true;
}
