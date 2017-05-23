<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    
	public function index(Category $category)
	{

		if($category->exists)
		{
			
			$jobs = $category->jobs()->paginate(10);


		} else {

			$jobs = Job::with('category')->paginate(10);

		}

		return view('jobs.index', compact('jobs'));
	}

	public function show($category, $job)
	{
		
		$job = Job::findOrFail($job);

		return view('jobs.show', compact('job'));

	}

}
