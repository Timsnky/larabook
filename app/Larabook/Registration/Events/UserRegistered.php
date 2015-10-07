<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 10/7/15
 * Time: 9:56 AM
 */

namespace Larabook\Registration\Events;

use Larabook\Users\User;


class UserRegistered
{
    public $user;

    /**
     * UserRegistered constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


}