<?php

namespace App\Http\Controllers;


class ErrorController extends Controller
{
    public function back()
    {
        if (auth()->guard('admin')->check()) {
            return to_route("admin.dashboard");
        } 
        return to_route("index");
    }
}
