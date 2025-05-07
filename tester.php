<?php
require_once 'claseCliente.php';
require_once 'clasePrestamo.php';
require_once 'claseFinanciera.php';
require_once 'claseCuota.php';

// 1. Crear financiera
$financiera = new Financiera("Prestamos Rápidos", "Av. Principal 100");

// 2. Crear clientes
$cliente1 = new Cliente("Carlos", "López", "33444555", "Calle 123", "carlos@mail.com", "555-1122", 30000);
$cliente2 = new Cliente("Ana", "Martínez", "35666777", "Av. Central 456", "ana@mail.com", "555-3344", 20000);

// 3. Crear préstamos
$prestamo1 = new Prestamo(60000, 12, 0.1, $cliente1); // Cuota $5000 (16.67% del neto)
$prestamo2 = new Prestamo(40000, 5, 0.08, $cliente2);  // Cuota $8000 (40% del neto)

// 4. Incorporar préstamos (usando el método correcto)
$financiera->agregarPrestamo($prestamo1); // Cambié a agregarPrestamo que es el nombre usado en tu implementación
$financiera->agregarPrestamo($prestamo2);

// 5. Mostrar estado inicial
echo "=== ESTADO INICIAL ===\n";
echo $financiera;

// 6. Otorgar préstamos que califiquen
echo "\n=== PROCESANDO PRÉSTAMOS ===\n";
$financiera->otorgarPrestamoSiCalifica();

// 7. Mostrar estado final
echo "\n=== ESTADO FINAL ===\n";
echo $financiera;

// 8. Probar consulta de cuota
echo "\n=== PRÓXIMA CUOTA A PAGAR ===\n";
$proximaCuota = $financiera->informarCuotaPagar(1);
if ($proximaCuota) {
    echo $proximaCuota;
    echo "\nMonto total: $" . number_format($proximaCuota->darMontoFinalCuota(), 2);
} else {
    echo "No hay cuotas pendientes";
}
?>