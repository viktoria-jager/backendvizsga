<?php

class DishTypeController
{
    public static function adminList()
    {
        $dishTypes = DishTypeModel::getAll();
        require "views/admin-food-type.html";
    }

    public static function create()
    {
        $name = $_POST['name'];
        DishTypeModel::create($name);
        header("Location: /admin/uj-etel-tipus");
    }

    public static function editPage($id)
    {
        $dishType = DishTypeModel::getOneById($id);
        require "views/admin-food-type-edit.html";
    }

    public static function update($id)
    {
        $name = $_POST['name'];
        DishTypeModel::update($id, $name);
        header("Location: /admin/uj-etel-tipus");
    }

    public static function delete($id)
    {
        DishTypeModel::delete($id);
        header("Location: /admin/uj-etel-tipus");
    }
}
