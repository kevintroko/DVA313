<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artifact;



use Illuminate\Support\Facades\Input;

class ArtifactController extends Controller {
    
    
	public function __construct() {
      
    $this->middleware('userisadmin');
  }

  public function index() {
        //Gets the artifacts from the database! :) 
    $artifacts = Artifact::all()->sortByDesc("id");

    return view('admin.artifacts.index',compact(['artifacts']));
  }


   public function select(Request $request) {
    
      $ids = Input::get('id');
        
        //check IDs and update database if artifact is selected
        /*...*/

      return view('admin.artifacts.selected', compact('ids'));
  }


  public function refresh(){
    
    Artifact::refresh_all_artifacts_from_teamforge();
      
      return redirect('/admin/filter');
    }

}
