<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 02/11/2015
 * Time: 7:30 PM
 */

namespace Larabook\Statuses;

use Larabook\Users\User;

class  StatusRepository
{
    public function save(Status $status, $userId)
    {
        return User::findOrfail($userId)->statuses()->save($status);
    }

    public function getAllForUser(User $user)
    {
        return $user->statuses()->with('user')->latest()->get();
    }

    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');

        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();
    }
}