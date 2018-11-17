<?php

class User {
    private $id;
    private $username;
    private $firstname;
    private $lastname;
    private $email;

    function __construct($username, $firstname, $lastname, $email) {
        $this->id = $id;
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    private setUsername($username) {
        $this->username = $username;
    }
    private getUsername() {
        return $this->username;
    }

    private setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    private getFirstname() {
        return $this->firstname;
    }

    private setLastname($lastname) {
        $this->lastname = $lastname;
    }
    private getLastname() {
        return $this->lastname;
    }

    private setEmail($email) {
        $this->email = email;
    }
    private getEmail() {
        return $this->email;
    }
}
