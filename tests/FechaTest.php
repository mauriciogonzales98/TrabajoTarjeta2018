<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TiempoTest extends TestCase {

    public function TiempoTest(){
        $tiempo = new Tiempo();
        $t=time();
        $this->assertEquals($tiempo->Tiempo(),$t;
    }

    public function TiempoFalsoTest(){
        $tiempo= new TiempoFalso();
        $this->assertEquals($tiempo->Tiempo(),0);
        $tiempo->avanza(1);
        $this->assertEquals($tiempo->tiempoFlaso(),1);
        $tiempo->avanza(59);
        $this->assertEquals($tiempo->tiempoFalso(),60);
    }
   
}