<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Auth;

class Controller extends BaseController
{

    public function __construct() {
        $this->middleware(function($request, $next) {
            View::share('user', auth()->user());
            $this->user = auth()->user();

            return $next($request);
        });
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
