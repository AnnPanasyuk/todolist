<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        get()
        $todos = Todo::with('user')->paginate(10);
//         локальные переменные шаблона
        return view('home', [ 'todos' => $todos ]);
    }

    public function getLastTodos() {
        $lastTodos = Todo::with('user')->latest()->take(5)->get();
        return view('home', [ 'lastTodos' => $lastTodos ]);
    }

    public function toggle(Request $request) {
        $todo = Todo::find($request->id);
        $todo->status = !$todo->status;
        $todo->save();
        return redirect('/');
    }

    public function create() {
        $todo = new Todo();

        return view('add', ['todo' => $todo]);
    }

    public function store(Request $request) {
        Todo::create(['desc' => $request->desc, 'user_id' => \Auth::user()->id]);

        return redirect('/');
    }

}
