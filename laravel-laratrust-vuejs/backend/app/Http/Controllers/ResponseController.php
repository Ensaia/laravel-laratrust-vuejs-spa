<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
class ResponseController extends Controller
{
    public static function dataCreated($data){
        if ($data) {
            return response()->json(['success' => Config::get('constants.message.CREATE_SUCCESS')],201);
        } else {
            return response()->json(['error' => Config::get('constants.message.CREATE_ERROR')],400);
        }
    }
    public static function dataUpdated($data){
        if ($data) {
            return response()->json(['success' => Config::get('constants.message.UPDATE_SUCCESS')],201);
        } else {
            return response()->json(['error' => Config::get('constants.message.UPDATE_ERROR')],400);
        }
    }
    public static function dataDeleted($data){
        if ($data) {
            return response()->json(['success' => Config::get('constants.message.DELETE_SUCCESS')],204);
        } else {
            return response()->json(['error' => Config::get('constants.message.DELETE_ERROR')],400);
        }
    }
}
