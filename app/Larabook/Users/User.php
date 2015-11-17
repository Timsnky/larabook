<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Registration\Events\UserHasRegistered;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class User
 * @package Larabook\Users
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

    /**
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * @param $password
     */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * @var array
     */
	protected $fillable = ['username', 'email', 'password'];

	/**Register a new user
     *
	 * @param $username
	 * @param $email
	 * @param $password
	 * @return user
     */
	public static function register($username, $email, $password) {

		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserHasRegistered($user));

		return $user;
	}

    /**
     * Get the statuses for a user
     * @return statuses for a user
     */
    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status')->latest();
    }

    /**Check if the user object matched the Authenticated user
     *
     * @param $user
     * @return bool
     */
    public function is($user)
    {
        if(is_null($user)) return false;

        return $this->username == $user->username;
    }

    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }
}
