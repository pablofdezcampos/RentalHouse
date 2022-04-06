<?php

namespace App;

class Propierty extends ActiveRecord
{
    protected static $table = 'propierties';
    protected static $columnsDB = ['id', 'title', 'price', 'image', 'description', 'rooms', 'wc', 'parking', 'sellerId'];

    public $id;
    public $title;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
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
        $this->sellerId = $args['sellerId'] ?? '';
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
}
