<?php

namespace TrabajoTarjeta;

interface BoletoInterface {

    /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenerValor();

    /**
     * Devuelve un objeto que respresenta el colectivo donde se viajó.
     *
     * @return ColectivoInterface
     */
    public function obtenerColectivo();

    /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenerSaldotarjeta();

    /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenePluspagado();

    /**
     * Devuelve el ID tarjeta.
     *
     * @return int
     */
    public function obtenerIDtarjeta();

    /**
     * Devuelve la fecha de emision del boleto.
     *
     * @return int
     */
    public function obtenerFecha();

    /**
     * Devuelve el Tipo de la tarjeta.
     *
     * @return int
     */
    public function obtenerTipo();
}
