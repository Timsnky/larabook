<?php

use Larabook\Core\CommandBus;
use Larabook\Statuses\PublishStatusCommand;

class StatusController extends \BaseController {

    use CommandBus;

	public function index()
	{
		//
		return View::make('statuses.index');
	}

    public function store()
    {
        $this->execute(new PublishStatusCommand(Input::get('body'), Auth::user()->id));
    }
}
