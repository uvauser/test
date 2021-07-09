<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
// https://github.com/jeremyharris/cakephp-lazyload
use JeremyHarris\LazyLoad\ORM\LazyLoadEntityTrait;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class User extends Entity
{
    use LazyLoadEntityTrait;
    
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
        'email' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
    
    
    /**
     * _setPassword
     * 
     * Source https://book.cakephp.org/4/en/tutorials-and-examples/cms/authentication.html
     * 
     * @param string $password
     * @return string|null
     */
    protected function _setPassword(string $password) : ?string
    {
     
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
    
    public function testGetSkills() {
        //var_dump($this->addresses);
        //die (' oqweipqwieopqiweopqiwpo');
    }
    
}
