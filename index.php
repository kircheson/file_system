<?php
function generateUniqueRandomStrings($length, $quantity)
{
    $strings = [];
    $attempts = 0;

    while (count($strings) < $quantity) {
        // Генерируем случайную строку
        $bytes = random_bytes($length / 2);
        $string = bin2hex($bytes);

        // Убеждаемся, что строка уникальна
        if (!isset($strings[$string])) {
            $strings[$string] = true;
        }

        // На всякий случай, ограничим количество попыток, чтобы избежать бесконечного цикла
        $attempts++;
        if ($attempts > $quantity * 2) {
            throw new Exception("Слишком много попыток, генерация уникальных строк невозможна");
        }
    }

    return array_keys($strings);
}

$root = 'Data';
$fileNames = generateUniqueRandomStrings(40, 100);
foreach ($fileNames as $fileName) {
    $dirPath = 'Data';
    var_dump($fileName);
    for ($i = 0; $i < strlen($fileName); $i = $i + 1) {
        $dirName = substr($fileName, $i, $i++);
        $dirPath = $dirPath . '/' . $dirName;
        if (is_dir($dirPath)) {
            continue;
        }
        mkdir($dirPath);

    }
    file_put_contents($dirPath . '/' . $fileName, $fileName . '.txt');
}