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
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testpagaNormal1Plus(){
    	$colectivo = new Colectivo("132","Semtur","69");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=1);
    	$tiempo = new Tiempo();
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testpagaNormal2Plus(){
    	$colectivo = new Colectivo("132","Semtur","69");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=2);
    	$tiempo = new Tiempo();
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagaNormal(){
        $colectivo = new Colectivo("132","Semtur","69");
        $tarjeta = new Tarjeta($saldo=0.0, $viajeplus=2);
        $tiempo = new Tiempo();
        $this->assertFalse($colectivo->pagarCon($tarjeta, $tiempo));
    }

    public function testPagarConMedio(){
        $tarjeta = new FranquiciaMedia;
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69");
        $this->assertFalse($colectivo->pagarCon($tarjeta, $tiempo));

        $tarjeta1 = new FranquiciaMedia($saldo=20.0, $viajeplus=2);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta1, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagarConMedioUniversitario(){
        $tarjeta = new FranquiciaMediaUniversitaria;
        $tarjeta->recargar(30);
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69");
        $this->assertFalse($colectivo->pagarCon($tarjeta, $tiempo));
    }

    public function testPagarConFranquiciaCompleta(){
        $tarjeta = new FranquiciaCompleta;
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69");
        $boleto = $colectivo->pagarCon($tarjeta, $tiempo);
        $this->assertEquals($colectivo->pagarCon($tarjeta, $tiempo), $boleto);
    }
}
