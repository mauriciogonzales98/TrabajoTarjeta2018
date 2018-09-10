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
        if($tarjeta->obtenercantPlus()=2){
    			
          if($saldo>$precio){
            $tarjeta->restarSaldo();
            $boleto1= new Boleto($precio,$this,$tarjeta);
            return $boleto1;
          }else{
            return false;
          }
        }
        elseif($tarjeta->obtenercantPlus()=1){

          if($saldo>($precio+14.8)){
              
            $tarjeta->restarSaldo();
            $pagaplus=1;
            $boleto1= new Boleto($precio,$this,$tarjeta,$pagaplus);
            return $boleto1;}
          else{
            return false;
          }

        }

			}

        if($saldo>($precio+29.6)){
              
            $tarjeta->restarSaldo();
            $pagaplus=2;
            $boleto1= new Boleto($precio,$this,$tarjeta,$pagaplus);
            return $boleto1;}
          else{
            return false;
          }

        }

      }
    		else{
    		return false;
    		}
    }

}