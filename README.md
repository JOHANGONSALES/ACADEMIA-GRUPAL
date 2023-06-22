# ACADEMIA GRUPAL

## Introducción:
En la prestigiosa Academia Grupal, un grupo de desarrolladores apasionados por la enseñanza y la programación, compuesto por Juan Carlos, Johan, Nacyla, Eva y Yeny, han creado un sistema de gestión de cursos utilizando el framework Symfony y la poderosa plantilla Twig. Este proyecto tiene como objetivo ofrecer una plataforma en línea donde los alumnos puedan explorar y registrarse en diferentes cursos de programación.

## Capítulo 1: Configuración inicial

Nuestro equipo de desarrolladores se reunió para comenzar a dar vida a su proyecto. Utilizando Symfony, crearon dos entidades clave: "Alumno" y "Curso". La entidad "Alumno" contiene información personal del estudiante, como nombre, dirección de correo electrónico y número de teléfono. Por otro lado, la entidad "Curso" incluye detalles sobre los cursos disponibles, como título, descripción..

## Capítulo 2: Relación entre Alumnos y Cursos

La Academia Grupal comprendió que era esencial establecer una relación entre los alumnos y los cursos. Para lograr esto, crearon una relación de muchos a muchos entre las entidades "Alumno" y "Curso". Esto permitiría a los alumnos inscribirse en múltiples cursos y a los cursos aceptar a varios alumnos.

## Capítulo 3: Diseño de la interfaz de usuario con Twig

Nuestros desarrolladores, conscientes de la importancia de una interfaz de usuario atractiva y fácil de usar, aprovecharon la potencia de Twig para diseñar las vistas de su aplicación web. Crearon plantillas bien estructuradas y reutilizables para mostrar la información de los cursos, permitiendo a los alumnos buscar y seleccionar los cursos que más les interesen.

## Capítulo 4: Funcionalidades del sistema

El equipo de desarrollo implementó diversas funcionalidades en su sistema de gestión de cursos. Los alumnos pueden registrarse en la plataforma proporcionando su información personal y luego explorar la lista de cursos disponibles. Para inscribirse en un curso específico, simplemente hacen clic en un botón y la relación entre el alumno y el curso se establece automáticamente.

## Capítulo 5: Test

https://symfony.com/doc/current/testing.html#types-of-tests
### Instaladores:
* composer install
* composer require --dev symfony/test-pack
* composer require --dev dama/doctrine-test-bundle

### Crear TEST
* php bin/console make:test

### Copia DB:
* php bin/console --env=test doctrine:database:create
* php bin/console --env=test doctrine:schema:create

### Ejecutar el TEST
* php bin/phpunit 



## Capítulo 6: Mejoras y expansiones futuras

A medida que el proyecto avanzaba, el equipo de desarrollo recibió comentarios y sugerencias de los usuarios. Se dieron cuenta de la necesidad de agregar nuevas características, como un panel de administración para que los profesores pudieran gestionar los cursos y una funcionalidad de calificación para que los alumnos pudieran evaluar la calidad de los cursos. Estas mejoras se planearon para futuras versiones del sistema.

## Conclusión:

Gracias a la dedicación y pasión de Juan Carlos, Johan, Nacyla, Eva y Yeny, la Academia Grupal pudo crear un sistema de gestión de cursos efectivo y atractivo utilizando Symfony y Twig. Su proyecto ha permitido a los alumnos explorar y registrarse en diferentes cursos de programación, brindándoles una oportunidad única de aprender y mejorar sus habilidades. La Academia Grupal sigue trabajando arduamente para mejorar y expandir su sistema, con el objetivo de brindar la mejor experiencia educativa en línea a todos sus estudiantes.
