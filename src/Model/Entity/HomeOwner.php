<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * @property int $id
 * @property int $envelope_id
 * @property int $operation_id
 * @property string $name
 * @property string $email
 * @property string $street_address
 * @property string $geolocation
 */
class HomeOwner extends Entity
{

    protected $_accessible = [
        '*' => true
    ];
}
