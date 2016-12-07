<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

class PageController extends Controller
{

	/**
*
*/
	public function welcome(Request $request) {

    # Logged in users should not see the welcome page, send them to the books index instead.
    if($request->user())
        return redirect('/books');

    return view('welcome');
}
    public function contact() {
        return 'hello from page controller; contact us here';
    }

    public function help() {
        return 'hello from page controller; get help here';
    }



}
