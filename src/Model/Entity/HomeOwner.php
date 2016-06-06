<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * @property int $id
 * @property string $name
 * @property int $operation_id
 * @property string $street_address
 * @property string $geolocation
 */
class HomeOwner extends Entity
{

    protected $_accessible = [
        '*' => true
    ];
}
