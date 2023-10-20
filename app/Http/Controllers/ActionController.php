<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionRequest;
use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActionRequest $request)
    {
        $data = $request->validated();
        Action::create($data);
        return parent::staticIndex();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "status"=>"required|boolean",
            "descriptions"=>"required|string|max:50|min:1",
        ]);
        Action::find($id)->update(["status"=>$request->status, 'descriptions'=>$request->descriptions, ]);
        return parent::staticIndex();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Action::where('id', '=', $id)->delete();
        return parent::staticIndex();
    }
}
