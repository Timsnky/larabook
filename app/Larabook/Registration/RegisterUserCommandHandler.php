<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 10/7/15
 * Time: 8:21 AM
 */

namespace Larabook\Registration;


use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Larabook\Users\User;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler
{
    use DispatchableTrait;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * RegisterUserCommandHandler constructor.
     * @param $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        // TODO: Implement handle() method.
        $user = User::register(
            $command->username, $command->email, $command->password
	    );

        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }
}