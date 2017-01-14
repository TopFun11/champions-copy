<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $role
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class User extends Entity
{

  // Make all fields mass assignable except for primary key field "id".
   protected $_accessible = [
       '*' => true,
       'id' => false
   ];

   // ...

   protected function _setPassword($password)
   {
       return (new DefaultPasswordHasher)->hash($password);
   }

   // ...
}
