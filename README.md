# Tic Tac Toe


**Tabla de Contenido**

# Contenido
A continuación es presentado el juego de **Tres en Raya**, **La Vieja** o **Tic Tac Toe**. El requerimientp requería hacer gran parte de la lógica en el backend (**PHP**), para lograr esto se procedió a utilizar llamadas AJAX (o AJAJ) desde el front por cada jugada que se hacía. Luego el backend se encargaría de procesar este mensaje y enviar una respuesta asociada a él. En el comprimido que se presenta se pueden encontrar los siguientes archivos:
- Main Folder
 - **index.php** -> Contiene todo el código HTML del juego.
 - **tictactoeHandler.php** -> Posee el handler intermedio entre la clase y el html. Encargado de recibir las llamadas AJAX.
 - **tictactoe.php** -> Clase de tictactoe donde se realiza toda la lógica del juego.
 - **connection.php**-> Contiene la configuración hacia la base de datos
 - assets
   - js
    - **tictactoe.js** -> Toda la lógica del front; encargado de hacer llamadas AJAX, desplegar y refrescar información en la página.
    extras -> Archivos de librerias para mejor experiencia de usuario.
   - css
     - **tictactoe.css** -> Posee el estilo para el grid principal del juego
     - **extras** -> Archivos de librerias para mejor experiencia de usuario.
 - dump
   - **tictactoe.sql** -> Posee el dump de la base de datos simple para almacenar las partidas jugadas.
   
   
   # Cómo Jugar
Lo único que usted debe hacer como usuario experto es correr el dump en **MySQL** para crear la base de datos **hiberus** y la tabla **tictactoe**. Luego debe dirigirse al archivo **connection.php** y editar la configuración por la de su SMBD. Con esto solo debe poner la carpeta en un servidor web (Apache, por ejemplo), y abrir en su navegador -en la dirección configurada- el **index.php**.

Jugar es bastante simple, solo debe dar click en cualquier caja en el panel 3x3:

    El primer jugador que haga click será la X, mientras que el segundo será el O.
    En cualquier momento puede hacer click en el botón de Replay para empezar nuevamente. 
    Además puede revisar el histórico de los últimos 30 juegos haciendo click en el botón de Last 30s, éste le mostrará quien ganó, cual fue su movimiento de victoria y cuantos segundos duró el juego.
    Cuando una partida termine automaticamente se le abrirá un modal indicando quien ganó -en caso de que exista un ganador- y podrá reiniciar el juego con solamente ocultarlo.
### Imagenes

> Imagen principal:

![](https://i.gyazo.com/ed4137440c561f805807b63659de97b0.png)

> Juego activo.

![](https://i.gyazo.com/d10ce2879792be83d0d4647b4018ba93.png)

# Autor
    Alejandro Barone - 2018 


