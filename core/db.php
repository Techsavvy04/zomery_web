<?php
class Database
{
    public $table;
    public $conn;
    public $sql;
    public function __construct($config, $table = null)
    {
        $this->config = $config;
        $this->connect();
        $this->table = $table;
    }

    public function connect()
    {
        try {
            $this->conn = new PDO(
                $this->config['db']['connectionString'],
                $this->config['db']['username'],
                $this->config['db']['password']
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET character_set_results=utf8");
            $this->conn->query('SET NAMES utf8');
        } catch (PDOException $e) {
            throw new Exception('Connect to database failed! Error: ' . $e->getMessage());
        }
        return $this->conn;
    }

    public function insert($table, $structure, $valueBinding)
    {
        $this->sql = 'insert into ' . $table . '(' . $structure . ')'
            . ' values (' . $valueBinding . ');';
        return $this;
    }

    public function delete()
    {
        $this->sql = 'delete ';
        return $this;
    }

    public function update($table)
    {
        $this->sql = 'update ' . $table;
        return $this;
    }

    public function set($value)
    {
        $this->sql .= ' set ' . $value;
        return $this;
    }

    public function select($column = '*')
    {
        $this->sql = 'select ' . $column;
        return $this;
    }

    public function from($table)
    {
        $this->sql .= ' from ' . $table;
        return $this;
    }

    public function join($table, $on)
    {
        $this->sql .= ' join ' . $table . ' on ' . $on;
        return $this;
    }

    public function where($condition)
    {
        $this->sql .= $condition != '' ? (' where ' . $condition) : '';
        return $this;
    }

    public function and($condition)
    {
        $this->sql .= $condition != '' ? (' and ' . $condition) : '';
        return $this;
    }

    public function groupBy($group)
    {
        $this->sql .= ' group by ' . $group;
        return $this;
    }

    public function having($having)
    {
        $this->sql .= ' having ' . $having;
        return $this;
    }

    public function orderBy($order)
    {
        $this->sql .= ' order by ' . $order;
        return $this;
    }

    public function limit($offset, $count = null)
    {
        if ($count != null) {
            $this->sql .= ' limit ' . $offset . ', ' . $count;
        } else {
            $this->sql .= ' limit ' . $offset;
        }
        return $this;
    }

    public function execute($param = null)
    {
        try {
            $this->sth = $this->conn->prepare($this->sql);
            $this->sth->execute($param);
            return $this;
        } catch (PDOException $e) {
            throw new Exception($e);
            return null;
        }
    }

    public function fetch($fetchMode = PDO::FETCH_OBJ)
    {
        return $this->sth->fetch($fetchMode);
    }

    public function fetchAll($fetchMode = PDO::FETCH_OBJ)
    {
        return $this->sth->fetchAll($fetchMode);
    }
}
