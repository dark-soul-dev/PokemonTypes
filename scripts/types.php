<?php

// mostrar erros e avisos
error_reporting(E_ALL);
ini_set('display_errors', 1);

$lang = 'en';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $selectedIndex = isset($_GET['type']) ? $_GET['type'] : 0;
    $lang = isset($_GET['lang']) ? $_GET['lang'] : '';
}

$file = 'types' .(empty($lang) || $lang === 'en' ? '' : "-$lang");
$types = json_decode(file_get_contents("data/$file.json"), true);
$relations = json_decode(file_get_contents('data/relations.json'), true);

// Pega o índice de um tipo
function getKey(string $name)
{
    global $types, $relations;

    $index = array_keys($types, $name);
    return isset($index[0]) ? $index[0] : 0;
}

// index é o numero do tipo
// key é uma propriedade (effective, not-effective, cannot-hit)
function getTypes(int $index, string $key)
{
    global $types, $relations;
    $array = array();
    $rel = isset($relations[$index]) ? $relations[$index] : array();

    if (isset($rel[$key])) {
        foreach ($rel[$key] as $t) {
            $array[] = $types[$t];
        }
    }
    return $array;
}

// Retorna as fraquezas de um determinado tipo
function getWeaknessTypes(int $index)
{
    global $types, $relations;
    $effective = array();

    foreach ($relations as $key => $t) {
        foreach ($t['effective'] as $k => $e) {
            if ($index == $e) {
                $effective[] = $types[$key];
                break;
            }
        }
    }

    return $effective;
}

function getEffectiveTypes(int $index)
{
    return getTypes($index, 'effective');
}

function getNotEffectiveTypes(int $index)
{
    return getTypes($index, 'not-effective');
}

function getCantHitTypes(int $index)
{
    return getTypes($index, 'cannot-hit');
}