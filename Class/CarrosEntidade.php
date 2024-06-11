<?php
class CarrosEntidade
{
    private int $idCarro;
    private string $descricao;
    private string $nomeCarro;
    private float $quantidade;

    private float $valor;

    private string $img;

    public function __construct(){}

    public function SetCarro(int $idCarro,string $nomeCarro, float $valor, float $quantidade, string $descricao, string $img){
      $this->img = $img;
      $this->idCarro = $idCarro;
      $this->descricao = $descricao;
      $this->nomeCarro = $nomeCarro;
      $this->quantidade = $quantidade;
      $this->valor = $valor;
    }
    public function SetValor (float $valor){
      $this->valor= $valor ;
   }

    public function SetID (int $idCarro){
        $this->idCarro= $idCarro ;
     }
     public function SetDescricao (string $descricao){
        $this->descricao= $descricao ;
     }
     public function setNomeCarro (string $nomeCarro){
        $this->nomeCarro= $nomeCarro ;
     }
     public function setQuantidade (float $quantidade){
        $this->quantidade= $quantidade ;
     }

     public function setImg(string $img){
      $this->img= $img;
     }
     public function getIdCarro () : int{
        return $this->idCarro ;
     }
     public function getDescricao () : string{
        return $this->descricao ;
     }
     public function getNomeCarro () : string{
        return $this->nomeCarro ;
     }
     public function getQuantidade () :float{
        return $this->quantidade ;
     }
     public function getValor () :float{
      return $this->valor ;
     }
     public function adicionaQuantidade (float $quantidade){
      $this->quantidade+= $quantidade ;
   }
   public function getImg() :string{
      return $this->img;
   }

}
