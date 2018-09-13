<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface {
  
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

    public function pagarCon(TarjetaInterface $tarjeta, TiempoInterface $fecha){
    		

        if($tarjeta->obtenerUltimoBoleto()==0){
          $tarjeta->ultimoboleto=$fecha;
        $saldo=$tarjeta->obtenerSaldo();
        $precio=$tarjeta->obtenerPrecio();
        if($tarjeta->obtenercantPlus()==2){
    			
          if($saldo>$precio){
            $tarjeta->restarSaldo();
            $pagaplus=0;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;
          }else{
            return false;
          }
        }
        elseif($tarjeta->obtenercantPlus()==1){

          if($saldo>($precio+14.8)){
              
            $tarjeta->restarSaldo();
            $pagaplus=1;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;}
          else{
            return false;
          }

        }

			

        if($saldo>($precio+29.6)){
              
            $tarjeta->restarSaldo();
            $pagaplus=2;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;}
          else{
            return false;
          }
        // else{
    		// return false;
    		// }
    }

          else{
              $ultimo=$tarjeta->obtenerUltimoBoleto();
              $tipo  =$tarjeta->obtenerTipo();
              if($tipo==2){
               if($fecha-$ultimo>300){
                  return false;
              }
            }
              if($tipo==4){
                $cantviajes =$tarjeta->obtenerCant();

                if($cantviajes>0){

                   $tarjeta->ultimoboleto=$fecha;
        $saldo=$tarjeta->obtenerSaldo();
        $precio=$tarjeta->obtenerPrecio();

        if($tarjeta->obtenercantPlus()==2){
          
          if($saldo>$precio){
            $tarjeta->restarSaldo();
            $pagaplus=0;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;
          }else{
            return false;
          }
        }
        elseif($tarjeta->obtenercantPlus()==1){

          if($saldo>($precio+7.4)){
              
            $tarjeta->restarSaldo();
            $pagaplus=1;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;}
          else{
            return false;
          }

        }

        if($saldo>($precio+14.8)){
              
            $tarjeta->restarSaldo();
            $pagaplus=2;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;}
          else{
            return false;
          }
                }


                 else{

                      $tarjeta->ultimoboleto=$fecha;
        $saldo=$tarjeta->obtenerSaldo();
        $precio=$tarjeta->obtenerPrecio();

        if($tarjeta->obtenercantPlus()==2){
          
          if($saldo>$precio+7.4){
            $tarjeta->restarSaldo();
            $pagaplus=0;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;
          }else{
            return false;
          }
        }
        elseif($tarjeta->obtenercantPlus()==1){

          if($saldo>($precio+7.4+14.8)){
              
            $tarjeta->restarSaldo();
            $pagaplus=1;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;}
          else{
            return false;
          }

        }

      

        if($saldo>($precio+7.4+14.8+14.8)){
              
            $tarjeta->restarSaldo();
            $pagaplus=2;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;}
          else{
            return false;
          }


         }
       }
  }




  }




}