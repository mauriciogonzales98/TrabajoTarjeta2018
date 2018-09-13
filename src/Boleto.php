<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {

    protected $valor;

    protected $colectivo;

    protected $tarjeta;

    protected $fecha;

    protected $tipo;

    protected $totalabonado;

    protected $pagaplus;

   

    public function __construct($valor, $colectivo, $tarjeta, $fecha, $pagaplus) {
        $this->valor = $valor;
        $this->colectivo = $colectivo;
        $this->tarjeta = $tarjeta;
        $this->fecha =$fecha;
        $this->pagaplus = $pagaplus;


    }

      /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenerSaldotarjeta() {
        return $this->tarjeta->obtenerSaldo();
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
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenePluspagado() {
        return $this->pagaplus;
    }

     /**
     * Devuelve el ID tarjeta.
     *
     * @return int
     */
    public function obtenerIDtarjeta() {
        return $this->tarjeta->obtenerID();
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
     * Devuelve el Tipo de la tarjeta.
     *
     * @return int
     */
    public function obtenerTipo() {
        return get_class($this->tarjeta);
    }

          /**
     * Devuelve  Total abonado.
     *
     * @return int
     */
    

    






    /**
     * Devuelve un objeto que respresenta el colectivo donde se viajó.
     *
     * @return ColectivoInterface
     */
    public function obtenerColectivo() {
        return $this->colectivo ;
        
    }





}
