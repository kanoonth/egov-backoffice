<?php namespace App\Http\Controllers;
use App\Transaction;
use App\Available;
use App\Queue;
use App\Place;
use Illuminate\Http\Request;

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
            $response = [];
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

    public function createQueue(Request $request){
        try{
            $action_id = $request->input('action_id');
            $place_id = $request->input('place_id');
            $reg_id = $request->input('reg_id');
            $phone_no = $request->input('phone_no');
            $id_no = $request->input('id_no');
            $queue_code = rand(000000 ,999999 );
            $time_added = date('Y-m-d H:m:s');
            $time = $request->input('time');
            $temp = str_replace(","," ",$time);
            $appointment_time = date($temp);
            $status = 0;
            $response = [];
            $statusCode = 200;
            $queue_id = Queue::insertGetId(
                ['action_id' => $action_id,'place_id' => $place_id,
                'reg_id'=>$reg_id,'phone_no'=>$phone_no,'identification_no'=>$id_no,
                'status'=>$status,'queue_code'=>$queue_code,'time_added'=>$time_added,
                'appointment_time'=>$appointment_time]
            );
            $response = $queue_id;
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

    public function checkCode($queue_id,Request $request){
        try{
            $queue_code = $request->input('queue_code');

            $status = 1;
            $response = "OK";
            $statusCode = 200;
            Queue::where('queue_id',$queue_id)
            ->where('queue_code', $queue_code)
            ->update(['status' => $status]);
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

    public function getQueue($reg_id){
        try{
            $response = [];
            $statusCode = 200;
            $queues = Queue::where('reg_id','=',$reg_id)
            ->where('status','=','1')
            ->get();
            foreach($queues as $queue){
                $response[] = [
                    'queue_id' => $queue->queue_id,
                    'action_id' => $queue->action_id,
                    'place_id' => $queue->place_id,
                    'time_added' => $queue->time_added,
                    'appointment_time' => $queue->appointment_time,
                ];
            }
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

    public function postRate($queue_id,Request $request){
        try{
            $rate = $request->input('score');
            // $status = 0;
            $statusCode = 200;
            Queue::where('queue_id', $queue_id)
            ->update(['rate' => $rate]);
            $response = "OK";
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

    public function getPlace($queue_id){
        try{
            $response = [];
            $statusCode = 200;
            $queue = Queue::where('queue_id','=',$queue_id)->first();
            $place = Place::where('place_id','=',$queue['place_id'])->first();
            $response[] = [
                'id' => $place['place_id'],
                'name' => $place['name'],
                'longitude' => $place['longitude'],
                'latitude' => $place['latitude'],
            ];
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return response($response, $statusCode);
        }
    }

}
