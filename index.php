<?php
function generateUniqueRandomStrings($length, $quantity) {
    $strings = [];
    $attempts = 0;

    while (count($strings) < $quantity) {
        // Генерируем случайную строку
        $bytes = random_bytes($length / 2);
        $string = bin2hex($bytes);

        // Убедимся, что строка уникальна
        if (!isset($strings[$string])) {
            $strings[$string] = true;
        }

        // На всякий случай, ограничим количество попыток, чтобы избежать бесконечного цикла
        $attempts++;
        if ($attempts > $quantity * 2) {
            throw new Exception("Too many attempts, unique strings generation is problematic.");
        }
    }

    return array_keys($strings);
}

// Вызываем функцию для генерации 100000 уникальных строк длиной 40 символов
$uniqueRandomStrings = generateUniqueRandomStrings(40, 100000);
