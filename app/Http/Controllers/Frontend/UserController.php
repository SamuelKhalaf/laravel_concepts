<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function __construct()
    {
//        $this -> middleware('auth');
    }

    public function userName() : string
    {
        return 'Samuel khalaf';
    }

    public function userName1() : string
    {
        return 'Samuel khalaf 1';
    }

    public function userName2() : string
    {
        return 'Samuel khalaf 2';
    }
}
