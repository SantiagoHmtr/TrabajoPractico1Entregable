<?php

include 'TpEntregable1.php';
//Se ingresan los datos del viaje para generar el objeto de la clase Viaje
echo "Ingrese el codigo del viaje:\n" ;
$codViaje = trim(fgets(STDIN));
echo "Ingrese el destino: \n";
$destinoViaje = trim(fgets(STDIN));
echo "Ingrese el limite de pasajeros:\n";
$cantMax = trim(fgets(STDIN));

$nuevoViaje = new Viaje ($codViaje, $destinoViaje, $cantMax);





#Ejecucion de menu
do{
    textoMenu();
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            //Se imprimen los datos del viaje
            echo $nuevoViaje;
            break;
         case '2':
            //Con dos switch anidados se eligen opciones para modificar los datos de el viaje.
            echo "Ingrese la opcion deseada: \n" . "1.Modificar el codigo de viaje.\n 2.Modificar el destino del viaje. \n 3. Modificar la cantidad maxima de asientos en el viaje.\n 4.Salir.\n";

            $opcion2 = trim(fgets(STDIN));
            switch ($opcion2) {
                case '1':
                    echo "Ingrese el nuevo codigo de viaje: \n";
                    $nuevoCodigo = trim(fgets(STDIN));
                    $nuevoViaje->setCodigoViaje($nuevoCodigo);
                    break;
                case '2':
                    echo "Ingrese el nuevo destino del viaje:\n ";
                    $nuevoDestino = trim(fgets(STDIN));
                    $nuevoViaje->setDestino($nuevoDestino);
                    break;
                case '3':
                    echo "Ingrese la nueva cantidad maxima de personas en el viaje: \n";
                    $nuevaCantMax = trim(fgets(STDIN));
                    $nuevoViaje->setCantMaxPasajeros($nuevaCantMax);
                    break;
                
                default:
                    
                    break;
            }
            break;
            case '3':
           //Se imprimen en pantalla los datos del pasajero, este siendo buscado por su DNI, ya que en la practica seria un valor unico

            echo "Ingrese el DNI del pasajero para revisar sus datos.\n";
            $pasajerosViaje = $nuevoViaje->getColeccionPasajeros();
            $dniIngresado= trim(fgets(STDIN));
            $pasajeroBusqueda = $nuevoViaje->findPasajero($pasajerosViaje, $dniIngresado);
            print_r($pasajeroBusqueda); 
            break;
            
         case '4':
            //Se modifican los datos de un pasajero, nuevamente se lo encuentra por el DNI
            echo "Ingrese el DNI del pasajero.";
            $dniCambio = trim(fgets(STDIN));
            if ($nuevoViaje->verificarPasajero($dniCambio)){
                $pasajeroModificado = nuevoPasajero();
            $nuevoViaje->modificarDatoPasajero($pasajeroModificado, $dniCambio);
            print_r($nuevoViaje);
            }   else {
                echo "Intentelo nuevamente.\n";
            }

            break;
         case '5':
            //Se agregan pasajeros al viaje.
            if ($nuevoViaje->asientosDisponibles()){
            $addPasajero=nuevoPasajero();
            $nuevoViaje->agregarPasajero($addPasajero);
            }else{
                echo "Error :El viaje alcanzo la cantidad maxima de pasajeros.";
            }
            break;
         case '6':

                break;
       
    }


}while($opcion !=6);

