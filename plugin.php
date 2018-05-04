<?php

/**
 * Plugin Name: [Challenge 3] Plugin Development Shell
 * Description: AwesomeMotive - Challenge 3 - Plugin Development - Joao Albuquerque
 * Version: 1.0
 */

use AwesomeMotiveChallenge3\Init;

spl_autoload_register(
    function ($class) {
        $pluginNamespace = 'AwesomeMotiveChallenge3';

        // load only classes from this plugin's namespace
        if (strpos($class, $pluginNamespace) === false) {

            return;
        }

        $classDir = realpath(plugin_dir_path(__FILE__))
                    . DIRECTORY_SEPARATOR
                    . 'src'
                    . DIRECTORY_SEPARATOR;

        $classFile = $classDir
                     . str_replace('\\', DIRECTORY_SEPARATOR, substr($class, strlen($pluginNamespace) + 1))
                     . '.php';

        if (file_exists($classFile)) {
            require_once($classFile);
        }
    }
);

new Init();