<?php

require_once "./Controller.php";
require_once "./DishController.php";
require_once "./DishTypeController.php";

$routes = [
    ["GET", "", [DishController::class, "home"]],

    ["GET", "admin/uj-etel", [DishController::class, "list"]],
    ["GET", "admin/etelek", [DishController::class, "editForm"]],
    ["POST", "dishes", [DishController::class, "create"]],
    ["POST", "dishes/delete", [DishController::class, "delete"]],
    ["POST", "dishes/edit", [DishController::class, "edit"]],

    ["GET", "admin/uj-etel-tipus", [DishTypeController::class, "list"]],
    ["GET", "admin/etel-tipusok", [DishTypeController::class, "editForm"]],
    ["POST", "dishTypes", [DishTypeController::class, "create"]],
    ["POST", "dishTypes/delete", [DishTypeController::class, "delete"]],
    ["POST", "dishTypes/edit", [DishTypeController::class, "edit"]],
];

$requestUri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestParts = explode("/", trim($requestUri, "/"));

foreach ($routes as [$method, $routeUri, $handler]) {
    $routeParts = explode("/", $routeUri);

    if ($method !== $requestMethod) continue;
    if (count($routeParts) !== count($requestParts)) continue;

    $params = [];
    $matched = true;

    foreach ($routeParts as $index => $part) {
        if (preg_match( $part, $matches)) {
            $params[$matches[1]] = $requestParts[$index];
        } elseif ($part !== $requestParts[$index]) {
            $matched = false;
            break;
        }
    }

    if ($matched) {
        call_user_func_array($handler, $params ? array_values($params) : []);
        exit;
    }
}

http_response_code(404);
echo "Nincs ilyen végpont.";
