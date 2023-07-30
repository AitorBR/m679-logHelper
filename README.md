## ¿QUÉ ES LOGHELPER?

LogHelper es una aplicación desarrollada en PHP con el framework Laravel, junto con JavaScript para enviar conexiones asíncronas para poder enviar y recibir datos del servidor a API Rest con Laravel.

LogHelper trata de crear un CRUD de Servidores, en el cual se almacenarán sus Logs.
Cada servidor podrá tener 0 o más registros, en el cual mostrará la información de “Timestamp” y “Description”. Permitiendo crear un CRUD tanto a nivel de servidor como de Logs. Los servidores contendrán sus propios datos como; “ipv4”, “ipv6”, “location” y “description”.

Aplicando las siguientes características:
<br>
SERVIDOR:
- Listar servidores disponibles con su información.
- Implementar funciones para los respectivos servidores.
- Permitir crear servidores
- Permitir eliminar servidores
- Permitir editar servidores.
- Permitir visualizar sus logs.
- Comprobaciones ipv4 y ipv6.

LOGS:
<br>
- Listar todos los logs pertenecientes a su servidores
- Listar información de logs.
- Permitir crear logs.
- Permitir eliminar logs.
- Permitir editar logs.
- Permitir actualizar logs.

## PRINCIPALES DIFICULTADES

La principal dificultad encontrada fue al principio en el momento de modelar las clases, puesto que era un relación 1 → 0..N. Ya que en el Seeder teníamos que crear la sentencia correcta ya que en los Logs se almacena el ID referente al Servidor que pertenece. Otro fallo común, ha sido el momento de listar las rutas con el comando con router:list, ya que por lo visto es bastante frecuente que no se lista correctamente derivado por la cache y por ello debíamos hacer un “route:cache”.

Modelando los objetos se nos ha complicado un poco ya que veíamos ejemplos que no hacia el “$fillable de cada uno de los campos” pero luego hemos descubierto que realmente es necesario para poder utilizar el método (store). 
Referente a la creación de las factorías en el cual añadimos los datos con la librería “faker”, ha sido realmente fácil y no nos ha supuesto ningún problema. Por otra banda, el fichero “Seeder” donde creamos el comando para crear “X” registros tanto a nivel de Servidor como de Logs se ha complicado un poco pero al final lo hemos podido solventar correctamente.

Otro problema que nos ha surgido ha sido el hecho de implementar la ruta de CSS y JS en las plantillas de blade. Es importante saber que las plantillas de Blade cargan los ficheros por defecto en la carpeta “public” y no en “resources”. 

Otro aspecto que se ha complicado un poco, ha sido el hecho de implementar el código en html en las plantillas laravel con las rutas pertinentes de la API. Todos estos aspectos, han sido por parte de PHP. 
Por el contrario, en JS nos ha supuesto bastante más fácil, puesto que lo que mayor dificultad era montar toda la infraestructura de Laravel correctamente. Importante saber que cuando se hace un formulario se debe de hacer con event.preventdefault(). Otro dato importante, es que el script de JS donde se importa en el fichero Blade (html) se tiene que poner abajo. Es decir, ejecutar primero el código html y seguidamente el script de JS. Además de saber que tipo de método utilizar en el fetch en función de nuestras necesidades. En caso de actualizar si son datos parciales o no put/patch, para listar con get, para crear con post etc…

Finalmente un problema con el metodo de delete, el cual, hemos utilizado el metodo GET porque con delete nos causaba un error que no sabiamos resolverlo correctamente. Implementandolo con el método GET funcionaba correctamente, asi que finalmente decidimos utilizar ese metodo.

## ASPECTOS A MEJORAR

Algunas de las características de mejora, podrían ser implementar aspectos visuales mejorados, como la implementación de algún logotipo descriptivo como botón. Opciones de navegación más intuitivas como darle clic al servidor (no en un botón en especifico) para ver sus logs pertinentes. Por el resto, referente al diseño de las tablas con sus datos consideramos que ha sido un buen acierto tanto a nivel de interfaz, diseño e implementación. Teniendo en cuenta los requisitos de los formularios de html con “radius-button: 30px”.

## CONCLUSIONES

Conclusiones ORIOL.
Consideramos que bajo nuestras nociones básicas de laravel hemos podido sacar adelante el proyecto. Implementando con más hincapié al principio puesto que había que diseñar la API en laravel y era la parte fundamental para que el resto funcione correctamente.

Al principio con laravel temíamos un poco esa parte pero haciendo las cosas poco a poco e implementando correctamente hemos podido solventar todos los problemas e ir comprendiendo un poco más cómo se desarrolla en ese framework. 

Una vez implementado el CRUD con laravel y probado con POSTMAN, ya fuimos a implementar las vistas y JS. Esta última parte era la más sencilla ya que la parte más difícil ya estaba funcionando correctamente.

En conclusión, hemos podido implementar mayoritariamente lo pedido sobre el CRUD a nivel de servidor y logs. Me ha resultado interesante el hecho de mezclar Laravel, JS, HTML y CSS. Por otro lado, como crítica constructiva considero que se ha montado bastante mal el hecho de crear una práctica conjunta de las ufs restantes. Por un simple motivo, sin hacer  primero la parte de PHP - Laravel estás “vendido” para implementar el resto, derivado además de las pocas horas de PHP que teníamos…


Conclusiones Aitor.
Al final hemos sacado todo el proyecto, hemos tenido varios problemas, sobretodo con los problemas que ha generado laravel.

Laravel a dado muchos problemas, porque el programa a ido cambiando mucho en poco tiempo y podias encontrar muchas posibles soluciones, la gran parte deprecado, siendo hasta la pagina oficial, dificil de entender y muy mal explicada, muchas de las "soluciones" que proponen, no funcionan.

Con JS hemos tenido problemas por la forma de usarse junto a laravel, no dejando cargar paginas, rutas...

Un gran problema de la practica conjunta, es que si no consigues completar php, practicamente no puedes avanzar con el resto de asignaturas, ya que requieres saber como va a llegar la informacion, siendo agrabado por el horario, ya que teniamos clase de php los lunes y mastes, dejando el resto de la semana sin el profesor especifico de la asignatura.

En conclusión, se a conseguido completar todo el proyecto, aunque ha sido un poco quebradero de cabeza a causa de lo comentado anteriormente, hemos aprendido mucho de este proyecto.
## REFERENCIA DE ENLACES DE INFORMACIÓN
Toda la documentación extraída ha sido en la página oficial de laravel:
- https://laravel.com/docs/9.x/installation
- https://es.stackoverflow.com/




