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
        //$this->create = date('Y/m/D');
        $this->sellerId = $args['sellerId'] ?? '';
    }
}
