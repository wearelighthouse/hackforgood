<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * @property int $id
 * @property string $name
 * @property string $geolocation
 */
class Operation extends Entity
{

    protected $_accessible = [
        '*' => true
    ];
}
