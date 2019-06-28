<?php
    require_once 'config/config.php';
    require_once 'helpers/helper.php';

    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Database.php';

    // Autoload libraries
    // po wywołaniu klasy, która nie jest zdefiniowana uruchomi się podana 
    // funkcja, jako parametr zostanie przekazana nazwa klasy
    spl_autoload_register(
        function($className) {
            require_once 'libraries/'.$className.'.php';
        }
    );