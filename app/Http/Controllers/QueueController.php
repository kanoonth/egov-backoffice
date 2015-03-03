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

}
