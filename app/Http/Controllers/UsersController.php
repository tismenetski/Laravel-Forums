<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications(){

        // mark all as read

        auth()->user()->unreadNotifications->markAsRead(); // mark all notifications as read

        // display all notifications
    }
}
