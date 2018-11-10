<?php
namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function store(Request $request)
    {
        logger('TwitterController::', [
            'data' => $request->json()->all()
        ]);

        return $request->all();
    }
}