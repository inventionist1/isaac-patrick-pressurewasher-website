<?php
/* need to 
CREATE TABLE users (
    users_id:int(11) AUTO_INCREMENT PRIMARY KEY not null,
    users_uid TINYTEXT not null,
    users_pwd LONGTEXT not null,
    users_email TINYTEXT not null
);*/

class Signup extends Dbh{

    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }

    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users-uid FROM users WHERE users_uid = ? or users_email = ?;');

        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }
}