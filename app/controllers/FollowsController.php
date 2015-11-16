<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Follow a user
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_add(Input::get(), 'userId', Auth::id());

        $user = $this->execute(FollowUserCommand::class, $input);

        Flash::success("You are now following the user");

        return Redirect::back();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($userIdToUnfollow)
	{
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(UnfollowUserCommand::class, $input);

        Flash::success("You have Unfollowed this user");

        return Redirect::back();
	}


}
