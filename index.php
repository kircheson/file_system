<?php
function createFolders($directoryPath) {
    $directories = explode('/', $directoryPath);
    $path = '';
    foreach ($directories as $directory) {
        $path .= $directory . '/';
        if (!is_dir($path)) {
            mkdir($path);
        }
    }
}

function deleteFolders() {

}

// Пример использования:

createFolders('./Data/Data_1/Data_2/Data_3'); // Структура и названия папок прописываются вручную
deleteFolders(...);