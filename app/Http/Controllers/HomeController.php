<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Usertype;
use Auth;
use Session;
use Mail;
use App\Mail\WelcomeMail;

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
        $user = Auth::user();
        $usertypes=UserType::all();

        if(isset($user->user_type_id)){

            return redirect()->route('projects.index');

        }else{
       // print($id);exit;
        // $user = User::findOrFail($id);
        return view('home', compact('user','usertypes'));

        }
        /*return view('home');*/
    }

      public function registeration(Request $request, $id)
    {
         $this->validate($request, [
            'email'           => 'required|unique:users,email,' . $id,
            'name'          => 'required',
            'phone'          => 'required|unique:users,phone,' . $id,
        ]);

        $users = User::findOrFail($id);

        if ($files = $request->file('image')) {
            $destinationPath = public_path('users');
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
            $users->image= "$profileImage";
        }

        $users->name =$request->name; 
        $users->phone =$request->phone;  
        $users->email =$request->email;  
        $users->user_type_id =$request->user_type_id;  

       //$email = $request->email;
        if($users->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Users Successfully Updated.',
                'type'  => 'success',
            ];

            /*Mail::to($email)->send(new WelcomeMail($users));*/
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Update The Users.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('projects.index');
    }

    
}
