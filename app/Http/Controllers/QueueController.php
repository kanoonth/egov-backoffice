<?php namespace App\Http\Controllers;
use App\Action;
use App\Requirement;
// use App\Document;
use Illuminate\Http\Request;
use App\Queue;

class QueueController extends Controller {


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

    public function showQueue() {
        $queues = Queue::all();
        return view('queue.queue')->with('queues', $queues);
    }

    public function pushNoti($queue_id) {
        $ch = curl_init('https://android.googleapis.com/gcm/send');
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json',
            'Authorization:key=AIzaSyBGK5_AiuXrX6CFLLNPuTQYA339fW7llp8'
            ));     

        $queue = Queue::where('queue_id',$queue_id)->first();

        $reg_id = $queue['reg_id']; 
        // $request = [
        //     'registration_ids' => [],'data'=>[]
        // ];
        // $request['registration_ids'] = [
        //            $reg_id
        //         ];
        // $request['data'] = [
        //             '{"id": 22}'
        // ];
        $data_string = '{"registration_ids":["'.$reg_id.'"], "data":{ "id": '.$queue_id.' } }';
        // $request = array('registration_ids' => $reg_id,'data'=>array('id' => 22));
        // $data_string = array();
        // $data_string = json_decode($request);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($ch);  
        return redirect('queue')
                       ->with('success', $response);
    }

}
