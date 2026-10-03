<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function userSearch(Request $request){
        $user = User::with(['roles','permissions']) -> where('name','like','%'.$request->keyword.'%')
            ->OrWhere('email','like','%'.$request->keyword.'%')
            ->paginate(2);
//        return response()->json($user);
        return  UserResource::collection($user);
    }
}
/*
LIKE Operator 	Description
WHERE CustomerName LIKE 'a%' 	Finds any values that start with "a"
WHERE CustomerName LIKE '%a' 	Finds any values that end with "a"
WHERE CustomerName LIKE '%or%' 	Finds any values that have "or" in any position
WHERE CustomerName LIKE '_r%' 	Finds any values that have "r" in the second position
WHERE CustomerName LIKE 'a_%' 	Finds any values that start with "a" and are at least 2 characters in length
WHERE CustomerName LIKE 'a__%' 	Finds any values that start with "a" and are at least 3 characters in length
WHERE ContactName LIKE 'a%o' 	Finds any values that start with "a" and ends with "o"
 */
