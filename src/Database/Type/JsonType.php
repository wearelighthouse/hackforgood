<?php

namespace App\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;

use PDO;

class JsonType extends Type
{

    /**
     * @return array
     */
    public function toPHP($value, Driver $driver)
    {
        if ($value === null) {
            return null;
        }

        return json_decode($value, true);
    }

    /**
     * @return array
     */
    public function marshal($value)
    {
        if (is_array($value) || $value === null) {
            return $value;
        }

        return json_decode($value, true);
    }

    /**
     * @return string
     */
    public function toDatabase($value, Driver $driver)
    {
        return json_encode($value);
    }

    /**
     * @return null|string
     */
    public function toStatement($value, Driver $driver)
    {
        if ($value === null) {
            return PDO::PARAM_NULL;
        }

        return PDO::PARAM_STR;
    }
}
