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
          $tarjeta->cambiarUltimoBoleto($fecha->tiempoFalso());
          $tipo=$tarjeta->obtenerTipo();
          if($tipo==2){
                $boleto = $this->esMedioVoleto($tarjeta, $fecha);
                return $boleto;
              }
              elseif ($tipo==3) {
                return $this->esMedioUniversitario($tarjeta, $fecha);
              }
              elseif ($tipo==1){
                return $this->esFranCompleta($tarjeta, $fecha);
              }
              else{
                $multiplicador=1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
              }
        }
          else{
              $ultimo=$tarjeta->obtenerUltimoBoleto();
              $tipo=$tarjeta->obtenerTipo();
              if($tipo==2){
                return $this->esMedioVoleto($tarjeta, $fecha);
              }
              elseif ($tipo==3) {
                return $this->esMedioUniversitario($tarjeta, $fecha);
              }
              elseif ($tipo==1){
                return $this->esFranCompleta($tarjeta, $fecha);
              }
              else{
                $multiplicador=1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
              }
          }
    }

    public function esMedioVoleto(TarjetaInterface $tarjeta, TiempoInterface $fecha){
        $ultimo = $tarjeta->obtenerUltimoBoleto();
        if($fecha-$ultimo<300){
                  $multiplicador=2;
                  $bol = $this->pagaNormal($tarjeta, $fecha, $multiplicador);
                  return $bol;
        }
        else{
                $multiplicador=1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
        }

    }

    public function esMedioUniversitario(TarjetaInterface $tarjeta, TiempoInterface $fecha){
      //FALTA QUE NO SE PUEDAN HACER MAS DE DOS VIAJES POR DIA!!!!!!!
      $ultimo = $tarjeta->obtenerUltimoBoleto();
      if($fecha-$ultimo<300){
                  $multiplicador=2;

                  return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
        }
        else{
                $multiplicador=1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
        }

    }

    public function esFranCompleta(TarjetaInterface $tarjeta, TiempoInterface $fecha){
                  $multiplicador=0;
                  return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
    }

    public function pagaNormal(TarjetaInterface $tarjeta, TiempoInterface $fecha, $multiplicador){

          $saldo=$tarjeta->obtenerSaldo();
          $precio=$tarjeta->obtenerPrecio() * $multiplicador;
        if($tarjeta->obtenercantPlus()==2){
          
          if($saldo>$precio){
            $tarjeta->restarSaldo($precio);
            $pagaplus=0;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;
          }else{
            return false;
          }
        }
        elseif($tarjeta->obtenercantPlus()==1){

          if($saldo>($precio+14.8)){
            
            $precio += 14.8;
            $pagaplus=1; 
            $tarjeta->restarSaldo($precio);
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;
          }
          else{
            return false;
          }

        }
        if($saldo>($precio+29.6)){
            
            $precio += 29.6;
            $pagaplus=2;
            $tarjeta->restarSaldo($precio);
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            return $boleto1;
          }
          else{
            return false;
          }
    }

  public function esValidoTrasbordo(TarjetaInterface $tarjeta, TiempoInterface $fecha){

      if($tarjeta->obtenerUltimoBoleto()==0){

          return false;
        }else{

          $tarjeta->ultimoboleto=$fecha->tiempoFalso();
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
