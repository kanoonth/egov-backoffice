<?php namespace App\Http\Controllers;
use App\Transaction;
use App\Available;

class ServiceController extends Controller {


    public $restful = true;

    public function getAllTransaction() {
        try{
            $response = [];
            $statusCode = 200;
            $transactions = Transaction::all();
            foreach($transactions as $transaction){
                $response[] = [
                    'code' => $transaction->id,
                    'type' => $transaction->type,
                    'content' => $transaction->content
                ];
            }
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }
    
    public function getTransaction($version) {
        try{
            $response = [
            ];
            $statusCode = 200;
            $transactions = Transaction::where('id','>',$version)->get();
            foreach($transactions as $transaction){
                $response[] = [
                    'code' => $transaction->id,
                    'type' => $transaction->type,
                    'content' => $transaction->content
                ];
            }
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

    public function getPlaceByAction($actionId){
        try{
            $response = [
            ];
            $statusCode = 200;
            $places = Available::join('place', 'available.place_id', '=', 'place.place_id')
            ->where('available.action_id','=',$actionId)
            ->select('place.place_id', 'place.name', 'place.longitude','place.latitude')
            ->get();
            foreach($places as $place){
                $response[] = [
                    'id' => $place->place_id,
                    'name' => $place->name,
                    'longitude' => $place->longitude,
                    'latitude' => $place->latitude
                ];
            }
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

}