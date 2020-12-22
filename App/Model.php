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

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);
        if (empty($data)) {
            return null;
        } else {
            return $data[0];
        }
    }

    public function insert()
    {
        $props = [];
        $binds = [];
        $data  = [];
        foreach (get_object_vars($this) as $prop => $value) {
            $props[] = $prop;
            $binds[] = ':' . $prop;
            $data[':' . $prop] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $props). ') VALUES (' . implode(', ', $binds). ')';
        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();
    }

}
