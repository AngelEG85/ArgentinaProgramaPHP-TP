<?php
// Creación de una clase sencilla
// Crear una clase "Persona" con las propiedades "nombre", "edad" y "email".


class Persona {
    protected $nombre;
    protected $edad;
    protected $email;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function setEdad($edad) {
        $this->edad = $edad;
    }
    public function getEdad() {
        return  $this->edad;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {    
        return $this->email;
    }

   // Agregar un método para imprimir los datos de la persona en pantalla.
    public function getPresentacion(){
        echo '<div>
        <h3>PRESENTACIÓN</h3>
        <table style="text-align:left;">
            <tr>
              <th scope="row"> Item</th>
              <th>Descripción</th>
            </tr>
          
            <tr>
               <th>Nombre</th>
               <td> '.$this->getNombre().' </td>
           
            </tr>
          
            <tr>
          
              <th>Edad</th>
          
              <td>'.$this->getEdad().'</td>
           
            </tr>
          
            <tr>
          
              <th>email</th>
          
              <td>'.$this->getEmail().'</td>
          
            </tr>

            
          
          </table>
    </div>';
    }
}

//     Herencia
// Crear una clase "Empleado" que herede de "Persona".

 class Empleado extends Persona{
    // Agregar la propiedad "puesto" a la clase "Empleado".
    protected $puesto;

    public function setPuesto($puesto) {
        $this->puesto = $puesto;
    }
    public function getPuesto() {    
        return $this->puesto;
    }

    // Agregar un método para imprimir los datos del empleado en pantalla.
    public function getPresentacion(){

        parent::getPresentacion();
        echo '
        <table>
            <tr>
            <th>puesto</th>    
            <td>'.$this->getPuesto().'</td>
            </tr>
        </table>';

        
        }
 }

//  Polimorfismo e interfaces
// ● Crear una interfaz "Vehiculo" con los métodos "acelerar" y "frenar".


 interface iVehiculo{
    //definimos la clase ivechiculo
    public function acelerar($velocidad);
    public function frenar($intensidad);
 }
// ● Crear una clase "Automovil" que implemente la interfaz "iVehiculo".
 class Automovil implements iVehiculo{

    private $marca;
    private $modelo;
    private $velocidadActual;


    public function acelerar($velocidad){
        $this->velocidadActual = $this->velocidadActual + $velocidad;
    }
    public function frenar($intensidad){
        $this->velocidadActual -= $intensidad;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function getMarca() {
        return $this->marca;
    }
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function getModelo() {
        return  $this->modelo;
    }

    public function setVelocidadActual($velocidadActual) {
        $this->velocidadActual = $velocidadActual;
    }
    public function getVelocidadActual() {
        return  $this->velocidadActual;
    }

     //● Agregar métodos para imprimir los datos del automóvil y la bicicleta en  pantalla.

    public function Presentacion() {
        echo "Automóvil: Marca - {$this->marca}, Modelo - {$this->modelo}, Velocidad Actual - {$this->velocidadActual} km/h";
    }
 }
// ● Crear una clase "Bicicleta" que también implemente la interfaz "iVehiculo".
//Clase Bicicleta que implementa la interfaz iVehiculo
class Bicicleta implements iVehiculo {
    private $marca;
    private $modelo;
    private $velocidadActual;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidadActual = 0;
    }

    public function acelerar($velocidad) {
        $this->velocidadActual += $velocidad;
    }

    public function frenar($intensidad) {
        $this->velocidadActual -= $intensidad;
    }
 //● Agregar métodos para imprimir los datos del automóvil y la bicicleta en  pantalla.
    public function Presentacion() {
        echo "Bicicleta: Marca - {$this->marca}, Modelo - {$this->modelo}, Velocidad Actual - {$this->velocidadActual} km/h";
    }
}



// Abstracción y encapsulamiento
// ● Crear una clase "CuentaBancaria" con las propiedades "saldo" y
// "numeroCuenta".
// ● Agregar métodos para depositar y retirar dinero de la cuenta bancaria.
// ● Utilizar setters y getters para acceder a las propiedades "saldo" y
// "numeroCuenta" de forma segura.

class CuentaBancaria{
    protected $saldo;
    protected $numeroCuenta;

    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setDepositar($importe){

        $this->saldo = ($this->saldo + $importe);
       
    }

    public function setRetirar($importe){

        $this->saldo  = ($this->saldo - $importe);
       
    }

    public function setNumeroCuenta($numeroCuenta) {
        $this->numeroCuenta = $numeroCuenta;
    }

    public function getNumeroCuenta() {
        return  $this->numeroCuenta;
    }
}

// Creación de una clase abstracta
// ● Crear una clase abstracta "FiguraGeometrica" con el método abstracto
// "calcularArea".

abstract class FiguraGeometrica {

    abstract public function calcularArea();
}
// ● Crear dos clases "Cuadrado" y "Triángulo" que hereden de
// "FiguraGeometrica".
// ● Implementar el método "calcularArea" en cada una de las clases hijas.

  class cuadrado extends FiguraGeometrica {
        private $lado;

        public function __construct($lado){
            $this->lado=$lado;
        }
        
      public function calcularArea() {
          $area = $this->lado * $this->lado;
          return $area;
      }
  }

  class triangulo extends FiguraGeometrica {
    private $base;
    private $altura;

    public function __construct($base,$altura)
    {
     $this->base = $base;
     $this->altura = $altura;   
    }

    public function calcularArea() {
          $area = ($this->base * $this->altura)/2;
          return $area;
      }
  }

  class ConexionDB {
    // variable para guardar la instancia
    private static $instancia;
    // Variables de configuración de la base de datos
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "";
    private $base_datos = "incoming_rfid";
    private $conexion;

    // Constructor privado para prevenir la creación de instancias a través del operador new
    private function __construct() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método público para obtener la única instancia de la clase
    public static function getConexion() {
        // Si no existe una instancia, se crea una
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia->conexion;
    }

    // Método privado para prevenir la clonación de la instancia
    private function __clone() {}

    // Método privado para prevenir la serialización de la instancia
    public function __wakeup() {}
}

// Creación de una clase Factory
// ● Crear una clase "Mascota" con las propiedades "nombre" y "edad".
// ● Crear una clase "Perro" que herede de "Mascota" y tenga una propiedad
// adicional "raza".
// ● Crear una clase "Gato" que herede de "Mascota" y tenga una propiedad
// adicional "pelaje".
// ● Crear una clase "MascotaFactory" con el método "crearMascota" que
// reciba como parámetro una cadena que indique la especie de la mascota
// ("perro" o "gato") y devuelva un objeto del tipo correspondiente.

class Mascota {
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function Presentar() {
        return "Nombre: {$this->nombre}, Edad: {$this->edad}";
    }
}

class Perro extends Mascota {
    public $raza;

    public function __construct($nombre, $edad, $raza) {
        parent::__construct($nombre, $edad);
        $this->raza = $raza;
    }

    public function Presentar() {
        return parent::Presentar() . ", Raza: {$this->raza}";
    }
    
}
class Gato extends Mascota {
    public $pelaje;

    public function __construct($nombre, $edad, $pelaje) {
        parent::__construct($nombre, $edad);
        $this->pelaje = $pelaje;
    }

    public function Presentar() {
        return parent::Presentar() . ", Pelaje: {$this->pelaje}";
    }
}

// Clase MascotaFactory
class MascotaFactory {
    public static function crearMascota($especie, $nombre, $edad, $atributoEspecie) {
        if ($especie === "perro") {
            return new Perro($nombre, $edad, $atributoEspecie);
        } elseif ($especie === "gato") {
            return new Gato($nombre, $edad, $atributoEspecie);
        } else {
            return "Especie no válida";
        }
    }
}

// Creación de una clase Trait
// ● Crear una clase "Color" con la propiedad "color".

trait Color {
    protected $color;

    public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }
}

// ● Crear dos clases "Automovil2" y "Bicicleta2" que utilicen el Trait "Color".

class Automovil2 {
    use Color;
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function Presentacion() {
        echo "Automóvil: Marca - {$this->marca}, Modelo - {$this->modelo}, Color - {$this->getColor()}";
    }
}

class Bicicleta2 {
    use Color;
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function Presentacion() {
        echo "Bicicleta: Marca - {$this->marca}, Modelo - {$this->modelo}, Color - {$this->getColor()}";
    }
}
?>








