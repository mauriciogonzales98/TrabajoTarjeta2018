<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testAlgoUtil() {

    	$colectivo1= new Colectivo("132","Semtur", "N");
    	$this->assertEquals($colectivo1->getlinea(), "132");
    	$this->assertEquals($colectivo1->getempresa(), "Semtur");
        $this->assertEquals($colectivo1->getbandera(), "N");
    }

    public function testpagaNormal0Plus(){
    	$colectivo = new Colectivo("132","Semtur", "N");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=0);
    	$tiempo = new TiempoFalso();
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testpagaNormal1Plus(){
    	$colectivo = new Colectivo("132","Semtur", "N");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=1);
    	$tiempo = new TiempoFalso();
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testpagaNormal2Plus(){
    	$colectivo = new Colectivo("132","Semtur", "N");
    	$tarjeta = new Tarjeta($saldo=20.0, $viajeplus=2);
    	$tiempo = new TiempoFalso();
    	$this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagaNormal(){
        $colectivo = new Colectivo("132","Semtur", "N");
        $tarjeta = new Tarjeta($saldo=0.0, $viajeplus=2);
        $tiempo = new TiempoFalso();
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagarConMedio(){
        $tarjeta = new FranquiciaMedia();
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");

        $tarjeta1 = new FranquiciaMedia($saldo=20.0, $precio = 7.4, $viajeplus=2);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta1, $tiempo)), "TrabajoTarjeta\Boleto");

        $tarjeta2 = new FranquiciaMedia($saldo = 100.0);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta2, $tiempo)), "TrabajoTarjeta\Boleto");

        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta2, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testMedio(){
        $tarjeta = new FranquiciaMedia($saldo = 100.0);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $colectivo->pagarCon($tarjeta, $tiempo);
        $tiempo->Avanzar($segundos = 3600);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testMedioUniversitario(){
        $tarjeta = new FranquiciaMediaUniversitaria($saldo = 100.0);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $colectivo->pagarCon($tarjeta, $tiempo);
        $tiempo->Avanzar($segundos = 3600);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testCompleta(){
        $tarjeta = new FranquiciaCompleta($saldo = 100.0);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
        $tiempo->Avanzar($segundos = 3600);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testNormal(){
        $tarjeta = new Tarjeta($saldo=100.0, $precio=14.8, $viajePlus=2, $totaldeviajes=0, $Tipo=0, $ultimoboleto=1);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $colectivo->pagarCon($tarjeta, $tiempo);
        $tiempo->Avanzar($segundos = 3600);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagarConMedioUniversitario(){
        $tarjeta = new FranquiciaMediaUniversitaria();
        $tarjeta->recargar(30);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
        
        $tarjeta1 = new FranquiciaMediaUniversitaria($saldo=100.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=3, $ultimoboleto=1);
        $boleto = $colectivo->pagarCon($tarjeta1, $tiempo);
        $tarjeta1->cambiarBoleto($boleto);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta1, $tiempo)), "TrabajoTarjeta\Boleto");

        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta1, $tiempo)), "TrabajoTarjeta\Boleto");

        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta1, $tiempo)), "TrabajoTarjeta\Boleto");
        $this->assertFalse($tarjeta1->lineasDistintas($colectivo));

    }

    public function testPagarConFranquiciaCompleta(){
        $tarjeta = new FranquiciaCompleta;
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");

        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");

        $tarjeta2 = new FranquiciaCompleta($saldo=100.0, $precio=0.0, $viajePlus=2, $totaldeviajes=0, $Tipo=1, $ultimoboleto=1);
    }

    public function testPagarConMedio2(){
        $tarjeta = new FranquiciaMedia();
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");


        $tarjeta1 = new FranquiciaMedia($saldo=20.0, $precio = 7.4, $viajeplus=2, $ultimoboleto=1);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta1, $tiempo)), "TrabajoTarjeta\Boleto");

        $tarjeta2 = new FranquiciaMedia($saldo=100.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=2, $ultimoboleto=1);
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta2, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagarConMedioUniversitario2(){
        $tarjeta = new FranquiciaMediaUniversitaria($saldo=100.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=2, $ultimoboleto=1);
        $tarjeta->recargar(30);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");

    }

    public function testPagarConFranquiciaCompleta2(){
        $tarjeta = new FranquiciaCompleta($saldo=100.0, $precio=0, $viajePlus=2, $totaldeviajes=0, $Tipo=1, $ultimoboleto=1);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjeta, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testPagaNormal2(){
        $tarjeta = new Tarjeta($saldo=1000.0, $precio=14.8, $viajePlus=1, $totaldeviajes=0, $Tipo=0, $ultimoboleto=0, $boleto=NULL);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("132","Semtur", "N");
        $multiplicador = 1;
        $this->assertEquals(get_class($colectivo->pagaNormal($tarjeta, $tiempo, $multiplicador)), "TrabajoTarjeta\Boleto");

        $tarjeta2 = new Tarjeta($saldo=1000.0, $precio=14.8, $viajePlus=0, $totaldeviajes=0, $Tipo=0, $ultimoboleto=0, $boleto=NULL);
        $tiempo2 = new TiempoFalso();
        $colectivo2 = new Colectivo("132","Semtur", "N");
        $multiplicador2 = 1;
        $this->assertEquals(get_class($colectivo2->pagaNormal($tarjeta2, $tiempo2, $multiplicador2)), "TrabajoTarjeta\Boleto");
    }

    public function testMedios(){
        $tarjetaMedio = new FranquiciaMedia($saldo=100.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=2, $ultimoboleto=1000);
        $tarjetaUni = new FranquiciaMediaUniversitaria($saldo=100.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=3, $ultimoboleto=1000);
        $tiempo = new TiempoFalso($segundos = 500);
        $colectivo = new Colectivo("112", "Mixta", "R");
        
        $this->assertEquals(get_class($colectivo->pagarCon($tarjetaMedio, $tiempo)), "TrabajoTarjeta\Boleto");
        $this->assertEquals(get_class($colectivo->pagarCon($tarjetaUni, $tiempo)), "TrabajoTarjeta\Boleto");

        $tiempo->Avanzar($segundos = 1000);
        $this->assertEquals(get_class($colectivo->esMedioVoleto($tarjetaMedio, $tiempo)), "TrabajoTarjeta\Boleto");
        $this->assertEquals(get_class($colectivo->esMedioUniversitario($tarjetaUni, $tiempo)), "TrabajoTarjeta\Boleto");
    }

    public function testTrasbordo(){
        $tarjeta = new Tarjeta($saldo = 100.0);
        $tiempo = new TiempoFalso();
        $colectivo = new Colectivo("112", "Mixta", "R");
        $colectivo2 = new Colectivo("110", "semtur", "N");

        $colectivo->pagarCon($tarjeta, $tiempo);
        //$colectivo2->pagarCon($tarjeta, $tiempo);

        $this->assertTrue($colectivo2->esTrasbordo($tarjeta, $tiempo));
        $this->assertFalse($colectivo->esTrasbordo($tarjeta, $tiempo));
        $tiempo->Avanzar($segundos = 5500);
        $colectivo->pagarCon($tarjeta, $tiempo);
        $this->assertTrue($colectivo2->esTrasbordo($tarjeta, $tiempo));

    }

}