<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

class PracticeController extends Controller
{
    //


    public function example4() {
        return 55;
    }

    public function example1() {
        $array = ['funny', 'cowardly', 'fraternity', 'and', 'optics', 'guy'];

        dd($array);
    }

    public function example2() {
        $test1 = env('APP_ENV');
        $test2 = env('APP_FAKE');
        $test3 = env('FUN_VALUE');

        echo $test1.'<br>';
        echo $test2.'<br>';
        echo $test3;
        dump(env());
    }
}
