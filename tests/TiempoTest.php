<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TiempoTest extends TestCase {

    public function testTiempoReal(){
        $tiempo = new Tiempo();
        $t=time();

        $this->assertEquals($tiempo->TiempoReal(),$t);
    }

    public function testTiempoFalso(){
        $tiempo= new Tiempo();
        

        $this->assertEquals($tiempo->tiempoFalso(),0);
        
        $tiempo->avanza(1);
        $this->assertEquals($tiempo->tiempoFalso(),1);
        
        $tiempo->avanza(59);
        $this->assertEquals($tiempo->tiempoFalso(),60);
    }
   
}
