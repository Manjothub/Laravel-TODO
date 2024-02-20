<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user_id = Auth::id(); 
        $todos = Todo::where('user_id', $user_id)->get(); 
        return view('welcome', ['todos' => $todos]);
    }

    public function saveTask(Request $request){
        $name = $request->input('task_name');
        $desc = $request->input('task_desc');
        $status = $request->input('task_status');
        $user_id = Auth::user()->id;

        Todo::create([
            'task_name' => $name,
            'task_desc' => $desc,
            'task_status' => $status,
            'user_id' => $user_id
        ]);

        return redirect()->route('home')->with('success', 'Task created successfully.');
    }
    public function edit($id){
        $todo = Todo::find($id);
        return view('edit', ['todo' => $todo]);
    }

    public function update(Request $request){
        $id = $request->input('id');
        $name = $request->input('task_name');
        $desc = $request->input('task_desc');
        $status = $request->input('task_status');

        $todo = Todo::find($id);
        $todo->task_name = $name;
        $todo->task_desc = $desc;
        $todo->task_status = $status;
        $todo->save();

        // Redirect back or to a specific route
        return redirect()->route('home')->with('success', 'Todo item updated successfully.');

    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }

public function dologin(Request $request){
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        return redirect()->route('home');
    }
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    public function doregister(){
        $username = request('username');
        $email = request('email');
        $password = request('password');

        User::create([
            'name' => $username,
            'email' => $email,
            'password' => $password
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please Login');
    }
    public function delete($id)
    {
        Todo::destroy($id);

        return redirect()->back()->with('success', 'Todo item deleted successfully.');
    }

    
}

