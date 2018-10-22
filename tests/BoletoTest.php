<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {

    public function testObtenerValor() {
        $valor = 14.80;
        $boleto = new Boleto($valor, NULL, NULL, NULL, 2);

        $this->assertEquals($boleto->obtenerValor(), $valor);
    }

    public function testObtenerSaldotarjeta() {
    
        $tarjeta = new Tarjeta();
        $valor = 14.80;
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

        $this->assertEquals($boleto->obtenerSaldo(),0.0);
        $tarjeta->recargar(14.80);
        $this->assertEquals($boleto->obtenerSaldo(),14.80);
    }



    public function testPluspagado() {
    	
		$valor = 14.80;
		$pagaplus =2;
        $boleto = new Boleto($valor, NULL, NULL, NULL, 2);

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
		$fecha= 100;
        $boleto = new Boleto($valor, NULL, NULL, $fecha, 2);

        $this->assertEquals($boleto->obtenerFecha(),$fecha );
    
    }


      public function testTipo() {
    
        $tarjeta = new Tarjeta();
        $valor = 14.80;
        
        $boleto = new Boleto($valor, NULL, $tarjeta, NULL, 2);

       
        $this->assertEquals($boleto->obtenerTipo(),0);
       
    }

    /*public function obtenerColectivo() {
    	
        
        
        $boleto = new Boleto($valor, NULL, NULL, NULL, 2);

       
        $this->assertEquals($boleto->obtenerColectivo(),0);
       
    } */
}
