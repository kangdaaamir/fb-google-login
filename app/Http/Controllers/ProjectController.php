<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Auth;
use Session;
use Redirect;

class ProjectController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::select('projects.*','users.name')->leftJoin('users', 'users.id', '=', 'projects.assign_project_to')->get();
       // $categories=Categories::all();

        $user = Auth::user();

        if($user->user_type_id == "1"){
        return view('projects.index', compact('projects'));

    }else{

        return view('projects.indexdesigner', compact('projects'));
    }
    }

    public function create()
    {
    	$users=User::all();

         $user = Auth::user();

        if($user->user_type_id == "1"){

           return view('projects.create', compact('users'));

        }else{

           return Redirect::to('/projects');
        }
        

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'           => 'required|unique:projects',
            'description'          => 'required',
            'assign_project_to'          => 'required',
            /*'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'          => 'required',*/
        ]);
       
        $projects = new Project;

        $projects->title =$request->title;
        $projects->description =$request->description;       
		$projects->due_date = $request->due_date;
		$projects->assign_project_to =$request->assign_project_to; 
        $projects->assign_by = auth()->user()->name;


		if ($files = $request->file('image')) {
			$destinationPath = public_path('project');

			
			 
			//$destinationPath = 'public/product/'; // upload path
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath, $profileImage);
			$projects->image = "$profileImage";
		}


        if($projects->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Project Successfully Added.',
                'type'  => 'success',
            ];
            
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Occurred While Adding a Project.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('projects.index');
    }

    public function edit($id)
    {
        
        $project = Project::findOrFail($id);
        $users=User::all();

        $user = Auth::user();

        if($user->user_type_id == "1"){

           return view('projects.edit',  compact('project','users'));

        }else{

           return Redirect::to('/projects');
        }
        
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, [
            'title'           => 'required|unique:projects,title,' . $id,
            'description'          => 'required',
            'assign_project_to'          => 'required',
           /* 'status'          => 'required',*/
        ]);

        $projects = Project::findOrFail($id);




        if ($files = $request->file('image')) {
			$destinationPath = public_path('project');
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath, $profileImage);
			$projects->image= "$profileImage";
		}

	 	$projects->title =$request->title;
        $projects->description =$request->description;       
		$projects->due_date = $request->due_date;
		$projects->assign_project_to =$request->assign_project_to; 
        $projects->assign_by = auth()->user()->name;
       
        if($projects->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Project Successfully Updated.',
                'type'  => 'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Update The Project.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('projects.index');
    }

    public function delete(Request $request)
    {
        $projects = Project::findOrFail($request->id);
        if($projects->delete())
        {
            $alert_toast = 
            [
                'title' =>  'Operation Successful : ',
                'text'  =>  'Project Successfully Deleted.',
                'type'  =>  'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Deleting The Project.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('projects.index');

    }


    }
