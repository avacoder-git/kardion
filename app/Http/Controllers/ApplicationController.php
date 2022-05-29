<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\V1\Application\NewRequest;
use App\Http\Requests\Api\V1\Application\TypeRequest;
use App\Http\Resources\Api\V1\Application\ApplicationCollection;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use function Symfony\Component\Translation\t;

class ApplicationController extends Controller
{


    public function index(){
        $applications = Application::paginate();


        return new ApplicationCollection($applications);
    }



    public function  createNew(NewRequest $request)
    {

        $data = $request->validated();

        if (!in_array($data['type'], Application::TYPES))
            return response()->json([
                'success' => false,
                'message' => "Type is not supported"
            ]);

        if ($data['status_id']!== Application::STATUSES)
            return response()->json([
                'success' => false,
                'message' => "Status is not supported"
            ]);
        $data['user_id'] = auth()->check() ? auth()->user()->id : 1;


        switch ($data['type'])
        {
            case Application::TYPE_AMBULATORY: $data['applicationable_type'] = "App\\Models\\User"; break;
            case Application::TYPE_STATIONARY: $data['applicationable_type'] = "App\\Models\\Section"; break;
            case Application::TYPE_ONLINE: $data['applicationable_type'] = "App\\Models\\User"; break;
        }
        unset($data['type']);

        $application = Application::create($data);

        return response()->json(['success' => true, 'message' => 'Successfully created!', 'application' => $application]);

    }


    public function createType(TypeRequest $request, Application $application)
    {
        $data = $request->validated();

        $application->update($data);

        return response()->json(['success' => true, 'message' => 'successfully created', 'application'=> $application]);

    }



}
