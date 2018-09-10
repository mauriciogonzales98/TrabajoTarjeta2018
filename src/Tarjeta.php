<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    protected $saldo=0.0;

    protected $precio=14.80;

    protected $viajePlus=2;
    

    public function recargar($monto) {
         if($viajePlus ==2){
      if ($monto == 10 || $monto==20 || $monto == 30 || $monto == 50 || $monto == 100 || $monto == 510.15 || $monto == 962.59) {
          if( $monto == 962.59) {
            $this->saldo += ($monto + 221.58);
          } 
          else {
              if ($monto == 510.15){
                $this->saldo += ($monto+81.93);
              } else {
                $this->saldo += $monto;
              }
          }
      }
      else 
      {
        echo "El monto ingresado no es valido";
      }
        }

      if($viajePlus==1){
      if ($monto == 10 || $monto==20 || $monto == 30 || $monto == 50 || $monto == 100 || $monto == 510.15 || $monto == 962.59) {
          if( $monto == 962.59) {
            $this->saldo += ($monto + 221.58 - 14.80);
          } 
          else {
              if ($monto == 510.15){
                $this->saldo += ($monto+81.93 - 14.80);
              } else {
                $this->saldo += ($monto-14.80);
                $viajePlus += 1;
              }
          }
      }
      else 
      {
        echo "El monto ingresado no es valido";
      }
      }

      if($viajePlus==0){
      if ($monto == 10 || $monto==20 || $monto == 30 || $monto == 50 || $monto == 100 || $monto == 510.15 || $monto == 962.59) {
          if( $monto == 962.59) {
            $this->saldo += ($monto + 221.58 - 29.60);
          } 
          else {
              if ($monto == 510.15){
                $this->saldo += ($monto+81.93 - 29.60);
              } else {
                $this->saldo += ($monto-29.60);
                $viajePlus += 2;
              }
          }
      }
      else 
      {
        echo "El monto ingresado no es valido";
      }
      }
    }

      /*
      Devuelve el saldo despues de pagar un voleto */
       

    /*
      Devuelve el saldo que le queda a la tarjeta. */
     
    public function obtenerSaldo() {
      return $this->saldo;
    }

    public function obtenercantPlus(){
      return $this->$viajePlus;
    }
    public function obtenerPrecio(){
      return $this->$precio;
    }

     public function restarSaldo() 
    {
        if($this->saldo >= $this->precio){
          $this->saldo -= $this->precio;  
        }

        if($saldo < $this->precio){
          if($viajePlus > 0){
            $viajePlus -= 1;
          }
        } 
      
        if($viajePlus== 0){
          echo "CONSUMIO SUS 2 VIAJES PLUS RECARGUE SU TARJETA";
          return false;
        }
    }


}
