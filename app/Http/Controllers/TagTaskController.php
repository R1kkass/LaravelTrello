<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagTaskRequest;
use App\Models\TagTask;
use Illuminate\Http\Request;

class TagTaskController extends Controller
{

    public function store(TagTaskRequest $request)
    {
        $data = $request->validated();
        $res = TagTask::where(["task_id"=>$request->task_id, "tag_id"=>$request->tag_id])->get();
        if(!count($res)){
            TagTask::create($data);
        }
        return parent::staticIndex();
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tag_id'=>"required|number"
        ]);
        TagTask::find($id)->update(['tag_id'=>$request->tag_id]);
        return parent::staticIndex();
    }

    public function destroy(string $id)
    {
        TagTask::find($id)->delete();
        return parent::staticIndex();
    }
}
