<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 03/11/2015
 * Time: 8:40 PM
 */

use Larabook\Users\UserRepository;

class UserController extends \BaseController
{
    protected $userRepository;

    /**
     * UserController constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return View to display the users
     */
    public function index()
    {
        $users = $this->userRepository->getPaginated();

        return View::make('users.index')->withUsers($users);
    }

    public function show($username)
    {
        $user = $this->userRepository->findByUsername($username);

        return View::make('users.show')->withUser($user);
    }
}