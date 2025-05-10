<?php


if ($_SERVER['REQUEST_URI'] === '/') {
    require 'index.html';
}

if ($_SERVER['REQUEST_URI'] === '/admin/uj-etel') {
    require 'admin-food.html';
}

if ($_SERVER['REQUEST_URI'] === '/admin/uj-etel-tipus') {
    require 'admin-food-type.html';
}

