<?php
namespace TrabajoTarjeta;

 class FranquiciaMediaUniversitaria Extends Tarjeta { 

 	protected $cantVoletosDia;

	public function __construct($saldo = 0.0, $precio = 7.4, $viajePlus = 2, $totaldeviajes = 0, $Tipo = 3, $ultimoboleto = 0, $boleto = NULL) {
			$this->saldo = $saldo;
			$this->precio = $precio;
			$this->viajePlus = $viajePlus;
			$this->totaldeviajes = $totaldeviajes;
			$this->ultimoboleto = $ultimoboleto;
			$this->boleto = $boleto;
			$this->diaViejo = 0;
			$this->Tipo = $Tipo;
			$this->cantBoletosDia = 0;
		}

 	public function getCantBoletos(){
 		return $this->cantBoletosDia;
 	}

 	public function boletosDia(TiempoInterface $tiempo){

 		$dia = date('j', $tiempo->time()); //dia del mes 1 al 31

	 	if($this->diaViejo != $dia){
	 		$this->cantBoletosDia = 0;
	 		$this->diaViejo = $dia;
	 		$this->cantBoletosDia += 1;
	 		return true;
	 	} else{
	 		if($this->cantBoletosDia < 2){
	 			$this->cantBoletosDia += 1;
	 			return true;
	 		} else{
	 			return false;
	 		}
	 	}
 	}

 }