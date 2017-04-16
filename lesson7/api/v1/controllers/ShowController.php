<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class ShowController extends Controller
{
  
    function __construct($request)
    {
        parent::__construct();
    
        if (isset($request['id'])) {
            $data = Capsule::table($request['table'])
                ->where('id', $request['id'])
                ->first();
        } else {
            $data = Capsule::table($request['table'])
                ->get();
        }

        new View($data);
    }
}
