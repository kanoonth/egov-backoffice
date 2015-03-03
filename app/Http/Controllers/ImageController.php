<?php namespace App\Http\Controllers;
use App\Action;
use App\Requirement;
// use App\Document;
use Illuminate\Http\Request;

class ImageController extends Controller {


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
        return view('image.index');
    }

    public function uploadImage(Request $request){
        $file = $request->file('file');
        $extension =$file->getClientOriginalExtension();
        $filename = str_random(12).'.'.$extension;
        $destinationPath = public_path().'/images/upload';
        $file->move($destinationPath,$filename);
        return response('success', 200);

    }

}