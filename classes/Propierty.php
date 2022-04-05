<?php

namespace App;

class Propierty
{

    //Database
    protected static $db;
    protected static $columnsDB = ['id', 'title', 'price', 'image', 'description', 'rooms', 'wc', 'parking', 'create', 'sellerId'];

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
    public $create;
    public $sellerId;

    public function __construct($args = [])
    {

        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? 'image.jpg';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->create = date('Y/m/d') ?? '';
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

        $string = join(', ', array_keys($attributes));

        $query = "INSERT INTO propierties (";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($attributes));
        $query .= " ') ";

        $result = self::$db->query($query);
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

        /*if (!$this->image['name'] || $this->image['error']) {
            $errors[] = 'The image is required';
        }

        //Validate image by size
        $size = 1000 * 1000; //1mb max
        if ($this->image['size'] > $size) {
            $errors[] = 'The image weigth to much';
        }*/

        return self::$errors;
    }
}
