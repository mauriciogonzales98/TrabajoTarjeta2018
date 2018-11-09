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

    private function pagaNormal(TarjetaInterface $tarjeta, TiempoInterface $fecha, $multiplicador){

          $saldo=$tarjeta->obtenerSaldo();
          $precio=$tarjeta->obtenerPrecio() * $multiplicador;
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
            return $boleto1;
          }
          else{
            return false;
          }

        }
        if($saldo>($precio+29.6)){
              
            $tarjeta->restarSaldo();
            $pagaplus=2;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;
          }
          else{
            return false;
          }
    }

    public function pagarCon(TarjetaInterface $tarjeta, TiempoInterface $fecha){

        if($tarjeta->obtenerUltimoBoleto()==0){
          $tarjeta->ultimoboleto=$fecha;
          $multiplicador=1;
          return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
        //   $saldo=$tarjeta->obtenerSaldo();
        //   $precio=$tarjeta->obtenerPrecio();
        // if($tarjeta->obtenercantPlus()==2){
    			
        //   if($saldo>$precio){
        //     $tarjeta->restarSaldo();
        //     $pagaplus=2;
        //     $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
        //     return $boleto1;
        //   }else{
        //     return false;
        //   }
        // }
        // elseif($tarjeta->obtenercantPlus()==1){

        //   if($saldo>($precio+14.8)){
              
        //     $tarjeta->restarSaldo();
        //     $pagaplus=2;
        //     $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
        //     return $boleto1;
        //   }
        //   else{
        //     return false;
        //   }

        // }

        // if($saldo>($precio+29.6)){
              
        //     $tarjeta->restarSaldo();
        //     $pagaplus=2;
        //     $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
        //     return $boleto1;
        //   }
        //   else{
        //     return false;
        //   }
        // else{
    		// return false;
    		// }
    }

          else{
              $ultimo=$tarjeta->obtenerUltimoBoleto();
              $tipo=$tarjeta->obtenerTipo();
              if($tipo==2){
               if($fecha-$ultimo<300){
                  $multiplicador=2;
                  return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
              }
              else{
                $multiplicador=1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
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

  public function esValidoTrasbordo(TarjetaInterface $tarjeta, TiempoInterface $fecha){

      if($tarjeta->obtenerUltimoBoleto()==0){

          return false;
        }else{

          $tarjeta->ultimoboleto=$fecha;
          $saldo=$tarjeta->obtenerSaldo();
          $precio=$tarjeta->obtenerPrecio();
          $dia = date('N');
          $hora = date('G');
          if($dia<=1 && $dia>=5){
            if($hora<=22 && $hora>=6){
              return true;
            }

          }
        }
  
  }



}