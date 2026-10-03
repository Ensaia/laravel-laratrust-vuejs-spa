<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
	{
    $data = [];

    $users_count = \App\Models\User::count();
    $roles_count = \App\Models\Role::count();
    $permissions_count = \App\Models\Permission::count();
    $posts_count = \App\Models\Post::count();

    $data['users_count'] = $users_count;
    $data['roles_count'] = $roles_count;
    $data['permissions_count'] = $permissions_count;
    $data['posts_count'] = $posts_count;

    return response()->json($data);
	}

  public function dataCount(){

  }
}
