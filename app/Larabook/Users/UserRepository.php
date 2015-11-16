<?php namespace Larabook\Users;

/**
 * Class UserRepository
 * @package Larabook\Users
 */
class UserRepository
{
    /**
     * @param User $user
     * @return saves user
     */
    public function save (User $user)
    {
        return $user->save();
    }

    /**
     * @param Get paginated results, default 25
     * @return paginated results
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    /**
     * Find a user by their username
     * @param $username
     * @return the user
     */
    public function findByUsername($username)
    {
        return User::with('statuses')->whereUsername($username)->first();
    }

    /**
     * Find a user by their Id
     * @param $id
     * @return user
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Follow a user
     * @param $userIdToFollow
     * @param User $user
     * @return user
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->followedUsers()->attach($userIdToFollow);
    }

    /**
     * UnFollow a user
     * @param $userIdToUnFollow
     * @param User $user
     * @return user
     */
    public function unfollow($userIdToUnFollow, User $user)
    {
        return $user->followedUsers()->detach($userIdToUnFollow);
    }
}