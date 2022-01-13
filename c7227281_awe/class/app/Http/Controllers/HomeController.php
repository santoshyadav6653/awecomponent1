<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function create(Request $request)
    {


       $book = new Book();
       $book->choice = $request->choice;
       $book->firstname = $request->firstname;
       $book->surname = $request->surname;
       $book->price = $request->price;
       $book->papl = $request->papl;
       $book->entered_by =Auth::user()->name;
       $book->save();
       $book = Book::all();
       return view('welcome',compact('book'));

    }
    public function delete($id)
    {
        $data =Book::find($id);
        $data-> delete();
        return redirect('/');
    }
    public function showdata($id)
    {
        $data = Book::find($id);
        return view('edit',['data'=>$data]);

    }
    function update(Request $request)
    {
        $data = Book::find($request->id);
        $data->choice = $request->choice;
        $data->firstname = $request->firstname;
        $data->surname = $request->surname;
        $data->price = $request->price;
        $data->papl = $request->papl;
        $data->save();
        return redirect('/');
    }
}
