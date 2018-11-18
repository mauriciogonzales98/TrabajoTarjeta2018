<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testAlgoUtil() {

    	$colectivo1= new Colectivo("132","Semtur","69", "N");
    	$this->assertEquals($colectivo1->getlinea(), "132");
    	$this->assertEquals($colectivo1->getempresa(), "Semtur");
    	$this->assertEquals($colectivo1->getnumero(), "69");
        $this->assertEquals($colectivo1->getbandera(), "N")
    }

    public function testpagaNormal0Plus(){
    	$colectivo = new Colectivo("132","Semtur","69", "N");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=0);
    	$tiempo = new Tiempo();
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testpagaNormal1Plus(){
    	$colectivo = new Colectivo("132","Semtur","69", "N");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=1);
    	$tiempo = new Tiempo();
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testpagaNormal2Plus(){
    	$colectivo = new Colectivo("132","Semtur","69", "N");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=2);
    	$tiempo = new Tiempo();
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagaNormal(){
        $colectivo = new Colectivo("132","Semtur","69", "N");
        $tarjeta = new Tarjeta($saldo=0.0, $viajeplus=2);
        $tiempo = new Tiempo();
        $this->assertFalse($colectivo->pagarCon($tarjeta, $tiempo));
    }

    public function testPagarConMedio(){
        $tarjeta = new FranquiciaMedia();
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69", "N");
        $this->assertFalse($colectivo->pagarCon($tarjeta, $tiempo));

        $tarjeta1 = new FranquiciaMedia($saldo=20.0, $precio = 7.4, $viajeplus=2);
        $boleto = $colectivo->pagarCon($tarjeta1, $tiempo);
        $this->assertEquals($colectivo->pagarCon($tarjeta1, $tiempo), $boleto);

        $tarjeta2 = new FranquiciaMedia($saldo=100.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=2, $ultimoboleto=0);
        $boleto2 = $colectivo->pagarCon($tarjeta2, $tiempo);
        $this->assertEquals($colectivo->pagarCon($tarjeta2, $tiempo), $boleto2);
    }

    public function testPagarConMedioUniversitario(){
        $tarjeta = new FranquiciaMediaUniversitaria();
        $tarjeta->recargar(30);
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69", "N");
        $this->assertFalse($colectivo->pagarCon($tarjeta, $tiempo));
    }

    public function testPagarConFranquiciaCompleta(){
        $tarjeta = new FranquiciaCompleta;
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69", "N");
        $boleto = $colectivo->pagarCon($tarjeta, $tiempo);
        $this->assertEquals($colectivo->pagarCon($tarjeta, $tiempo), $boleto);
    }

    public function testPagarConMedio2(){
        $tarjeta = new FranquiciaMedia();
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69", "N");
        $this->assertFalse($colectivo->pagarCon($tarjeta, $tiempo));

        $tarjeta1 = new FranquiciaMedia($saldo=20.0, $precio = 7.4, $viajeplus=2, $ultimoboleto=1);
        $boleto = $colectivo->pagarCon($tarjeta1, $tiempo);
        $this->assertEquals($colectivo->pagarCon($tarjeta1, $tiempo), $boleto);

        $tarjeta2 = new FranquiciaMedia($saldo=100.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=2, $ultimoboleto=1);
        $boleto2 = $colectivo->pagarCon($tarjeta2, $tiempo);
        $this->assertEquals($colectivo->pagarCon($tarjeta2, $tiempo), $boleto2);
    }

    public function testPagarConMedioUniversitario2(){
        $tarjeta = new FranquiciaMediaUniversitaria($saldo=100.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=2, $ultimoboleto=1);
        $tarjeta->recargar(30);
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69", "N");
        $this->assertFalse($colectivo->pagarCon($tarjeta, $tiempo));
    }

    public function testPagarConFranquiciaCompleta2(){
        $tarjeta = new FranquiciaCompleta($saldo=100.0, $precio=0, $viajePlus=2, $totaldeviajes=0, $Tipo=2, $ultimoboleto=1);
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("132","Semtur","69", "N");
        $boleto = $colectivo->pagarCon($tarjeta, $tiempo);
        $this->assertEquals($colectivo->pagarCon($tarjeta, $tiempo), $boleto);
    }
}
