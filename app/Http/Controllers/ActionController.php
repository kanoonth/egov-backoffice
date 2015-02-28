<?php namespace App\Http\Controllers;
use App\Action;

class ActionController extends Controller {


    public $restful = true;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('action.index')
        ->with('actions', Action::orderBy('name')->get());
    }

    public function detail($id){
        return view('action.detail')
        ->with('action', Action::where('action_id','=',$id)->first());
    }

    public function show($id){
        try{
            $response = [
                'action' => []
            ];
            $statusCode = 200;
            $action = Action::find($id);
            $response['action'][] = [
                'id' => $action->action_id,
                'name' => $action->name,
                'description' => $action->description
            ];
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return Response::json($response, $statusCode);
        }
    }

}