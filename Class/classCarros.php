<?php
class Carros
{
    private int $idCarro;
    private string $cor;
    private string $nomeCarro;
    private float $quantidade;

    public function SetID (int $idCarro){
        $this->idCarro= $idCarro ;
     }
     public function SetCor (string $cor){
        $this->cor= $cor ;
     }
     public function setNomeCarro (string $nomeCarro){
        $this->nomeCarro= $nomeCarro ;
     }
     public function setQuantidade (float $quantidade){
        $this->quantidade= $quantidade ;
     }
     public function getIdCarro () : int{
        return $this->idCarro ;
     }
     public function getCor () : string{
        return $this->cor ;
     }
     public function getNomeCarro () : string{
        return $this->nomeCarro ;
     }
     public function getQuantidade () :float{
        return $this->quantidade ;
     }

}

?>