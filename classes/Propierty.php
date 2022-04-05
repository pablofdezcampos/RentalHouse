<?php

namespace App;

class Propierty
{

    //Database
    protected static $db;

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

    public function save()
    {
        $query = "INSERT INTO propierties (title, price, image, description, rooms, wc, parking, sellerId) 
        VALUES ('$this->title', '$this->price', '$this->image' , '$this->description', '$this->rooms', '$this->wc', '$this->parking', '$this->create', '$this->sellerId')";

        $result = self::$db->query($query);
    }

    //Define Connection
    public static function setDataBase($database)
    {
        self::$db = $database;
    }
}
