<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TasksResource;
use App\Models\Action;
use App\Models\TagTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{



    public function index()
    {
        return parent::staticIndex();
    }

    public function store(TaskRequest $request)
    {
        $validate = $request->validated();
        Task::create($validate);
        return parent::staticIndex();
    }

    public function show(string $id)
    {
        return parent::staticShow($id);
    }

    public function update(Request  $request, string $id)
    {
        $request->validate([
            "title"=>"required|min:5|max:30",
            "description"=>"max:200",
            "status_id"=>'required|integer',
        ]);
        Task::find($id)->update([
            'title'=>$request->title,
            'description'=>strval($request->description),
            "status_id"=>$request->status_id
        ]);
        return parent::staticIndex($id);
    }

    public function destroy(string $id)
    {
        DB::transaction(function() use($id){
            TagTask::where('task_id', '=', $id)->delete();
            Action::where('task_id', '=', $id)->delete();
            Task::where('id', '=', $id)->delete();
        });

        return parent::staticIndex($id);
    }
}
