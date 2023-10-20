<?php

namespace App\Http\Controllers;

use App\Http\Resources\TasksResource;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function staticIndex()
    {
        $res = Task::with('status', 'actions')->with(['tags_keys'=>['tags']])->get();
        return TasksResource::collection($res);
    }

    public static function staticShow(string $id)
    {
        //
        $res = Task::with('status', 'actions')->with(['tags_keys'=>['tags']])->find($id)->get();
        return TasksResource::collection($res);
    }
}
