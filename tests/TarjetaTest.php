<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

    /**
     * Comprueba que la tarjeta aumenta su saldo cuando se carga saldo válido.
     */
    public function testCargaSaldo() {
        $tarjeta = new Tarjeta();

        $this->assertTrue($tarjeta->recargar(10));
        $this->assertEquals($tarjeta->obtenerSaldo(), 10);

        $saldoAnterior = $tarjeta->obtenerSaldo();
        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($tarjeta->obtenerSaldo(), $saldoAnterior + 20);

        $saldoAnterior = $tarjeta->obtenerSaldo();
        $this->assertTrue($tarjeta->recargar(30));
        $this->assertEquals($tarjeta->obtenerSaldo(), $saldoAnterior + 30);

        $saldoAnterior = $tarjeta->obtenerSaldo();
        $this->assertTrue($tarjeta->recargar(50));
        $this->assertEquals($tarjeta->obtenerSaldo(), $saldoAnterior + 50);

        $saldoAnterior = $tarjeta->obtenerSaldo();
        $this->assertTrue($tarjeta->recargar(100));
        $this->assertEquals($tarjeta->obtenerSaldo(), $saldoAnterior + 100);

        $saldoAnterior = $tarjeta->obtenerSaldo();
        $this->assertTrue($tarjeta->recargar(510,15));
        $this->assertEquals($tarjeta->obtenerSaldo(), $saldoAnterior + 510.15 + 81.93);

        $saldoAnterior = $tarjeta->obtenerSaldo();
        $this->assertTrue($tarjeta->recargar(510,15));
        $this->assertEquals($tarjeta->obtenerSaldo(), $saldoAnterior + 962.59 + 221.58);


        
    }

    public function testFranquiciaMedia(){

      $franquicia = new Tarjeta();
       $this->assertTrue($tarjeta->recargar(10));
        $this->assertTrue($tarjeta->restarSaldo());
         $this->assertEquals($tarjeta->obtenerSaldo(),2.6);

    }
       public function testFranquiciaMedia(){

      $franquicia = new Tarjeta();
       $this->assertTrue($tarjeta->recargar(10));
        $this->assertTrue($tarjeta->restarSaldo());
         $this->assertEquals($tarjeta->obtenerSaldo(),10);

    }



    /**
     * Comprueba que la tarjeta no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $tarjeta = new Tarjeta();

      $this->assertFalse($tarjeta->recargar(15));
      $this->assertEquals($tarjeta->obtenerSaldo(), 0);
  }
}
