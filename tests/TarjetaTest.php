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
        $this->assertTrue($tarjeta->recargar(510.15));
        $this->assertEquals($tarjeta->obtenerSaldo(), $saldoAnterior + 510.15 + 81.93);

        $saldoAnterior = $tarjeta->obtenerSaldo();
        $this->assertTrue($tarjeta->recargar(962.59));
        $this->assertEquals($tarjeta->obtenerSaldo(), $saldoAnterior + 962.59 + 221.58);


        
    }

    public function testFranquiciaMedia(){

      $franquicia = new FranquiciaMedia();
       $this->assertTrue($franquicia->recargar(20));
       $this->assertTrue($franquicia->restarSaldo(7.4));
       $this->assertEquals($franquicia->obtenerSaldo(),12.6);

    }
    public function testFranquiciaCompleta(){

      $franquicia = new FranquiciaCompleta();
       $this->assertTrue($franquicia->recargar(20));
       $this->assertTrue($franquicia->restarSaldo(0));
       $this->assertEquals($franquicia->obtenerSaldo(),20);

    }

    /**
     * Comprueba que la tarjeta no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $tarjeta = new Tarjeta();

      $this->assertFalse($tarjeta->recargar(15));
      $this->assertEquals($tarjeta->obtenerSaldo(), 0);
      $this->assertFalse($tarjeta->recargar(11));
  }

    public function testViajePlus() {
      $tarjeta = new Tarjeta($saldo= 10);
      $pago = 29.6;
      $this->assertTrue($tarjeta->restarSaldo($pago));

      $tarjeta1 = new Tarjeta($saldo=0.0, $precio=14.8, $viajePlus=0, $totaldeviajes=0, $Tipo=0, $ultimoboleto=0);
      $this->assertFalse($tarjeta1->restarSaldo($pago)); 

      $tarjeta2 = new Tarjeta($saldo=0.0, $precio=14.8, $viajePlus=2, $totaldeviajes=0, $Tipo=0, $ultimoboleto=0);
      $this->assertTrue($tarjeta2->restarSaldo($pago));
    }

    public function testobtenerCant() {
      $tarjeta = new Tarjeta();
      $this->assertEquals($tarjeta->obtenerCant(), 1);
    }

    public function testFMU() {
      $tarjeta = new FranquiciaMediaUniversitaria();
      $this->assertEquals($tarjeta->getCantBoletos(),0);
    }
}