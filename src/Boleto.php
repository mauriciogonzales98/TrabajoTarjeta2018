<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {

    protected $valor;

    protected $colectivo;

    //protected $tarjeta;

    protected $fecha;

    protected $tipoTarjeta;

    protected $idTarjeta;

    protected $totalabonado;

    protected $pagaplus;

    protected $saldo;
   

    public function __construct($valor, $colectivo, $tarjeta, $fecha, $pagaplus) {
        $this->valor = $valor;
        $this->colectivo = $colectivo;
        $this->idTarjeta = $tarjeta->obtenerIDtarjeta();
        $this->fecha = $fecha;
        $this->pagaplus = $pagaplus;
        $this->saldo = $tarjeta->obtenerSaldo();
        $this->tipoTarjeta = $tarjeta->obterTipo();
        $this->totalabonado = $valor + $pagaplus*14.8;
    }

    public function obtenerSaldotarjeta() {
        return $this->tarjeta->obtenerSaldo();
    }

    public function obtenerValor() {
        return $this->valor;
    }

    public function obtenePluspagado() {
        return $this->pagaplus;
    }

    public function obtenerIDtarjeta() {
        return $this->idTarjeta;
    }

    public function obtenerFecha() {
        return $this->fecha;
    }

    public function obtenerTipo() {
        return $this->tarjeta->obtenerTipo();
    }    

    public function obtenerColectivo() {
        return $this->colectivo ;
        
    }

    public function totalPagado() {
        if($this->tarjeta->obtenercantPlus()==0){
            $saldo=$this->$tarjeta->obtenerSaldo();
            return $saldo;
        elseif ($this->tarjeta->obtenercantPlus()==1) {
            $saldo=($this->$tarjeta->obtenerSaldo())*2;
            return $saldo;
            else {
               $saldo=($this->$tarjeta->obtenerSaldo())*3; 
               return $saldo;
            }
        }
        }

    }



}
