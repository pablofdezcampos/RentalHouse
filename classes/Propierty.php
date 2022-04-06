<?php

namespace App;

class Propierty
{

    //Database
    protected static $db;
    protected static $columnsDB = ['id', 'title', 'price', 'image', 'description', 'rooms', 'wc', 'parking', 'sellerId'];

    //Errors
    protected static $errors = [];

    public $id;
    public $title;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
    //public $create;
    public $sellerId;

    public function __construct($args = [])
    {

        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        //$this->create = date('Y/m/D');
        $this->sellerId = $args['sellerId'] ?? '';
    }

    //Define Connection
    public static function setDataBase($database)
    {
        self::$db = $database;
    }

    public function save()
    {
        //Sanitization
        $attributes = $this->sanitization();

        $query = "INSERT INTO propierties (";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($attributes));
        $query .= " ') ";

        $result = self::$db->query($query);
        return $result;
    }

    public function attributes()
    {
        $attributes = [];
        foreach (self::$columnsDB as $column) {
            if ($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function sanitization()
    {
        $attributes = $this->attributes();
        $sanizitation = [];

        foreach ($attributes as $key => $value) {
            $sanizitation[$key] = self::$db->escape_string($value);
        }

        return $sanizitation;
    }

    //Upload files
    public function setImage($image)
    {
        if ($image) {
            $this->image = $image;
        }
    }

    //Validation
    public static function getErrors()
    {
        return self::$errors;
    }

    public function validation()
    {
        if (!$this->title) {
            self::$errors[] = 'You must add a title';
        }

        if (!$this->price) {
            self::$errors[] = 'The price is required';
        }

        if (!$this->image) {
            self::$errors[] = 'The image is required';
        }

        if (strlen($this->description) < 5) {
            self::$errors[] = 'You have to add a description';
        }

        if (!$this->rooms) {
            self::$errors[] = 'Rooms are required';
        }

        if (!$this->wc) {
            self::$errors[] = 'Bathrooms are required';
        }

        if (!$this->parking) {
            self::$errors[] = 'The parking is required';
        }

        if (!$this->sellerId) {
            self::$errors[] = 'Choose a seller';
        }

        return self::$errors;
    }

    public static function all()
    {
        $query = "SELECT * FROM propierties";
        $result = self::consultSQL($query);

        return $result;
    }

    public static function consultSQL($query)
    {
        $result = self::$db->query($query);

        //Iterate
        $array = [];
        while ($register = $result->fetch_assoc()) {
            $array[] = self::createObject($register);
        }

        //Free Up memory
        $result->free();

        return $array;
    }

    protected static function createObject($register)
    {
        $object = new self;

        foreach ($register as $key => $value) {
            if (property_exists($object, $key)) {
                $object->$key = $value;
            }
        }

        return $object;
    }
}
