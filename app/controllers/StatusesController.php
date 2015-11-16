<?php

use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;
use Larabook\Forms\PublishStatusForm;

class StatusesController extends \BaseController {

    protected $statusRepository, $publishStatusForm;

    /**
     * StatusController constructor.
     * @param $statusRepository
     */
    public function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
        $this->publishStatusForm = $publishStatusForm;
    }


    public function index()
	{
        $statuses = $this->statusRepository->getFeedForUser(Auth::user());

		return View::make('statuses.index', compact('statuses'));
	}

    public function store()
    {
        $input = Input::get();

        $input['userId'] = Auth::id();

        $this->publishStatusForm->validate($input);

        $this->execute(PublishStatusCommand::class, $input);

        Flash::message("Your status has been updated");

        return Redirect::back();
    }
}
