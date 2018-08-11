<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    protected $saldo=0.0;

    public function recargar($monto) {
      if($monto==10||$monto==20||$monto==30||$monto==50||$monto==100){
        $this->saldo=$monto;
      }      
        if($monto==510.15){
        $this->saldo=$monto+81.93;
      } 
        if($monto==962.59){
        $this->saldo=$monto+221.58;
      }           

    /*
      Devuelve el saldo que le queda a la tarjeta. */
     
      @return $this->saldo;
     
    public function obtenerSaldo() {
      return $this->saldo;
    }

}
