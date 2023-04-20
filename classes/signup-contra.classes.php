<?php

class SignupContra {

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __contruct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false) {
            header("location: ../signup.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            header("location: ../signup.php?error=email");
            exit();
        }
        if($this->uidTakenCheck() == false) {
            header("location: ../signup.php?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false) {
            header("location: ../signup.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->$uid, $this->$email);
    }

    private function emptyInput() {
        if(empty($this->uid) ||empty($this->pwd) ||empty($this->pwdRepeat) ||empty($this->email = $email;)) {
            return false;
        } else {
            return true;
        }
    }

    private function invalidUid() {
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            return false;
        } else {
            return true;
        }
    }

    private function emptyEmail() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    private function pwdMatch() {
        if($this->pwd !== $this->pwdRepeat) {
            return false;
        } else {
            return true;
        }
    }

    private function uidTakenCheck() {
        if($this->checkUser($this->$uid, $this->$email)) {
            return false;
        } else {
            return true;
        }
    }
}