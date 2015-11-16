<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 16/11/2015
 * Time: 6:42 AM
 */

namespace Larabook\Users;


class FollowUserCommand
{
    public $userId;

    public $userIdToFollow;

    /**
     * FollowUserCommand constructor.
     * @param $userId
     * @param $userIdToFollow
     */
    public function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }

}