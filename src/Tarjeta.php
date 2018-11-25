<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {

    protected $saldo;
    protected $precio;
    protected $viajePlus;
    protected $totaldeviajes;
    protected $IDtarjeta;
    protected $Tipo;
    protected $ultimoboleto;
    protected $boleto;
    // protected $colectivoActual = NULL;
    // protected $colectivoAnterior = NULL;

    public function __construct ($saldo=0.0, $precio=14.8, $viajePlus=2, $totaldeviajes=0, $Tipo=0, $ultimoboleto=0, $boleto=NULL){
      $this->saldo = $saldo;
      $this->precio = $precio;
      $this->viajePlus = $viajePlus;
      $this->totaldeviajes = $totaldeviajes;
      $this->IDtarjeta = rand(1,30);
      $this->Tipo = $Tipo;
      $this->ultimoboleto = $ultimoboleto;
      $this->boleto = $boleto;
    }

    public function recargar($monto) {
      if ($monto == 10 || $monto==20 || $monto == 30 || $monto == 50 || $monto == 100 || $monto == 510.15 || $monto == 962.59) {
          if( $monto == 962.59) {
            $this->saldo += ($monto + 221.58);
            return true;
          } 
          else {
              if ($monto == 510.15){
                $this->saldo += ($monto+81.93);
                return true;
              } else {
                $this->saldo += $monto;
                return true;
              }
          }
      }
      else 
      {
        return FALSE;
      }

        }

     
    public function obtenerSaldo() {
      return $this->saldo;
    }

    public function obtenercantPlus(){
      return $this->viajePlus;
    }

    public function obtenerPrecio(){
      return $this->precio;
    }

    public function obtenerIDtarjeta(){
      return $this->IDtarjeta;
    }

    public function restarSaldo($pago) {
        if($this->saldo >= $pago){
          $this->saldo -= $pago;  
          $this->viajePlus=2;
          return true;          
        }
        else{
          if($this->viajePlus > 0){
            $this->viajePlus -= 1;
            return true; 
          }
          else{
            return false;
          }
        } 
    }

    // public function colectivoAntyAct(ColectivoInterface $colectivo){
    //     if($this->colectivoAnterior == NULL){
    //       $this->colectivoAnterior = $colectivo;
    //     }
    //     else{
    //       $this->colectivoAnterior = $this->colectivoActual;
    //     }

    //     $this->colectivoActual = $colectivo;
    // }

    public function obtenerTipo(){
        return $this->Tipo;
    }

    public function obtenerUltimoBoleto(){
      return $this->ultimoboleto;
    }

    public function cambiarUltimoBoleto($tiempo){
      $this->ultimoboleto = $tiempo;
    }

     public function obtenerCant(){
        $this->totaldeviajes += 1;
        return $this->totaldeviajes;
    }

    public function obtenerBoleto(){
      return $this->boleto;
    }

    public function cambiarBoleto(BoletoInterface $bol){
      $this->boleto = $bol;
    }

    public function lineasDistintas(ColectivoInterface $colectivoActual){
      $linea1 = $colectivoActual->getlinea();
      $linea2 = $this->boleto->obtenerColectivo()->getlinea();
      $bandera1 = $colectivoActual->getbandera();
      $bandera2 = $this->boleto->obtenerColectivo()->getbandera();

      if($linea1 != $linea2 || $bandera1 != $bandera2 ){
        return TRUE;
      }
      else{
        return FALSE;
      }
    }

}
