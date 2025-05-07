<?php
class Cuota {
    // atributos privados
    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada;

    // metodo constructor
    public function __construct($numero, $monto_cuota, $monto_interes) {
        $this->numero = $numero;
        $this->monto_cuota = $monto_cuota;
        $this->monto_interes = $monto_interes;
        $this->cancelada = false;
    }

    // getters
    public function getNumero() {
        return $this->numero;
    }

    public function getMontoCuota() {
        return $this->monto_cuota;
    }

    public function getMontoInteres() {
        return $this->monto_interes;
    }

    public function getCancelada() {
        return $this->cancelada;
    }

    // setters
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setMontoCuota($monto_cuota) {
        $this->monto_cuota = $monto_cuota;
    }

    public function setMontoInteres($monto_interes) {
        $this->monto_interes = $monto_interes;
    }

    public function setCancelada($cancelada) {
        $this->cancelada = $cancelada;
    }

    // metodo que retorna el importe de la cuota mas los intereses que deben ser aplicados
    public function darMontoFinalCuota() {
        return $this->getMontoCuota() + $this->getMontoInteres();
    }
}