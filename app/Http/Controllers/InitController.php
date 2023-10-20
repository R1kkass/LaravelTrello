<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Tag;
use Illuminate\Http\Request;

class InitController extends Controller
{
    //
    public function init() {
        Tag::insert([
            [
                "name"=>"Потом",
                "color"=>"success"
            ],
            [
                "name"=>"Позже",
                "color"=>"warning"
            ],
            [
                "name"=>"Срочно",
                "color"=>"error"
            ]]
        );
        Status::insert([
            [
                "name"=>"Новые",
            ],
            [
                "name"=>"В процессе",
            ],
            [
                "name"=>"Выполнено",
            ],
            ]
        );
        return true;
    }
}
