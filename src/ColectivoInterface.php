<?php

namespace TrabajoTarjeta;

interface ColectivoInterface {

    /**
     * Devuelve el nombre de la linea. Ejemplo '142 Negro'
     *
     * @return string
     */
    public function getlinea();

    /**
     * Devuelve el nombre de la empresa. Ejemplo 'Semtur'
     *
     * @return string
     */

    public function getempresa();

    /**
     * Devuelve el numero de unidad. Ejemplo: 12
     *
     * @return int
     */
    public function getnumero();


    /**
     * Paga un viaje en el colectivo con una tarjeta en particular.
     *
     * @param TarjetaInterface $tarjeta
     *
     * @return BoletoInterface|FALSE
     *  El boleto generado por el pago del viaje. O FALSE si no hay saldo
     *  suficiente en la tarjeta.
     */
    public function pagarCon(TarjetaInterface $tarjeta, TiempoInterface $fecha);

    public function pagaNormal(TarjetaInterface $tarjeta, TiempoInterface $fecha, $multiplicador);
    
    public function esMedioVoleto(TarjetaInterface $tarjeta, TiempoInterface $fecha);

    public function esMedioUniversitario(TarjetaInterface $tarjeta, TiempoInterface $fecha);

    public function esFranCompleta(TarjetaInterface $tarjeta, TiempoInterface $fecha);

    public function esValidoTrasbordo(TarjetaInterface $tarjeta, TiempoInterface $fecha);
}
