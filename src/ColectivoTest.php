<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testAlgoUtil() {

    	$colectivo1= new Colectivo("132","Semtur","69");
    	$this->assertEquals($colectivo1->getlinea(),"132");
    	$this->assertEquals($colectivo1->getempresa(),"Semtur");
    	$this->assertEquals($colectivo1->getnumero(),"69");
    }

    public function testpagaNormal0Plus(){
    	$colectivo = new Colectivo("132","Semtur","69");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=0);
    	$tiempo = new Tiempo();
        $temp = $tiempo->tiempoFalso();
    	$this->assertEquals(get_class($colectivo->pagaCon($tajerta, $temp), "TrabajoTarjeta\Boleto");
    }

    public function testpagaNormal1Plus(){
    	$colectivo = new Colectivo("132","Semtur","69");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=1);
    	$tiempo = new Tiempo();
        $temp = $tiempo->tiempoFalso();
    	$this->assertEquals(get_class($colectivo->pagaCon($tajerta, $temp), "TrabajoTarjeta\Boleto");
    }

    public function testpagaNormal2Plus(){
    	$colectivo = new Colectivo("132","Semtur","69");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=2);
    	$tiempo = new Tiempo();
        $temp = $tiempo->tiempoFalso();
    	$this->assertEquals(get_class($colectivo->pagaCon($tajerta, $temp), "TrabajoTarjeta\Boleto");
    }
}