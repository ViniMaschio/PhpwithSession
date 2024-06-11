<?php
class ItensVendaProdutoEntidade{

    private $id;

    private $codVenda;

    private $codProduto;

    private $valor;
    
    private $quantidade;

    public function __construct(){}
    
    public function SetVenda( $codVenda, $codProduto, $valor, $quantidade){
        
        $this->codVenda = $codVenda;
        $this->codProduto = $codProduto;
        $this->valor = $valor;
        $this->quantidade = $quantidade;
    }

    public function getId(){
        return $this->id;
    }
    public function getCodVenda(){
        return $this->codVenda;
    }
    public function getCodProduto(){
        return $this->codProduto;
    }
    public function getValor(){
        return $this->valor;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setCodVenda($codVenda){
        $this->codVenda = $codVenda;
    }
    public function setCodProduto($codProduto){
        $this->codProduto = $codProduto;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function setId($id){
        $this->id = $id;
    }



}