<?php

namespace App\Http\Controllers;

use App\Employer;

use Illuminate\Http\Request;

class EmployersController extends Controller
{

	public function index()
	{
        $employers = Employer::all();
		return view('admins.employers.index', compact('employers'));
	}

	public function show(Employer $employer)
	{
		return view('admins.employers.show', compact('employer'));
	}

    public function create(Employer $employer)
    {
        $employer = $employer->where('user_id', auth()->id())->first();

        if(count($employer))
        {
            return redirect()->route('employer.profile.edit', $employer);
        }

        return view('employers.create');
    }

    public function edit(Employer $employer)
    {

        if(auth()->id() != $employer->user_id)
        {

            flash('Don\'t be naughty');

            return redirect('/home');
        }

        return view('employers.edit', compact('employer'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

    	$employer = Employer::create([
    		'name' => request('name'),
            'user_id' => auth()->user()->id,
    		'description' => request('description')
    	]);

        flash('Your employer profile has been created');

    	return redirect('/home');
    }

    public function update(Request $request, Employer $employer)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        Employer::find($employer->id)->update($request->all());

        flash('Your employer details have been update');

        return redirect('/home');
    }

    public function updateDeal(Request $request)
    {
        $employer = Employer::find($request->get('employer_id'));

        $deal = $employer->deals->where('id', $request->deal_id);

        if(!$deal->isEmpty())
        {
            return back();
        }

        $employer->deals()->attach($request->get('deal_id'));

        return redirect()->back();
    }

    public function employerDealsIndex()
    {
        $employer = Employer::where('user_id', auth()->user()->id)->with('deals')->get();

        if (!count($employer))
        {
            return redirect('/home');
        }

        //return $employer->first()->deals()->first();

        return view('deals.index', compact('employer'));
    }
}
