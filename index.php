<?php
// incluimos lo solicitado en el punto 1)
include("clase23-01.php");

echo "EJERCICIO 1 ";
echo "<br>";

//Creamos el objeto y le asignamos la clase Persona
$Persona1 = new Persona();
$Persona1 ->setEdad('38');
$Persona1 ->setEmail('angel@gmail.com');
$Persona1 ->setNombre('Angel');
// llamamos al metodo presentación
$Persona1 ->getPresentacion();

echo'----------------------------------';
echo "<br>";
echo "EJERCICIO 2 - empleado ";
echo "<br>";

//Creamos el objeto y le asignamos la clase Persona
$Persona2 = new Empleado();
$Persona2 ->setEdad('40');
$Persona2 ->setEmail('izzo@gmail.com');
$Persona2 ->setNombre('Antonio');
$Persona2 ->setPuesto('Gerente Ventas');
// llamamos al metodo presentación
$Persona2 ->getPresentacion();

echo'----------------------------------';
echo "<br>";
echo "EJERCICIO 3 - Polimorfismo e interfaces ";
echo "<br>";
//Creamos el objeto y le asignamos la clase Vehiculo
$Vehiculo_1 = new Automovil();
$Vehiculo_1 ->setMarca('Volkswagen');
$Vehiculo_1 ->setModelo('voyage');
$Vehiculo_1 ->setVelocidadActual('0');
echo "<br>";
// llamamos al metodo presentación
$Vehiculo_1 ->Presentacion();
echo "<br>";
echo 'Aceleramos: 80 km/h .Ahora la velocidad actual es: '.$Vehiculo_1->acelerar(80);
echo $Vehiculo_1->getVelocidadActual();
echo "<br>";

$Bicicleta = new Bicicleta("Trek","Mountain Bike");
$Bicicleta->Presentacion();
echo "<br>";
echo'----------------------------------';
echo "<br>";
echo "EJERCICIO 4 - Cuenta Bancaria ";
echo "<br>";

$CajaAhorro1 = new CuentaBancaria();
echo $CajaAhorro1 ->setNumeroCuenta("123456");
echo "<br>";
echo 'Numero de Cuenta Nro :' . $CajaAhorro1 ->getNumeroCuenta();
echo "<br>";
echo $CajaAhorro1 ->setSaldo('100000');
echo "<br>";
echo 'Obtener Saldo inicial: '.$CajaAhorro1 ->getSaldo();
echo "<br>";
echo 'Aca depositamos 500 '. $CajaAhorro1 -> setDepositar('500');
echo "<br>";
echo 'Consultamos el nuevo saldo: ' . $CajaAhorro1 ->getSaldo();
echo "<br>";
echo 'Retiramos el 500 '.$CajaAhorro1 ->setRetirar('500');
echo "<br>";
echo 'Obtenemos nuevamente el saldo'.$CajaAhorro1 ->getSaldo();
echo "<br>";
echo'----------------------------------';
echo "<br>";
echo "EJERCICIO 5 - Clase Abstracta Figura Geometrica ";
echo "<br>";
//Creamos los dos objetos
$cuadrado = new cuadrado(5);
$triangulo = new triangulo(4,6);

// calculamos e imprimimos el area de cada uno
echo "Área del Cuadrado: " . $cuadrado->calcularArea();
echo "<br>";
echo "Área del Triángulo: " . $triangulo->calcularArea();

echo "<br>";
echo'----------------------------------';
echo "<br>";
echo "EJERCICIO 6 - Singleton ";
echo "<br>";


$conexion = ConexionDB::getConexion();

// Obtiene la instancia de la conexión a la base de datos
$conexion = ConexionDB::getConexion();

$sql = "SELECT * FROM barrio";

// Ejecuta la consulta
$resultado = $conexion->query($sql);

if ($resultado) {
    
    while ($fila = $resultado->fetch_assoc()) {
        // Accede a los datos de cada fila en $fila[van los nombres que tal cual estan en la base de datos]
        $campo1 = $fila['ID_Barrio'];
        $campo2 = $fila['Nombre'];
        // Puedes hacer lo que necesites con los datos
        echo "Barrio: $campo1, Nombre: $campo2<br>";
    }
} else {
   
    echo "Error en la consulta: " . $conexion->error;
}

// Cierra la conexión 
$conexion->close();

echo "<br>";
echo'----------------------------------';
echo "<br>";
echo "EJERCICIO 7 - Clase Factory ";
echo "<br>";

$perro = MascotaFactory::crearMascota("perro", "Max", 5, "San Bernardo");
$gato = MascotaFactory::crearMascota("gato", "Mia", 3, "Poodle");

echo "Presentacion Perro: " . $perro->Presentar();
echo "<br>";
echo "Presentacion Gato: " . $gato->Presentar();
echo "<br>";
echo'----------------------------------';
echo "<br>";
echo "EJERCICIO 8 - Trait ";
echo "<br>";


$auto = new Automovil2("Ford", "Mustang GT");
$auto->setColor("Blanco");

$bici = new Bicicleta2("Trek", "Mountain Bike");
$bici->setColor("Verde");

$auto->Presentacion();
echo "<br>";
$bici->Presentacion();


