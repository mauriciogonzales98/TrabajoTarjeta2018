<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {

    protected $valor;

    protected $colectivo;

    protected $tarjeta;

    public    $fecha;

    protected $tipo;

    protected $totalabonado;

    protected $pluspagado;

    public function __construct($valor, $colectivo, $tarjeta,,$tipo,$totalabonado,$pluspagado) {
        $this->valor = $valor;
        $this->colectivo = $colectivo;
        $this->tarjeta = $tarjeta;
        
        $this->tipo = $tipo;
        $this->totalabonado = $totalabonado;
        $this->pluspagado = $pluspagado;


    }

    /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenerValor() {
        return $this->valor;
    }

     /**
     * Devuelve la fecha de emision del boleto.
     *
     * @return int
     */
    public function obtenerFecha() {
        return $this->fecha;
    }



    /**
     * Devuelve un objeto que respresenta el colectivo donde se viajó.
     *
     * @return ColectivoInterface
     */
    public function obtenerColectivo() {
        return $this->colectivo ;
        
    }





}
