<?php


class Usuario extends Modelo
{
    public $tabla;


    function __construct()
    {
        $this->tabla = 'usuarios';
    }
}