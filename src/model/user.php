<?php

class User {
    private $username;
    private $firstname;
    private $lastname;
    private $email;

    function __construct($username, $firstname, $lastname, $email) {
        $this->$username = $username;
        $this->$firstname = $firstname;
        $this->$lastname = $lastname;
        $this->$email = $email;
    }

    private getUsername() {
        return $this->$username;
    }
    private getFirstname() {
        return $this->$firstname;
    }
    private getLastname() {
        return $this->$lastname;
    }
    private getEmail() {
        return $this->$email;
    }
}