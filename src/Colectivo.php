<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface {
  
  	protected $linea;
  	protected $empresa;
  	protected $numero;
    protected $bandera;

  	public function __construct ($linea, $empresa, $numero, $bandera){
  		$this->linea = $linea;
  		$this->empresa = $empresa;
  		$this->numero = $numero;
      $this->bandera = $bandera;
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

    public function getbandera(){
      return $this->bandera;
    }

    public function pagarCon(TarjetaInterface $tarjeta, TiempoInterface $fecha){

        if($tarjeta->obtenerUltimoBoleto() == 0){
          $tarjeta->cambiarUltimoBoleto($fecha->tiempoFalso());

          if($tarjeta->obtenerTipo() == 2){
                return $this->esMedioVoleto($tarjeta, $fecha);
              }
              elseif ($tarjeta->obtenerTipo() == 3) {
                return $this->esMedioUniversitario($tarjeta, $fecha);
              }
              elseif ($tarjeta->obtenerTipo() == 1){
                return $this->esFranCompleta($tarjeta, $fecha);
              }
              else{
                $multiplicador = 1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
              }
        }
          else{
              $ultimo=$tarjeta->obtenerUltimoBoleto();

              if($tarjeta->obtenerTipo() == 2){
                return $this->esMedioVoleto($tarjeta, $fecha);
              }
              elseif ($tarjeta->obtenerTipo() == 3) {
                return $this->esMedioUniversitario($tarjeta, $fecha);
              }
              elseif ($tarjeta->obtenerTipo() == 1){
                return $this->esFranCompleta($tarjeta, $fecha);
              }
              else{
                $multiplicador = 1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
              }
          }
    }

    public function esMedioVoleto(TarjetaInterface $tarjeta, TiempoInterface $fecha){
        $ultimo = $tarjeta->obtenerUltimoBoleto();
        if($fecha->TiempoReal()-$ultimo<300){
                  $multiplicador = 2;
                  return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
        }
        else{
                $multiplicador = 1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
        }

    }

    public function esMedioUniversitario(TarjetaInterface $tarjeta, TiempoInterface $fecha){
      //FALTA QUE NO SE PUEDAN HACER MAS DE DOS VIAJES POR DIA!!!!!!!
      $ultimo = $tarjeta->obtenerUltimoBoleto();
      if($fecha->TiempoReal()-$ultimo<300){
                  $multiplicador = 2;

                  return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
        }
        else{
                $multiplicador = 1;
                return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
        }

    }

    public function esFranCompleta(TarjetaInterface $tarjeta, TiempoInterface $fecha){
                  $multiplicador = 0;
                  return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
    }

    public function pagaNormal(TarjetaInterface $tarjeta, TiempoInterface $fecha, $multiplicador){

          $saldo=$tarjeta->obtenerSaldo();
          $precio=$tarjeta->obtenerPrecio() * $multiplicador;
        if($tarjeta->obtenercantPlus() == 2){
          
          if($saldo>$precio){
            $tarjeta->restarSaldo($precio);
            $pagaplus = 0;
            $boleto1= new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            $tarjeta->cambiarBoleto($boleto1);
            $tarjeta->colectivoAntyAct($this);
            return $boleto1;
          }else{
            return false;
          }
        }
        elseif($tarjeta->obtenercantPlus() == 1){

          if($saldo>($precio+14.8)){
            
            $precio += 14.8;
            $pagaplus = 1; 
            $tarjeta->restarSaldo($precio);
            $boleto1 = new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            $tarjeta->cambiarBoleto($boleto1);
            $tarjeta->colectivoAntyAct($this);
            return $boleto1;
          }
          else{
            return false;
          }

        }
        if($saldo>($precio+29.6)){
            
            $precio += 29.6;
            $pagaplus = 2;
            $tarjeta->restarSaldo($precio);
            $boleto1 = new Boleto($precio,$this,$tarjeta,$fecha,$pagaplus);
            $tarjeta->cambiarBoleto($boleto1);
            $tarjeta->colectivoAntyAct($this);
            return $boleto1;
          }
          else{
            return false;
          }
    }

  public function esTrasbordo(TarjetaInterface $tarjeta, TiempoInterface $fecha){
      if($tarjeta->lineasDistintas()){
        $tiempo = $fecha->TiempoReal();
        $dia=date("w", $tiempo); //Domingo 0, Sabado 6
        $hora=date("G", $tiempo); //Hora de 0 a 23

        if($hora > 22 || $hora < 6){
          return true;
        }

        if($dia == 0 || $fecha->esFeriado()){
          if($hora >= 6 && $hora <=22 && $fecha->TiempoReal()-$tarjeta->obtenerUltimoBoleto()<5400){
            return true;
          }
        }


        if($dia >= 1 && $dia <= 5 && $hora >= 6 && $hora <=22){
          if($fecha->TiempoReal()-$tarjeta->obtenerUltimoBoleto()<3600){
            //$multiplicador = 0.33;
            //return $this->pagaNormal($tarjeta, $fecha, $multiplicador);
            return true; 
          }
          else {
            false;
          }
        }
        elseif($dia == 6){
          if($hora >= 6 && $hora <=14 && $fecha->TiempoReal()-$tarjeta->obtenerUltimoBoleto()<3600){
            return true;
          }
          elseif($hora > 14 && $hora <= 22 && $fecha->TiempoReal()-$tarjeta->obtenerUltimoBoleto()<5400){
            return true;
          }
          else{
            return false;
          }
        }
        else{
          return false;
        }
      }//fin del primer if.
      else{
        return false;
      }

            
  }

}
