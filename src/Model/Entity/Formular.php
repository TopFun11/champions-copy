<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formular Entity
 *
 * @property int $id
 * @property string $name
 * @property int $screener_id
 *
 * @property \App\Model\Entity\Screener $screener
 * @property \App\Model\Entity\Formular-operator[] $formular_operators
 * @property \App\Model\Entity\Formular-variable[] $formular_variables
 */
class Formular extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
