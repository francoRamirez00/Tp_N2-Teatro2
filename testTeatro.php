<?php 





include 'funciones_Teatro.php' ; 
$funciones = new funciones_Teatro("el leon", 21,1,150) ;

$datos =new Teatro("san","calle", $funciones) ;

// MENU DEL TEATRO 
echo "bienvenido al Teatro ". $datos->getNombreTeatro(). "\n" ;
echo $datos->__construct("san","calle",$funciones);


do {
    echo "Por favor elija una opcion-------\n";
    echo "      \n-1)ver informacion del teatro y las funciones actuales " ;
    echo "      \n-2)cargar funcion nueva" ;
    echo "      \n-3)cambiar nombre del teatro ";
    echo "      \n-4)cambiar la direccion del teatro";
    echo "      \n-5)cambiar nombre de una funcion";
    echo "      \n-6)cambiar precio de una funcion";
    echo "      \n-7) salir del menu " ;
    $eleccion = trim(fgets(STDIN)) ;

    switch ($eleccion) {

        case '1':
               
                echo $datos  ;
                echo $datos->mostrarFunciones() . "\n";
            break;
    
        case '2':
                echo "cargar nueva funcion... \n nombre :" ;
                $newNombre = trim(fgets(STDIN)) ;

                echo "posicion :" ;
                $newPosicion = trim(fgets(STDIN)) ;

                echo "hora de inic:" ;
                $newHoraInicio = trim(fgets(STDIN)) ;

                echo "duracion :" ;
                $newDuracion = trim(fgets(STDIN)) ;

                echo "precio :" ;
                $newPrecio = trim(fgets(STDIN)) ;

               $newFuncion = new funciones_Teatro($newNombre,$newHoraInicio,$newDuracion,$newPrecio) ;
                    $datos->cargarFunciones($newPosicion,$newFuncion) ;
                   /* $datos =new Teatro("san","calle", $newFuncion) ;*/
                    echo $datos;
                if ($datos->cargarFunciones($newPosicion,$newFuncion) == true) {

                    echo "funcion nueva cargada exitosamente " ;
                    
                    
                }else {
                    echo "fallo" ;
                }

               

            break;

        case '3':

                echo "ingrese nuevo nombre de teatro : "  ;
                $nuevoNombre_Teatro = trim(fgets(STDIN)) ;
                echo "Cargando nombre del teatro .   .   .  . ". "\n" ;
                $validez = $datos->cambiar_nom_teatro($nuevoNombre_Teatro) ;
                    if ($validez == true) {
                         echo "El nombre del teatro fue cambiado exitosamente". "\n" ;
                    }else {
                         echo "el nombre que se ingreso ya existia ". "\n" ;
                    }   
                         echo "saliendo al menu . . .". "\n" ;

            break;
    
        case '4':

                echo "ingrese nueva direccion : " ;
                $nuevoNombre_Direccion = trim(fgets(STDIN)) ;
                 echo "Cargando direccion del teatro .   .   .  . ". "\n" ;
                $validez = $datos->cambiar_nom_Direccion($nuevoNombre_Direccion);
                if ($validez == true) {
                        echo "La direccion del teatro fue cambiada exitosamente". "\n" ;
    
                }else {
                        echo "el nombre ingresado ya se encuentra" ."\n" ;
                        echo "saliendo al menu . . .". "\n" ;
                }
       
            break ;

        case '5':

            echo "ingrese nombre de la nueva funcion: " ;
            $nombreNuevo_Funcion = trim(fgets(STDIN)) ;
            echo "ingrese que numero de la funcion desea cambiar (0 - 3): " ;
            $posicion = trim(fgets(STDIN));
            echo "cargando nombre a la nueva funcion . . . .". "\n" ;
            $validez = $datos->cambiar_nom_Funcion($posicion,$nombreNuevo_Funcion) ;

                if ($validez) {
                        echo "El nombre de la funcion ". $posicion. " fue actualizado correctamente" ."\n";
                }else {
                        echo "El numero de la posicion ingresado es incorrecto " . "\n";
}
                        echo "saliendo al menu . . ." . "\n";

        break;
            
        case '6':

            echo "ingrese el numero de la funcion desea cambiar el precio (0 - 3): " ;
            $posicion = trim(fgets(STDIN));
            echo "ingrese el precio que desea cargar: ". "\n" ;
            $precioNuevo = trim(fgets(STDIN)) ;
            echo "cargando precio en la posicion " . $posicion. "\n" ;
            $validez = $datos->cambiar_precio_Funcion($posicion,$precioNuevo) ;

                if ($validez) {
                    echo "El precio fue actualizado exitosamente ". "\n" ;
                }else {
                    echo "numero de la posicion ingresado incorrecto" ;
}           
                    echo "saliendo al menu . . ." . "\n";
    
        break;
            
    
    }
} while ($eleccion < 7);
    
    