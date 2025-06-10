<?php
namespace Uph\Database;

require_once __DIR__ . '/../../vendor/autoload.php'; 

class Twig{
    public static function make($templatesDir): \Twig\Environment
    {
        $loader = new \Twig\Loader\FilesystemLoader($templatesDir);
        return new \Twig\Environment($loader);
    }
}
