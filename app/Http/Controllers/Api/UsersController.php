<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\MessageNotification;

class UsersController extends Controller
{
    public function getUsers() {
        return response()->json(User::all());
    }

    public function live() {
        event(new MessageNotification('First Broadcast Message'));
    }
}
