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

        $tarjeta1->recargar(20);
        $boleto1 = new Boleto($valor, NULL, $tarjeta1, NULL, 2);
        $this->assertEquals($boleto1->obtenerSaldotarjeta(),20);
        
        $tarjeta2->recargar(14.80);
        $boleto2 = new Boleto($valor, NULL, $tarjeta2, NULL, 2);
        $this->assertEquals($boleto2->obtenerSaldotarjeta(),0.0);
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

}
