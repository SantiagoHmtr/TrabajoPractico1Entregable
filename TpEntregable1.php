<?php

Class Viaje {

    private $codigoViaje; //Codigo que se le asigna al viaje
    private $destino;   //Destino del viaje
    private $cantMaxPasajeros;  //Cantidad maxima de pasajeros que pueden ingresar en el viaje
    private $cantidadDePasajeros;   //Cantidad de pasajeros actuales
    private $coleccionPasajeros = [];   //Una coleccion en forma de array multidimensional para almacenar los datos de los pasajeros
    



    #Construsctor
    public function __construct($codigoViaje, $destino, $cantMaxPasajeros)
    {
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        
    }
    #Metodos get y set 
    function getCodigoViaje(){
        return $this->codigoViaje;
    }
    function setCodigoViaje($codigoViaje){
        $this->codigoViaje = $codigoViaje;
    }
    function getDestino(){
        return $this->destino;
    }
    function setDestino($destino){
        $this->destino = $destino;
    }
    function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    function getColeccionPasajeros(){
        return $this->coleccionPasajeros;
    }

    function setColeccionPasajeros($coleccionPasajeros){
        $this->coleccionPasajeros = $coleccionPasajeros;
    }

    function getCantidadDePasajeros(){
        return $this->cantidadDePasajeros;
    }
    function setCantidadDepasajeros($cantidadDePasajeros){
        $this->cantidadDePasajeros = $cantidadDePasajeros;
    }

    #Verificar si el viaje esta lleno / True = hay lugar disponible / False = no hay lugar disponible

    public function   asientosDisponibles(){
        if ((count($this->coleccionPasajeros)< $this->cantMaxPasajeros)){
            return true;
        } else return false;
    }


    public function __toString()
    {
        return "Codigo de viaje :" . $this->getCodigoViaje() ."\n" . "Destino = " . $this->getDestino(). " \n" . "Cantidad maxima de personas:\n" . $this->getCantMaxPasajeros();
    }

    //Metodo para agregar pasajeros, si el dni ingresado ya existe entre los pasajeros, este arroja un aviso.
    public function agregarPasajero($pasajeroNuevo){
        $arrAux = $this->getColeccionPasajeros();
        if (in_array($pasajeroNuevo, $this->getColeccionPasajeros())){
            echo "El pasajero ya se encuentra registrado en el viaje.\n";
        }
        else {
            array_push($arrAux, $pasajeroNuevo);
            $this->setColeccionPasajeros($arrAux);
            echo "Pasajero agregado con exito.\n";
        }
    }

    //Metodo para encontrar e imprimir los datos de un pasajero
    public function findPasajero($coleccionPasajeros,$dniIngresado){
        $pasajeroEncontrado = [];
        foreach ($coleccionPasajeros as $k =>$val){
            if ($val["dni"] == $dniIngresado){
                $pasajeroEncontrado= $coleccionPasajeros[$k];
                
            }  
    }   
        if (!$pasajeroEncontrado == ""){
            return $pasajeroEncontrado;
        }else {
            echo "El DNI ingresado no pertenece a ningun pasajero.\n";
            return false;
        };



    }
    //Metodo para modoficar los datos de un pasajero
    public function modificarDatoPasajero($pasajeroMod, $dniModificacion){

        
        $coleccionAux = $this->getColeccionPasajeros(); 
        $i =0; 
        $pasajeroPreMod = $this->findPasajero($coleccionAux,$dniModificacion);

        while( $i < count( $coleccionAux ) && ( $coleccionAux[$i] != $pasajeroPreMod )) {
            $i = $i + 1;
        }
        if( $coleccionAux[$i] == $pasajeroPreMod ) {
            $coleccionAux[$i] = $pasajeroMod;
        }
        $this->setColeccionPasajeros($coleccionAux);
    }
    

    
    
       // Esta función modifica los datos de un pasajero en la colección de pasajeros del objeto Viaje a través del número de DNI ingresado. 

    public function verificarPasajero($dniIngresado){
        $band = false;
        $arrayAuxiliar = $this->getColeccionPasajeros();
        $pasajero = $this->findPasajero($arrayAuxiliar, $dniIngresado);
        if (in_array($pasajero, $arrayAuxiliar)){
            $band = true;
        }else{
            $band = false;
            
        }
        return $band;
    }
    


}
function textoMenu(){
    echo "\n Ingrese la opcion deseada:\n" .
    "1. Mostrar datos del viaje.\n".
    "2. Modificar datos del viaje(Codigo, destino, cantidad maxima de asientos dispoinbles.)\n" .
    "3. Mostrar datos de un pasajero \n" . 
    "4.Modificar informacion de un pasajero. \n" .
    "5.Agregar nuevo pasajero\n" .
    "6.Salir.\n";
 


}

function nuevoPasajero(){
    echo "Ingrese el nombre del pasajero:\n";
    $nomb = trim(fgets(STDIN));
    echo "Ingrese el apellido del pasajero: \n";
    $apellido = trim(fgets(STDIN));
    echo "Ingrese el DNI del pasajero: \n";
    $dni = trim(fgets(STDIN));
    $nuevoPasajero = ["nombre" => $nomb, "apellido" => $apellido, "dni" => $dni];
    return $nuevoPasajero;
} 



  
