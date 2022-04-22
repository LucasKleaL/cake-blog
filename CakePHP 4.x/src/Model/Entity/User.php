<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Auth\DefaultPasswordHasher as AuthDefaultPasswordHasher;
use PhpParser\Node\Expr\Cast\String_;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Article[] $articles
 */
class User extends Entity
{
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'articles' => true,
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?String
    {
        if (strlen($password) > 0) {
            return (new AuthDefaultPasswordHasher())->hash($password);
        }
    }
}
