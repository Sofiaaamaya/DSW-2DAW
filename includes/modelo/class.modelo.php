<?php

class Modelo
{

    function inicializar($datos)
    {

        $query = new Query("

            SELECT COLUMN_NAME 
            FROM   information_schema.columns
            WHERE  table_name = '{$this->tabla}' 
            AND    table_schema = '". BBDD::$baseDatos ."';


        ");


        while($registro = $query->recuperar())
        {

            $campo_nuevo = $registro['COLUMN_NAME'];

            $this->$campo_nuevo = $datos[$campo_nuevo];
    
        }

    }

    function eliminar($id)
    {
        $query = new Query("
            DELETE FROM {$this->tabla} WHERE id = '{$id}';
        ");
    }


    function recuperar($id)
    {
        $query = new Query("
            SELECT *
            FROM {$this->tabla}
            WHERE id = '{$id}';
        ");

        $registro = $query->recuperar();

        $this->inicializar($registro);

        return $registro;

    }



    function insertar($registro)
    {
        $claves_insertar = $values_insertar = '';


        foreach($registro as $clave => $valor)
        {

            $claves_insertar .= " {$clave}, ";
            $values_insertar .= " '{$valor}', ";    
        }


        $sql = "
            INSERT INTO {$this->tabla}
            (
                 {$claves_insertar}

                 fecha_alta   
                ,ip_alta      

            )
            VALUES
            (
                {$values_insertar}


                 now()
                ,'". $_SERVER['SERVER_ADDR']    ."'
                
            );
        
        ";

        //echo $sql;exit;


        $query = new Query($sql);

        return $query->total;

    }


    function modificar($registro,$id)
    {
        $updates = '';

        foreach($registro as $clave => $valor)
        {
            $updates .= " {$clave} = '{$valor}', ";
        }


        $query = new Query("
            UPDATE {$this->tabla}

            SET {$updates}
                ,fecha_modi         = now()
                ,ip_modi            = '". $_SERVER['SERVER_ADDR']    ."'

            WHERE id = '{$id}'
        
        ");

        return $query->total;
    }



    function listado($consulta=[])
    {
        $devolver = array();

        $select = is_null($consulta['select']) ? '*': $consulta['select'];
        $limit  = is_null($consulta['limit'])  ? ' ': "LIMIT {$consulta['limit']}";
        $offset = is_null($consulta['offset']) ? ' ': "OFFSET {$consulta['offset']}";

        $where = '';

        if(!is_null($consulta['where']))
        {
            foreach($consulta['where'] as $clave => $valor)
            {
                $where .= " AND {$clave} = '{$valor}' ";
            }
        }

        $query = new Query("
            SELECT COUNT(*) AS total_registros
            FROM {$this->tabla}
            WHERE 1 = 1 {$where}
        ");

        $registro = $query->recuperar();

        $devolver['total_registros'] = $registro['total_registros'];


        $query = new Query("
            SELECT {$select}
            FROM {$this->tabla}
            WHERE 1 = 1 {$where}
            {$limit}
            {$offset}
        ");
        
        $registros = array();
        while($registro = $query->recuperar())
        {
            $registros[$registro['id']] = $registro;

        }

        $devolver['registros'] = $registros;
        

        return $devolver;

    }

}