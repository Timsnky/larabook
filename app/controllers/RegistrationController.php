<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;


class RegistrationController extends \BaseController {


	private $registrationForm;

	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;

		$this->beforeFilter('guest');
	}
	/**
	 * Show t he form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('registration.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->registrationForm->validate(Input::all());

        $user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);

		Flash::overlay("Glad to have you on board");

		return Redirect::home();
	}


}
