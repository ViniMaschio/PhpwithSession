<?php


class VendaDAO{

    public function FazerVenda(int $codLogin):int{
        $nova = new configuraBD();
        $conn = $nova->NovaConecxao();

        $sql = "insert into venda(codlogin_fk,datavenda) values (?,?)";
        $stmt = $conn->prepare($sql);
        $data = date("Y-m-d");
        $stmt->bind_param("ss", $codLogin,$data);
        $stmt->execute();
        $last_id = $conn->insert_id;
        $stmt->close();
        $conn->close();
        return $last_id;
    }
}