<?php
namespace TrabajoTarjeta;

class Tiempo implements TiempoInterface {

	protected $tiempo;
	protected $feriado;

	public function __construct ($inicia = 0, $feriado = false){
		$this->tiempo = $inicia;
		$this->feriado = $feriado;
		}	

	public function TiempoReal(){
		return time();
	}

	public function avanza ($segundos){
		$this->tiempo += $segundos;
		}

	public function tiempoFalso(){
		return $this->tiempo;
		}

	public function esFeriado(){
		return $this->feriado;	
	}

}



