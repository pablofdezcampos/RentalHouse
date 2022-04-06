<?php

namespace App;

class ActiveRecord
{

    //Database
    protected static $db;
    protected static $columnsDB = [];
    protected static $table = '';

    //Errors
    protected static $errors = [];

    //Define Connection
    public static function setDataBase($database)
    {
        self::$db = $database;
    }

    public function save()
    {
        if (!is_null($this->id)) {
            $this->update();
        } else {
            $this->create();
        }
    }

    public function create()
    {
        //Sanitization
        $attributes = $this->sanitization();

        $query = "INSERT INTO " . static::$table . " (";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($attributes));
        $query .= " ') ";

        $result = self::$db->query($query);

        //Redirect users
        if ($result) {
            header('Location: /admin?result=1');
        }
    }

    public function update()
    {
        $attributes = $this->sanitization();

        $values = [];
        foreach ($attributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        //Concatenation to set the values
        $query .= join(', ', $values);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $result = self::$db->query($query);

        if ($result) {
            header('Location: /admin?result=2');
        }
    }

    public function delete()
    {
        $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $result = self::$db->query($query);

        if ($result) {
            $this->deleteImage();
            header('location: /admin?result=3');
        }
    }

    public function attributes()
    {
        $attributes = [];
        foreach (static::$columnsDB as $column) {
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
        //Delete previous image
        if (!is_null($this->id)) {
            $this->deleteImage();
        }

        if ($image) {
            $this->image = $image;
        }
    }

    //Delete image
    public function deleteImage()
    {
        $existsFile = file_exists(IMAGE_FOLDER . $this->image);
        if ($existsFile) {
            unlink(IMAGE_FOLDER . $this->image);
        }
    }

    //Validation
    public static function getErrors()
    {
        return static::$errors;
    }

    public function validation()
    {
        static::$errors = [];
        return static::$errors;
    }

    //Search by id
    public static function findById($id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id = ${id}";

        $result = self::consultSQL($query);

        return array_shift($result);
    }

    public static function all()
    {
        $query = "SELECT * FROM " . static::$table;
        $result = self::consultSQL($query);

        return $result;
    }

    public static function consultSQL($query)
    {
        $result = self::$db->query($query);

        //Iterate
        $array = [];
        while ($register = $result->fetch_assoc()) {
            $array[] = static::createObject($register);
        }

        //Free Up memory
        $result->free();

        return $array;
    }

    protected static function createObject($register)
    {
        $object = new static;

        foreach ($register as $key => $value) {
            if (property_exists($object, $key)) {
                $object->$key = $value;
            }
        }

        return $object;
    }

    //Sync up the objetc in memory with the changes made by for the user
    public function syncUp($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $value) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
