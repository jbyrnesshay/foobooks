<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

class PageController extends Controller
{
    public function contact() {
        return 'hello from page controller; contact us here';
    }

    public function help() {
        return 'hello from page controller; get help here';
    }



}
