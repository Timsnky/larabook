<?php namespace Larabook\Users;

class UnfollowUserCommand {

    public $userId;

    public $userIdToUnfollow;

    /**
     * UnfollowUserCommand constructor.
     * @param $userId
     * @param $userIdToUnfollow
     */
    public function __construct($userId, $userIdToUnfollow)
    {
        $this->userId = $userId;
        $this->userIdToUnfollow = $userIdToUnfollow;
    }


}