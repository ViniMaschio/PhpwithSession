<?php
include("ConfiguraBD.php");

class LoginDAO {

    public function __construct(){}

    public function VerificarLogin($username, $password): LoginEntidade{
        $loginEntidade = new LoginEntidade();
        $loginEntidade->setId(0);

        $nova = new configuraBD();
        $conn = $nova->NovaConecxao();

        $sql = "select * from login where usuario = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        foreach($result as $row)
        {   

            if($password == $row['senha']){
                
                $loginEntidade->SetLogin( $row['codlogin'], $row['usuario'], "",  $row['email'],  $row['telefone'], $row['nome']);
                $stmt->close(); 
                $conn->close();
                return $loginEntidade;
                
            }
        }

        $stmt->close();
        $conn->close();
        return $loginEntidade;
    }

    public function Cadastrar(LoginEntidade $loginEntidade){

        $nova = new configuraBD();
        $conn = $nova->NovaConecxao();

        $sql = "insert into login(usuario,senha,email,telefone,nome) values (?,?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);

        $user = $loginEntidade->getUsername();
        $pass = $loginEntidade->getPassword();
        $email = $loginEntidade->getEmail();
        $telefone = $loginEntidade->getTelephoneNumber();
        $nome = $loginEntidade->getName();
       
        $stmt->bind_param("sssss", $user, $pass,$email, $telefone, $nome);
        $result = $stmt->execute();


        $stmt->close();
        $conn->close();

        return $result;
    }
}
