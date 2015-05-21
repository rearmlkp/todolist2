<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$today = date('m/d/Y', time());
		$day = date('d', time());
		$month    = date('F', time());
		$monthNum = date('m', time());
		$year     = date('Y', time());
		//$dd       = date('d', strtotime($todo['created_at']));
		$fulldata = \App\Todo::where('isDone', 0)->get()->toArray();
		$data = \App\Todo::where('isDone', 0)->whereRaw('DATE(created_at) = DATE(NOW())')->get()->toArray();
		$done = \App\Todo::where('isDone', 1)->whereRaw('DATE(created_at) = DATE(NOW())')->get()->toArray();
		return view('home')->with([
			'name'     => \Auth::user()->name,
			'data'     => $data,
			'done'     => $done,
			'today'    => $day,
			'month'    => $month,
			'monthNum' => $monthNum,
			'year'     => $year,
			'fulldata' => $fulldata,
		]);
	}

	public function logout()
	{
		\Auth::logout();
		return redirect('/');
	}

	public function add()
	{
		if (\Auth::check())
		{
			$todo = new \App\Todo;
			$todo->title = $_GET['title'];
			$todo->description = $_GET['description'];
			$todo->priority = $_GET['priSelect'];
			$todo->isDone = false;
			$todo->users_id = \Auth::user()->id;
			$todo->save();
			return redirect('home');
		}
	}

	public function done()
	{
		if (\Auth::check())
		{
			$todo = \App\Todo::find($_GET['id']);
			$todo->isDone = true;
			$todo->save();
			return redirect('home');
		}
	}
}