# Examen para Programador PHP (Laravel) para Exponente Digital

## Examen para programador Web

### Prueba Técnica v210700E

## Patrones de diseño

** Problema 1 ** Un cliente requiere utilizar sendgrid para envíos de email, pero otro cliente requiere enviarlos por mandril. Se quiere evitar el uso de IF, y realizar un diseño en donde podamos utilizar más servicios en caso de que un cliente requiera alguno en específico ¿Qué patrón de diseño utilizarías y por qué?

** Opción 1 ** Strategy
** Opción 2 ** Factory Method
** Opción 3 ** Adapter

> ** Respuesta **  En este caso deberiamos de utilizar el diseño ** Strategy ** debido a que permite definir diferentes algoritmos de envío, y podemos seleccionarlo dinámicamente en tiempo de ejecución sin tener ninguna condicional. De esta manera se pueden agregar nuevos servicios de envío de correo sin modificar el código

** Problema 2 ** Explica en tus propias palabras la diferencia entre Factory Method y Abstract Factory. Y proporciona un caso de uso.


> la parte de **Factory Method** se enfoca en crear objetos de una sola clase,  o familia de clases delegando solo a la creación de subclases que se pueden proporcionar diferentes implementaciones de los objetos. mientas que **Abstract Factory** s enfoca en la creación de objetos de multiples familias de clases relacionadas. 

>Un ejemplo de **Factory Method** es la creación de graficos en esta se puede crear una clase y de ahi se delega para la formación de diferentes formas, mientras que el **Abstract Factory** podria ser una interfaz que sea utilizada en diferentes plataformas y esta se utiliza para que se implemente esta interfaz creando componentes pero sin modificar el código de la aplicación.