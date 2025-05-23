<?php
class Cliente {
    // atributos privados
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto; 

    // metodo constructor
    public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono, $neto) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->neto = $neto;
    }

    // getter
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getNeto() {
        return $this->neto;
    }

    // setter    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setNeto($neto) {
        $this->neto = $neto;
    }

    public function __toString() {
        return "Cliente: " . $this->getNombreCompleto() . 
               "\nDNI: " . $this->getDni() . 
               "\nContacto: " . $this->getTelefono() . " | " . $this->getMail() .
               "\nDirección: " . $this->getDireccion() .
               "\nNeto mensual: $" . $this->getNeto();
    }
}
?>