<?php
namespace TrabajoTarjeta;

 class FranquiciaMedia Extends Tarjeta {    

	function __construct($saldo=0.0, $precio=7.4, $viajePlus=2, $totaldeviajes=0, $Tipo=0, $ultimoboleto=0, $boleto=NULL){  
		$this->saldo = $saldo;
		$this->precio = $precio;
		$this->viajePlus = $viajePlus;
		$this->totaldeviajes = $totaldeviajes;
		$this->IDtarjeta = rand(1,30);
		$this->Tipo = $Tipo;
		$this->ultimoboleto = $ultimoboleto;
		$this->boleto = $boleto;

		}

 }
