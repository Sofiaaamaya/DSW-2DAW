<?php

    class Idioma
    {
        private static $instancia = null;

        public static $lit = array();


        private function __construct()
        {
            $idioma =  explode('.',$_SERVER['HTTP_HOST'])[0];


            if ($idioma == 'www' || $idioma == 'lanzarote')
                $idioma = 'es';



            $decriptor= fopen($_SERVER['DOCUMENT_ROOT'].'/lang/'. $idioma .'.txt','r');

            if ($decriptor)
            {

                while ($linea = fgets($decriptor))
                {
                    $linea = trim($linea);

                    $partes_linea = explode(':',$linea);

                    self::$lit[$partes_linea[0]] = $partes_linea[1];

            
                }
                
            }
        }

        public static function getInstancia(): Idioma {

            if (self::$instancia == null){
         
                self::$instancia = new Idioma();
            }

            return self::$instancia;
        }

        public static function lit($campo)
        {
            self::getInstancia();

            return self::$lit[$campo];

        }


        public function __clone(){}
    }