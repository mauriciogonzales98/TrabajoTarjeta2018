<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TiempoTest extends TestCase {

    public function TiempoRealTest(){
        $tiempo = new TiempoReal();
        $t=time();
        $this->assertEquals($tiempo->TiempoReal(),$t);
    }

    public function TiempoFalsoTest(){
        $tiempo= new tiempoFalso();
        $this->assertEquals($tiempo->tiempoFalso(),0);
        $tiempo->avanza(1);
        $this->assertEquals($tiempo->tiempoFlaso(),1);
        $tiempo->avanza(59);
        $this->assertEquals($tiempo->tiempoFalso(),60);
    }
   
}
