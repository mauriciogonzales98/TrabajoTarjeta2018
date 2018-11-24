<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TiempoTest extends TestCase {

    public function testTiempoReal(){
        $tiempo = new Tiempo();
        $t=time();

        $this->assertEquals($tiempo->time(),$t);
    }

    public function testTiempoFalso(){
        $tiempo= new TiempoFalso();
        

        $this->assertEquals($tiempo->time(),0);
        
        $tiempo->Avanzar(1);
        $this->assertEquals($tiempo->time(),1);
        
        $tiempo->Avanzar(59);
        $this->assertEquals($tiempo->time(),60);

        $this->assertFalse($tiempo->esFeriado());
    }
   
}
