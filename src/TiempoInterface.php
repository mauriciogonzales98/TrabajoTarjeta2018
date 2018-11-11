<?php
namespace TrabajoTarjeta;

interface TiempoInterface {

	public function TiempoReal();

	public function avanza($segundos);

	public function tiempoFalso();

}