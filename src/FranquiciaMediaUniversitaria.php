<?php
namespace TrabajoTarjeta;

 class FranquiciaMediaUniversitaria Extends Tarjeta { 

 	protected $cantVoletosDia;

	public function __construct(){
		  $this->precio = 7.4;
		  $this->diaViejo = 0;
		  $this->Tipo = 3;
		  $this->cantBoletosDia = 0;
		}

 	public function getCantBoletos(){
 		return $this->cantBoletosDia;
 	}

 	public function boletosDia(TiempoInterface $tiempo){

 		$dia = date('j', $tiempo->TiempoReal());

	 	if($this->diaViejo != $dia){
	 		$this->cantBoletosDia = 0;
	 		$this->diaViejo = $dia;
	 		$this->cantBoletosDia += 1;
	 		return true;
	 	}
	 	else{
	 		if($this->cantBoletosDia < 2){
	 			$this->cantBoletosDia += 1;
	 			return true;
	 		}
	 		else{
	 			return false;
	 		}
	 	}
 	}

 }