<?php

namespace App;

class Db
{

    protected \PDO $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php2', 'php2', 'php2');
    }

    public function query(string $sql, array $params = [], string $class = null): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if (null === $class) {
            return $data;
        }

        $ret = [];
        foreach ($data as $row) {
            $obj = new $class;
            foreach ($row as $key => $value) {
                $obj->$key = $value;
            }
            $ret[] = $obj;
        }

        return $ret;
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}
