<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 16/11/2015
 * Time: 6:43 AM
 */

namespace Larabook\Users;


use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler
{

    protected $userRepo;

    /**
     * FollowUserCommandHandler constructor.
     * @param $userRepo
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);

        $this->userRepo->follow($command->userIdToFollow, $user);

        return $user;
    }
}