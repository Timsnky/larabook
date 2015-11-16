<?php
/**
 * Created by PhpStorm.
 * User: interntwo
 * Date: 16/11/2015
 * Time: 6:11 PM
 */

namespace Larabook\Users;


trait FollowableTrait
{

    /**Get the users that the current user follows
     *
     * @return followers
     */
    public function followedUsers()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')
            ->withTimestamps();
    }

    /**Get the list of users who follow the current users
     *
     * @return mixed
     */
    public function followers()
    {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')
            ->withTimestamps();

    }

    /**Determine if this User is followed by OtherUser
     *
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);

    }


}