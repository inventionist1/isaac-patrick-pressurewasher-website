<?php

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) {
    if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)){
        return(true);
        exit();
    }
    return(false);
}

function emptyInputLogin($username,$pwd) {
    if(empty($username)||empty($pwd)){
        return(true);
        exit();
    }
    return(false);
}


function invalidUid($username) {
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        return(true);
        exit();
    }
    return(false);
}

function invalidEmail($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
        exit();
    }
    return false;
}

function pwdMatch($pwd, $pwdRepeat) {
    if($pwd !== $pwdRepeat) {
        return true;
        exit();
    }
    return false;
}

function uidExists($conn, $username) {
    $sql = "SELECT * FROM users WHERE usersUid = ? or usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function loginUser($conn, $username, $pwd) {
    $uidExist = uidexist($conn,$username,$username);

    if($uidExist = false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["usersPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd !== true) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    session_start();
    $_SESSION["userid"] = uidExist["usersId"];
    $_SESSION["useruid"] = uidExist["usersUid"];
    header("location: ../index.php");
    exit();
}