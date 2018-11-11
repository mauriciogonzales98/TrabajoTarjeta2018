<?php
namespace TrabajoTarjeta;

 class FranquiciaMediaUniversitaria Extends Tarjeta {    

 	protected $cantVoletosDia;

	public function __construct(){  
		  $this->precio=7.4;
		  $this->totalabonado=2;
		  $this->tipo=3;
		  $this->cantVoletosDia=0;
		}
 public function getCantVoletos(){
 	return $this->cantVoletosDia;
 }
 }
