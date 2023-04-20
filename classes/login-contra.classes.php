<?php

class LoginContr extends login{

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __contruct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }

    private function emptyInput() {
        if(empty($this->uid) ||empty($this->pwd)) {
            return false;
        } else {
            return true;
        }
    }
}