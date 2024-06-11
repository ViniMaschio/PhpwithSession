<?php
include("ConfiguraBD.php");


class CarroDAO{

    public function __construct(){}

    public function BuscarTodosCarros(): array {
        $nova = new configuraBD();
        $conn = $nova->NovaConecxao();

        $sql = "select * from carro; ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $carros = array();

        foreach($result as $row){
            $carro = new CarrosEntidade();
            $carro->SetCarro($row["codcarro"],$row["nomecarro"],$row["valor"],$row["quantidade"],$row["descricao"],$row["img"]);
            $carros[] = $carro;
        }

        return $carros;
    }

    public function BuscarCarroPorId(int $id): CarrosEntidade
    {
        $nova = new configuraBD();
        $conn = $nova->NovaConecxao();

        $sql = "select * from carro where codcarro = ? ; ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $car = new CarrosEntidade();

        foreach($result as $row){
            
            $car->SetCarro($row["codcarro"],$row["nomecarro"],$row["valor"],$row["quantidade"],$row["descricao"],$row["img"]);
            
        }

        return $car;
    }
}