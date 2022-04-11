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

    public function validation()
    {
        if (!$this->name) {
            self::$errors[] = "You must add a name";
        }

        if (!$this->surname) {
            self::$errors[] = "You must add a surname";
        }
        if (!$this->phone) {
            self::$errors[] = "You must add a phone";
        }

        if (!preg_match('/[0-9]{9}/', $this->phone)) {
            self::$errors[] = "Not valid format";
        }

        return self::$errors;
    }
}
