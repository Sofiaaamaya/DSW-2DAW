<?php


class Modelo{
 private $tabla;


    function __construct()
    {
        $this->tabla = 'usuarios';
    }



    function recuperar($id)
    {
        $query = Query("
            SELECT *
            FROM {$this->tabla}
            WHERE id = '{$id}';
        ");

        $registro = $query->recuperar();

        $this->nombre            = $registro['nombre'];  
        $this->apellido1         = $registro['apellido1'];  
        $this->apellido2         = $registro['apellido2'];  
        $this->fecha_nacimiento  = $registro['fecha_nacimiento'];
        $this->email             = $registro['email'];
        $this->fecha_alta        = $registro['fecha_alta'];  
        $this->ip_alta           = $registro['ip_alta'];    
        $this->fecha_modi        = $registro['fecha_modi']; 
        $this->ip_modi           = $registro['ip_modi'];  


    }


    function insertar($registro)
    {

        $query = new Query("
            INSERT INTO {$this->tabla}
            (
                 nombre    
                ,apellido1 
                ,apellido2 
                ,fecha_nacimiento 
                ,email 

                ,fecha_alta   
                ,ip_alta      
                ,fecha_modi   
                ,ip_modi      
            )
            VALUES
            (
                '". $registro['nombre']           ."'
                ,'". $registro['apellido1']        ."'
                ,'". $registro['apellido2']        ."'
                ,'". $registro['fecha_nacimiento'] ."'
                ,'". $registro['email']            ."'


                ,now()
                ,'". $_SERVER['SERVER_ADDR']    ."'
                ,now()
                ,'". $_SERVER['SERVER_ADDR']    ."'
                
            )
        
        ");

        return $query->total;

    }


    function eliminar($id)
    {
        $query = new Query("
            DELETE FROM {$this->tabla} WHERE id = '{$id}';
        ");
    }


    function modificar($registro)
    {

        $query = new Query("
            UPDATE {$this->tabla}

            SET
                 nombre             = '". $registro['nombre']           ."'
                ,apellido1          = '". $registro['apellido1']        ."'
                ,apellido2          = '". $registro['apellido2']        ."'
                ,fecha_nacimiento   = '". $registro['fecha_nacimiento'] ."'
                ,email              = '". $registro['email']            ."'

                ,fecha_modi         = now()
                ,ip_modi            = '". $_SERVER['SERVER_ADDR']    ."'

            WHERE id = '{$id}'
        
        ");

        return $query->total;
    }

}