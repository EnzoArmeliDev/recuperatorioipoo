<?php
class Financiera {
    // atributos privados
    private $denominacion;
    private $direccion;
    private $colPrestamos;  

    // metodo constructor
    public function __construct($denominacion, $direccion) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colPrestamos = [];
    }

    // getters
    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getColPrestamos() {
        return $this->colPrestamos;
    }

    // setters
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function agregarPrestamo($prestamo) {
        $this->colPrestamos[] = $prestamo;
    }

    // metodo __toString()
    public function __toString() {
        $info = "FINANCIERA:\n";
        $info .= "Denominación: " . $this->denominacion . "\n";
        $info .= "Dirección: " . $this->direccion . "\n";
        $info .= "Préstamos otorgados (" . count($this->colPrestamos) . "):\n";
            
        // lista de préstamos
        foreach ($this->colPrestamos as $prestamo) {
            $info .= "  - ID: " . $prestamo->getIdentificacion() . "\n";
            $info .= "    Monto: $" . $prestamo->getMonto() . "\n";
            $info .= "    Cliente: " . $prestamo->getCliente()->getNombre() . "\n";
        }
            
        return $info;
    }
}
?>