<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {

    public function testObtenerValor() {
        $valor = 14.80;
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

        $this->assertEquals($boleto->obtenerValor(), $valor);
    }

    public function testObtenerSaldotarjeta() {
    
        $tarjeta = new Tarjeta();
        $valor = 14.80;
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

        $this->assertEquals($boleto->obtenerSaldotarjeta(),0.0);
        $tarjeta->recargar(14.80);
        $this->assertEquals($boleto->obtenerSaldotarjeta(),14.80);
    }



    public function testPluspagado() {
    	
		$valor = 14.80;
		$pagaplus =2;
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

        $this->assertEquals($boleto->obtenePluspagado(), $pagaplus);
    
    }


    public function testIdtarjeta() {
    
        $tarjeta = new Tarjeta();
        $valor = 14.80;
        
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

       
        $this->assertEquals($boleto->obtenerIDtarjeta(),0);
       
    }

       public function testFecha() {
    	
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
