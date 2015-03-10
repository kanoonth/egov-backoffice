<?php namespace App\Http\Controllers;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller {


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
        return view('place.index')
        ->with('places', Place::all());
    }

    public function detail($id){
        return view('place.detail')
        ->with('place', Place::where('place_id', '=', $id)->first());
    }

    public function addPlaceShow(){
        return view('place.addPlace');
    }

    public function addPlace(Request $request){
        $name = $request->input('name');
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        $id = Place::insertGetId([
            'name' => $name,
            'latitude' => $lat,
            'longitude' => $lng
        ]);

        return redirect('places/add')
                       ->with('success', 'เพิ่มสถานที่เรียบร้อยแล้ว');
    }

    public function editPlaceShow($id){
        $place = Place::where('place_id','=',$id)->first();
        return view('place.editPlace')->with('place',$place);
    }

    public function editPlace(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        Place::where('place_id', $id)
            ->update(['name' => $name,'latitude' => $lat,
            'longitude' => $lng]);

        return redirect('places/'.$id)
                       ->with('success', 'แก้ไขสถานที่เรียบร้อยแล้ว');
    }

    public function removePlace($id){
        Available::where("place_id",$id)->delete();
        Queue::where("place_id",$id)->delete();
        Place::where('place_id', $id)->delete();
        return redirect('places')
                       ->with('success', 'ลบสถานที่เรียบร้อยแล้ว');
    }


}
