<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 02/11/2015
 * Time: 7:30 PM
 */

namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository
{
    public function save(Status $status, $userId)
    {
        return User::findOrfail($userId)->statuses()->save($status);
    }
}