<?php

class User {
    private $id;
    private $username;
    private $firstname;
    private $lastname;
    private $email;

    function __construct() {
      $this->id = -1;
      $this->username = "";
      $this->firstname = "";
      $this->lastname = "";
      $this->email = "";
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setLastName($lastname) {
        $this->lastname = $lastname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
