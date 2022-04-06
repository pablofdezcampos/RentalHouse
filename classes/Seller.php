<?php

namespace App;

class Seller extends ActiveRecord
{
    protected static $table = 'seller';
    protected static $columnsDB = ['id', 'name', 'surname', 'phone'];

    public $id;
    public $name;
    public $surname;
    public $phone;

    public function __construct($args = [])
    {

        $this->id = $args['id'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->surname = $args['surname'] ?? '';
        $this->phone = $args['phone'] ?? '';
    }
}
