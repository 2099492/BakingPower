<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function index() {
        if (auth()->user()->role == 'admin') {
            return redirect('/admin/products');
        }
        if (auth()->user()->role == 'user') {
            return redirect('/home');
        }
        if (auth()->user()->role == 'guest') {
            return redirect('/home');
        }
    }
}
