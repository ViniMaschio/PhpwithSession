<?php

class LoginEntidade{

    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private string $telephoneNumber;
    private string $name;

    public function __construct(){}

    public function SetLogin(int $id, string $username, string $password, string $email, string $telephoneNumber, string $name)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->telephoneNumber = $telephoneNumber;
        $this->name = $name;
    }

    public function getId(): int{
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
    }
    public function getUsername(): string{
        return $this->username;
    }
    public function setUsername(string $username){
        $this->username = $username;
    }
    public function getPassword(): string{
        return $this->password;
    }
    public function setPassword(string $password){
        $this->password = $password;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function getTelephoneNumber(): string{
        return $this->telephoneNumber;
    }
    public function setTelephoneNumber(string $telephoneNumber){
        $this->telephoneNumber = $telephoneNumber;
    }
    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    
}
