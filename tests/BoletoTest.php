<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {

    public function testObtenerValor() {
        $tarjeta = new Tarjeta();
        $valor = 14.80;
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);
        $this->assertEquals($boleto->obtenerValor(), $valor);
    }

    public function testObtenerSaldotarjeta() {
    
        $tarjeta = new Tarjeta();
        $valor = 14.80;
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

        $this->assertEquals($boleto->obtenerSaldotarjeta(),0.0);

        $tarjeta1 = new Tarjeta($saldo=20.0);
        $boleto1 = new Boleto($valor, NULL, $tarjeta1, NULL, 2);
        $this->assertEquals($boleto1->obtenerSaldotarjeta(),20.0);
    }



    public function testPluspagado() {
    	$tarjeta = new Tarjeta();
		$valor = 14.80;
		$pagaplus =2;
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

        $this->assertEquals($boleto->obtenePluspagado(), $pagaplus);
    
    }


    public function testIdtarjeta() {
    
        $tarjeta = new Tarjeta();
        $valor = 14.80;
        $id_tarjeta=$tarjeta->obtenerIDtarjeta();
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

       
        $this->assertEquals($boleto->obtenerID(),$id_tarjeta);
       
    }

       public function testFecha() {
    	$tarjeta = new Tarjeta();
		$valor = 14.80;
		$fecha= 100;  //ARRREGLAR
        $boleto = new Boleto($valor, NULL, $tarjeta, $fecha, 2);

        $this->assertEquals($boleto->obtenerFecha(),$fecha );
    
    }


      public function testTipo() {
    
        $tarjeta = new Tarjeta();
        $valor = 14.80;
        
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

       
        $this->assertEquals($boleto->obtenerTipo(),0);
       
    }

      public function testColectivoYDescripcion(){

        $tarjeta = new Tarjeta();
        $valor = 14.80;
        $colectivo = new colectivo("132","Semtur","69");
        $boleto = new Boleto($valor, $colectivo, $tarjeta, NULL, 0);
        $this->assertEquals($boleto->obtenerColectivo(), $colectivo);
        $this->assertEquals($boleto->obtenerDescripcion(), " ");

        }

}
