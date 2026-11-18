<?php


class Pelicula extends Modelo
{
    public $tabla;


    function __construct()
    {
        $this->tabla = 'peliculas';
    }
}

/*
🎬 Tarea: Creación de un CRUD de películas
Una vez realizado el modelo de usuario y desarrollado su correspondiente CRUD (Crear, Leer, Actualizar y Eliminar), vamos a ampliar nuestra aplicación incorporando una nueva funcionalidad.

📋 Enunciado
Teniendo en cuenta el modelo de usuario desarrollado anteriormente y siguiendo la misma estructura y funcionamiento, deberás crear un nuevo CRUD para gestionar películas.

Para ello, tendrás que implementar las siguientes funcionalidades:

Crear: permitir añadir nuevas películas a la aplicación.
Leer: mostrar un listado de todas las películas almacenadas.
Actualizar: permitir modificar los datos de una película existente.
Eliminar: permitir borrar una película del sistema.
🎥 Datos de las películas
Cada película deberá tener, como mínimo, los siguientes atributos:

Identificador (ID).
Título.
Director.
Año de estreno.
Género.
Duración (en minutos).
⚙️ Requisitos
Crear el modelo de datos correspondiente a las películas.
Implementar las operaciones CRUD siguiendo como referencia el modelo de usuario.
Crear las vistas o interfaces necesarias para gestionar las películas.
Comprobar que todas las operaciones funcionan correctamente.
Mantener una estructura de código organizada y coherente con el proyecto anterior.
📦 Entrega
Deberás entregar el proyecto con el CRUD de películas completamente implementado y funcional.

Importante: No se trata de empezar un proyecto desde cero, sino de ampliar el trabajo realizado anteriormente, reutilizando la estructura y los conocimientos adquiridos con el CRUD de usuarios.

💡 Consejo: Antes de comenzar a programar, analiza cómo has implementado el CRUD de usuarios. Identifica qué partes puedes reutilizar y qué elementos necesitas adaptar para trabajar con películas.
/*