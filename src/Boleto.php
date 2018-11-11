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

    protected $descripcion;
   

    public function __construct($valor, $colectivo, $tarjeta, $fecha, $pagaplus) {
        $this->$valor = $valor;
        $this->$colectivo = $colectivo;
        $this->$idTarjeta = $tarjeta->obtenerIDtarjeta();
        $this->$fecha = $fecha;
        $this->$pagaplus = $pagaplus;
        $this->$saldo = $tarjeta->obtenerSaldo();
        $this->$tipoTarjeta = $tarjeta->obterTipo();
        $this->$totalabonado = $valor + $pagaplus*14.8;
        if($pagaplus == 0){
            $this->$descripcion = " ";
        }
        else{
            $this->$descripcion = "Abona viajes plus: " . (string)$pagaplus*14.8;
        }
    }



    public function obtenerSaldotarjeta() {
        return $this->saldo;
    }

    public function obtenerValor() {
        return $this->valor;
    }

    public function obtenePluspagado() {
        return $this->pagaplus;
    }

    // public function obtenerIDtarjeta() {
    //     return $this->idTarjeta;
    // }

    public function obtenerFecha() {
        return $this->fecha;
    }

    public function obtenerTipo() {
        return $this->tipoTarjeta;
    }    

    public function obtenerColectivo() {
        return $this->colectivo ;
        
    }

}
