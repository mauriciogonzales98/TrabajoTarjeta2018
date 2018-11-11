<?php

namespace TrabajoTarjeta;

interface TarjetaInterface {

    /**
     * Recarga una tarjeta con un cierto valor de dinero.
     *
     * @param float $monto
     *
     * @return bool
     *   Devuelve TRUE si el monto a cargar es válido, o FALSE en caso de que no
     *   sea valido.
     */
    public function recargar($monto);

    /**
     * Devuelve el saldo que le queda a la tarjeta.
     *
     * @return float
     */
    public function obtenerSaldo();

    /**
     * Devuelve el saldo despues de pagar
     *
     * @return int
     */
        public function restarSaldo();





           /**
     * Obtiene cantidad de plus de la tarjeta
     *
     * @return int
     */
        public function obtenercantPlus();


   /**
     * Obtiene el precio del boleto de la tarjeta 
     *
     * @return int
     */
        public function obtenerPrecio();


   /**
     * Obtiene el ID de la tarjeta correspondiente
     *
     * @return int
     */
        public function obtenerIDtarjeta();

   /**
     * Obtiene el Tipo de la tarjeta correspondiente
     *
     * @return int
     */
        public function obtenerTipo();


   /**
     * Obtiene el ultimo boleto emitido con la tarjeta
     *
     * @return int
     */
        public function obtenerUltimoBoleto();

   /**
     * Obtiene la cantidad de viajes haechos con la tarjeta correspondiente
     *
     * @return int
     */
        public function obtenerCant();        
}
