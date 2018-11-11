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

    public function testpagaNormal(){
    	$colectivo = new Colectivo("132","Semtur","69");
    	$tarjeta = new Tarjeta($saldo=20.0);
    	$tarjeta->recargar(20);
    	$tiempo = Tiempo::tiempoFalso();
    	$colectivo->pagaCon($tajerta, $tiempo);
    }
}
