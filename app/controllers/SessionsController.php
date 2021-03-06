 <?php

 use Larabook\Forms\SignInForm;


 /**
  * Class SessionsController
  */
 class SessionsController extends \BaseController {

	/**
	 * SessionsController constructor.
	 */
	 public $signInForm;

	public function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;

		$this->beforeFilter('guest',['except' => 'destroy']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

     /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('email', 'password');

		$this->signInForm->validate($input);

		if (! Auth::attempt($input))
		{
            Flash::message("We were unable to sign you in. Please check your credentials and try again");

            return Redirect::back()->withInput();
		}
        Flash::message('Welcome back');

        return Redirect::intended('statuses');
	}

	 public function destroy ()
	 {
		 Auth::logout();

		 Flash::message('You have now been logged out');

		 return Redirect::home();
	 }
}
