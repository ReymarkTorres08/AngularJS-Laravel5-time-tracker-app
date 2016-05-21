<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TimeEntry;

use Illuminate\Support\Facades\Request;

class TimeEntriesController extends Controller
{
    // Gets time entries and eager loads their associated users
    /*
		Eager loading exists to alleviate the N + 1 (meaning query loops)
		query problem to reduce the number of queries.
     */
    public function index()
    {
    	$time = TimeEntry::with('user')->get();

    	return $time;
    }


    // Grab all the data passed into the request
    // and fill the database record with the new data
    public function update($id)
    {
    	$timeentry = TimeEntry::find($id);

    	$data = Request::all();

    	$timeentry->fill($data);

    	$timeentry->save();
    }


    // Grab all the data passed into the request and save a new record
    public function store()
    {
    	$data = Request::all();

    	$timeentry = new TimeEntry();

    	$timeentry->fill($data);

    	$timeentry->save();
    }

    public function destroy($id)
    {
    	$timeentry = TimeEntry::find($id);

    	$timeentry->delete();
    }
}
