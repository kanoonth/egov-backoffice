<?php namespace App\Http\Controllers;
use App\Action;

class ActionServiceController extends Controller {
	public $restful = true;

	public function show($id){
        try{
            $response = [
                'action' => []
            ];
            $statusCode = 200;
            $action = Action::where('action_id','=',$id)->first();
            $response['action'][] = [
                'id' => $action->action_id,
                'name' => $action->name,
                'description' => $action->description
            ];
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

}