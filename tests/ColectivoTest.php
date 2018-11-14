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
        $tarjeta = new FranquiciaMedia($saldo=20.0, $precio=14.8, $viajePlus=2, $totaldeviajes=0, $Tipo=2, $ultimoboleto=0);
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagarConMedioUniversitario(){
        $tarjeta = new FranquiciaMediaUniversitaria($saldo=20.0, $precio=14.8, $viajePlus=2, $totaldeviajes=0, $Tipo=3, $ultimoboleto=0);
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagarConFranquiciaCompleta(){
        $tarjeta = new FranquiciaCompleta($saldo=20.0, $precio=14.8, $viajePlus=2, $totaldeviajes=0, $Tipo=1, $ultimoboleto=0);
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }
}
