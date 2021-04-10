<?php

class Teatro{

    private $nombreTeatro ;
    private $direccionTeatro ;
    private $Funciones_Teatro ;

    public function __construct($nombreTeatro,$direccionTeatro,$Funciones_Teatro){

        $this->nombreTeatro =$nombreTeatro ;
        $this->direccionTeatro =$direccionTeatro;
        $this->Funciones_Teatro = $Funciones_Teatro ;
     

       $this->Funciones_Teatro = array(0=>array('nombre' => $Funciones_Teatro, 'hora_inicio'=> $Funciones_Teatro, 'duracion de la obra'=>  $Funciones_Teatro, 'precio'=>  $Funciones_Teatro));
                                      // 1=>array('nombre' =>$Funciones_Teatro, 'hora_inicio'=>$Funciones_Teatro, 'duracion de la obra'=> $Funciones_Teatro, 'precio'=> $Funciones_Teatro)) ;
       
        // print_r($this->Funciones_Teatro);
            
    }

    public function getNombreTeatro(){

        return $this->nombreTeatro ;
    }
    public function getDireccionTeatro(){

        return $this->direccionTeatro ;
    }
    public function getFunciones_teatro()
    {
        return $this->Funciones_Teatro ;
    }
    public function setNombreTeatro($nombreTeatro){

        return $this->nombreTeatro =$nombreTeatro;
    }
    public function setDireccionTeatro($direccionTeatro){

        return $this->direccionTeatro =$direccionTeatro ;
    }
    public function setFunciones_teatro($Funciones_Teatro)
    {
        return $this->Funciones_Teatro = $Funciones_Teatro ;
    }

   
    /** funcion para cargar funciones   
     * @param int $posicion
     * @param array $Funciones_Teatro
     * @return bool
      */                                     
    public function cargarFunciones($posicion,$Funciones_Teatro){

        
        if ($posicion > count($this->getFunciones_teatro())  ) {
            $cargada = true ;
            $posicion = $posicion  ;
            $this->Funciones_teatro[$posicion]['nombre ']=$this->setFunciones_Teatro($Funciones_Teatro)  ;
            $this->Funciones_teatro[$posicion]['hora_inicio']=$this->setFunciones_Teatro($Funciones_Teatro)   ;
            $this->Funciones_teatro[$posicion]['duracion de la obra'] = $this->setFunciones_Teatro($Funciones_Teatro) ;
            $this->Funciones_teatro[$posicion]['precio'] = $this->setFunciones_Teatro($Funciones_Teatro) ;

        }else{
            $cargada = false ;
        }

        return $cargada ;

    }
    
    /** funcion para chequear si los horarios de las funciones no se mezclan para asi poder cargarlas  
     * @param int $nuevahora
     * @param array $nuevaDuracion
     * @return bool
      */     
     
    public function chequeoHorario($nuevahora, $nuevaDuracion){

        $sumaNuevo_horario = $nuevahora + $nuevaDuracion ;
        $i = 0 ;
        $retorno = false ;
        do {
            

                $iniciaFuncion =$this->getFunciones_teatro()[$i]['hora_inicio'] ;
                $TerminaFuncion =  $iniciaFuncion + $this->getFunciones_teatro()[$i]['duracion de la obra'] ;
                if ( ($sumaNuevo_horario ==  $TerminaFuncion) || $sumaNuevo_horario == $iniciaFuncion  ) {
            
                    $retorno = true ;
                } else {
                    $retorno = false ;
                    $i++;
                }
           
        } while ($retorno == false && $i<count($this->getFunciones_teatro()[$i])) ;
       
        return $retorno ;
        

    }

    /** funcion para cambiar el nombre al teatro
     * @param string $nuevoNombre_Teatro
     * @return bool
      */     
    public function cambiar_nom_teatro($nuevoNombre_Teatro){

        if ($nuevoNombre_Teatro !== $this-> getNombreTeatro() ) {
           
            $valido = true ;
            $this->setNombreTeatro($nuevoNombre_Teatro);
        }else {
            $valido = false ;
        }

        return $valido ;
    }

    /** funcion para cambiar la direccion del teatro
     * @param string $nuevoNombre_Direccion
     * @return bool
      */   
    public function cambiar_nom_Direccion($nuevoNombre_Direccion){

        if ($nuevoNombre_Direccion !== $this-> getDireccionTeatro() ) {
           
            $valido = true ;
            $this->setDireccionTeatro($nuevoNombre_Direccion);
        }else {
            $valido = false ;
        }

        return $valido ;
    }

    /** funcion para cambiar el nombre de la funcion
     * @param int $posicion
     * @param string  $nuevoNombre_funcion
     * @return bool
      */   
    public function cambiar_nom_Funcion($posicion , $nuevoNombre_funcion){


    
            
                if ($posicion >= 0 && $posicion <4) {
                    $existe = true ;
                     $this->Funciones_Teatro[$posicion]['nombre'] = $nuevoNombre_funcion ;
                    
                  
                }else {
                    
                   
                    $existe = false ;
                }
          

            

             return $existe ;
               
}

    


    /**funcion para cambiar el precio de una funcion 
    * @param int $posicion
     * @param int $precio
    * @return bool
    */   
       
    public function cambiar_precio_funcion($posicion, $precio){

        if ($posicion >= 0 && $posicion <4) {
            $existe = true ;
             $this->funciones_Teatro[$posicion]['precio'] =$precio ;
           
          
        }else {
            
           // $this->funciones_Teatro[$posicion]["nombre"] = $nuevoNombre_funcion ;
            $existe = false ;
        }
  

    

     return $existe ;
    
    }
    /** funcion para tratar de mostrar la colec de funciones
     
     
      */   
    public function mostrarFunciones(){

        for ($i=0; $i < count($this->getFunciones_Teatro()); $i++) { 
            
            echo  $this->Funciones_Teatro[$i]['nombre'];
            
        }
    }

    public function __toString()
    {
         // $cadena = $this->mostrarFunciones();
         for ($i=0; $i <2; $i++) {
        
         $final ="nombre teatro : ". $this->getNombreTeatro()."\n". "direccion : ". $this->getDireccionTeatro()."\n". "-----funcion actuales ---- \n ";  }
        return $final; 

    
}
}





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
    
    














 

 


  