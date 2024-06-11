<?php


class ItensVendaDAO{

    public function FazerVenda(ItensVendaProdutoEntidade $produto){
        $nova = new configuraBD();
        $conn = $nova->NovaConecxao();

        $sql = "insert into itensvendacarro(codvenda_fk,codcarro_fk,valor,quantidade) values (?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $codvenda = $produto->getCodVenda();
        $codproduto = $produto->getCodProduto();
        $valor = $produto->getValor();
        $quantidade = $produto->getQuantidade();
        $stmt->bind_param("ssss", $codvenda,$codproduto,$valor,$quantidade);
        $stmt->execute();
    }
}