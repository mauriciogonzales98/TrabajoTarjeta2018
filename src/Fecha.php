<?php
namespace TrabajoTarjeta;

class Tiempo implements TiempoInterface {

	public function Tiempo(){
		return time();
	}
}

class TiempoFalso implements TiempoInterface{

	protected $tiempo;

	public function __construct ($inicia = 0){
		$this->tiempo =$inicia;
		}

	public function avanza ($segundos){
		$this->tiempo += $segundos;
		}

	public function tiempo(){
		return $this->tiempo;
		}

	}

} 

