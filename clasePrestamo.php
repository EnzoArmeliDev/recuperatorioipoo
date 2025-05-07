<?php
class Prestamo {
    // atributos privados
    private $identificacion;
    private $monto;
    private $cantidadDeCuotas;
    private $tasaInteres;
    private $cliente;
    private $códigoElectrodoméstico;
    private $fechaOtorgamiento;
    private $cuotas = [];
    
    private static $ultimoId = 0; // contador central para generar IDs únicos en cada nuevo préstamo

    // metodo constructor
    public function __construct($monto, $cantidadDeCuotas, $tasaInteres, $cliente) {
        self::$ultimoId++; // incrementa en 1 el valor de $ultimoId cada vez que se crea un nuevo préstamo.
        $this->identificacion = self::$ultimoId;
        $this->monto = $monto;
        $this->cantidadDeCuotas = $cantidadDeCuotas;
        $this->tasaInteres = $tasaInteres;
        $this->cliente = $cliente;
    }

    // getters
    public function getIdentificacion() {
        return $this->identificacion;
    }

    public function getMonto() {
        return $this->monto;
    }

    public function getCantidadDeCuotas() {
        return $this->cantidadDeCuotas;
    }

    public function getTasaInteres() {
        return $this->tasaInteres;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getCuotas() {
        return $this->cuotas;
    }

    // setters
    public function setMonto($monto) {
        $this->monto = $monto;
    }

    public function setCantidadDeCuotas($cantidadDeCuotas) {
        $this->cantidadDeCuotas = $cantidadDeCuotas;
    }

    public function setTasaInteres($tasaInteres) {
        $this->tasaInteres = $tasaInteres;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    // Método para calcular el interés de una cuota 
    public function calcularInteresCuota($numCuota) {
        $monto = $this->getMonto();
        $cantidadCuotas = $this->getCantidadDeCuotas();
        $tasa = $this->getTasaInteres();
        
        $resultado = ($monto - (($monto / $cantidadCuotas) * ($numCuota - 1))) * ($tasa / 0.01);
        return $resultado;
    }

    // metodo que otorga un prestamo
    public function otorgarPrestamo() {
    $this->fechaOtorgamiento = date('Y-m-d H:i:s'); 
    
    $this->cuotas = []; 
    
    $montoCapital = $this->monto / $this->cantidadDeCuotas; 
    
    for ($i = 1; $i <= $this->cantidadDeCuotas; $i++) {
        $interes = $this->calcularInteresPrestamo($i); 
        $montoTotalCuota = $montoCapital + $interes; 
        
        $this->cuotas[] = new Cuota(
            $i,                // Número de cuota
            $montoCapital,     // Parte del capital
            $interes,          // Interés calculado
            false              // Inicialmente no cancelada
        );
    }
    }

    public function darSiguienteCuotaPagar() {
        foreach ($this->cuotas as $cuota) {
            if (!$cuota->getCancelada()) {
                return $cuota;  
            }
        }
        return null;  
    }

}