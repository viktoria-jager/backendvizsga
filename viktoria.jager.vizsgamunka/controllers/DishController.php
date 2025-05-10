<?php

class DishController
{
    public static function list()
    {
        $dishes = DishModel::get();
        $dishTypes = DishTypeModel::getAll();
        require "views/admin-food.html";
    }

    public static function create()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $isActive = isset($_POST['isActive']) ? 1 : 0;
        $typeId = $_POST['typeId'];

        DishModel::create($name, $price, $isActive, $typeId);

        header("Location: /admin/uj-etel");
    }

    public static function editPage($id)
    {
        $dish = DishModel::getOneById($id);
        $dishTypes = DishTypeModel::getAll();

        require "views/admin-food-edit.html";
    }

    public static function update($id)
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $isActive = isset($_POST['isActive']) ? 1 : 0;
        $typeId = $_POST['typeId'];

        DishModel::update($id, $name, $price, $isActive, $typeId);

        header("Location: /admin/uj-etel");
    }

    public static function delete($id)
    {
        DishModel::delete($id);

        header("Location: /admin/uj-etel");
    }
}
