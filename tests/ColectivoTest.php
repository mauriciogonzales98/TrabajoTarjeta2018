
<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testAlgoUtil() {

    	$colectivo1= new Colectivo("132","rodriputo",69);
    	$this->assertEquals($colectivo1->getlinea(),"132");


    }
}
