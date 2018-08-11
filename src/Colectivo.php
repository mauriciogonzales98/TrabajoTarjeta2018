<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface {
  
  	$precio=14.80;
  	protected $linea;
  	protected $empresa;
  	protected $numero;

  	public function __construct ($linea,$empresa,$numero){
  		$this->linea=$linea;
  		$this->empresa=$empresa;
  		$this->numero=$numero;
  	}

    
    public function getlinea(){
    	return $this->linea;
    }

    public function getempresa(){
    	return $this->empresa;
    }

    public function getnumero(){
    	return $this->numero;
    }

    public function pagarCon(TarjetaiInterface $tarjeta,$precio){
    		$saldo=$tarjeta->obtenerSaldo();
    		if($saldo>$precio){
    			$tarjeta->baja($precio);
    			$boleto1= new boleto($precio,$this,$tarjeta);
    			return $boleto1;

			}
    		else{
    		return else;
    		}
    }

}