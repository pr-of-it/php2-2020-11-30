<?php

namespace App;

abstract class Model
{

    protected const TABLE = '';

    public int $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

}