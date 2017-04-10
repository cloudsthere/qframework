<?php

namespace Framework;


class DB
{
    protected $config;
    protected static $instance;

    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }

    protected function connect()
    {
        // echo 'mysql:dbname='.$this->config['database'].';host='.$this->config['host'], $this->config['username'], $this->config['password'];exit;
         $this->pdo = new \PDO('mysql:dbname='.$this->config['database'].';host='.$this->config['host'], $this->config['username'], $this->config['password']);
    }

    public static function query($statement)
    {
        self::getInstance()->pdo->query($statement);
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static(Config::get('database'));
        }
        return self::$instance;
    }
}