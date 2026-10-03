<?php
namespace app\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];

        $latest_posts = PostResource::collection(Post::latest()->take(2)->get());

        $data['latest_posts'] = $latest_posts;

        return response()->json($data);
    }
}
