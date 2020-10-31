# Proyecto para prueba de NEXT

## Requisitos de la prueba

* A esta página, añadirle Bootstrap (o similar), con un diseño base en el que tengamos un menú de la izquierda de la página, que ocupe 12 columnas en móvil y 4 para los demás tamaños, y un cuerpo central que ocupe 12 columnas en móviles y 8 en el resto.

* Modificar el código PHP (o la tecnología preferida) para que cada "tarea" de la "base de datos" tengo un valor que indique el orden (prioridad).

* Mostrar el listado en base a ese orden.

* Posibilidad de subir/bajar/eliminar elementos.

* Añadir posibilidad de crear una nueva tarea.

* Pasar la lógica de este index y de otras posibles páginas (añadir, bajar/subir, eliminar) a una clase externa, un controlador.

* Instalar un sistema de templates (Mustache, Twig, etc). Conseguir pintar la página principal con este sistema de templates.

* Desacoplar lógica de PHP de renderizado. Desde HTML (o tecnología de FRONT que se prefiera) se pedirá vía AJAX los datos a PHP, que responderá con JSONs. 

## Datos para la prueba a tener en cuenta
```
La prueba ha sido hecha en vue.js y php.

Los archivos php estan subidos a mi servidor, para que a la hora de ejecutar el proyecto
pueda hacer las respectivas llamadas sin ninguna configuración/instalación extra de servidores.

Aún así, los archivos php que se usan en el servidor estan copiados y pegados en este proyecto, son:
prueba.php y tareasController.class.php

Puntos a destacar de los requisitos de la prueba: 
```

* El diseño usado en el proyecto es vuetify.

* El orden que se le dió al archivo db.txt ha sido con un identificador id y el nombre de la tarea nombre_tarea, el cual carga siempre que se leen los datos por primera vez y se editan en ese mismo momento para crear su identificador.

* El orden se hace desde frontend.

* Se ha creado el controlador en php con una clase.

* Los templates usados son con vue, componentes creados por mi y otros usados de vuetify.

* La lógica de backend y frontend está descoplada y las llamadas se hacen con axios.

## Requisitos para iniciar el proyecto

Instalar npm/nodejs
* [npm](https://nodejs.org/en/)

Instalar vue/cli
- npm install -g @vue/cli

Instalar librerías del proyecto
- cd (ruta del proyecto)
- npm i

## Comando para iniciar proyecto
```
npm run serve
```

