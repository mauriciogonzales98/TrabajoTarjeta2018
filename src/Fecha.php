<?php
namespace TrabajoTarjeta;

class Tiempo implements TiempoInterface {

	protected $tiempo;

	public function __construct ($inicia = 0){
		$this->tiempo =$inicia;
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

	}


}
