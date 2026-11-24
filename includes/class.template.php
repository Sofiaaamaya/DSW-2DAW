<?php


class Template{


    public function __construct($templateDir='tpl')
    {
        $this->templateDir = rtrim($templateDir,'/');
    }    


    public function render($file,$vars=[])
    {
        $path = "{$this->templateDir}/{$file}.tpl";

        if (!file_exists($path))
            throw new Exception("La plantilla {$file} no existe en {$this->templateDir}");

        $contenido = file_get_contents($path);

        foreach($vars as $key => $valor)
        {
            $contenido = preg_replace('{{\s*'.preg_quote($key,'/').'\s*}}',htmlspecialchars($valor),$contenido);          
        }

        return $contenido;


    }



    static function header($titulo,$descripcion='')
    {
        $template = new Template();

        return $template->render('header',[
                    'titulo'      => $titulo
                    ,'descripcion' => '$descripcion'
            ]).
                $template->render('nav',[
                    'usuarios'      => Idioma::lit('usuarios')
            ])
        
        ;
    }



    static function footer()
    {
        $template = new Template();

        return $template->render('footer');
    }



}




