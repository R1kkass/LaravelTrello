<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    
    public function index()
    {
        return StatusResource::collection(Status::all());
    }
}
