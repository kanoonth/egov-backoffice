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
        $old = Document::leftJoin('requirement', 'document.action_id', '=', 'requirement.action_id')
            ->where('document.action_id','=',$id)->get();
        return view('action.detail')
        ->with('action', Action::where('action_id','=',$id)->first())
        ->with('olds',$old);
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
                       ->with('success', 'เพิ่มบริการเรียบร้อยแล้ว');
    }

    public function editActionShow($id){
        $action = Action::where('action_id','=',$id)->first();
        return view('action.editAction')
                        ->with('action',$action)
                        ->with('documents',Document::all());
    }

    public function editAction(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        Action::where('action_id', $id)
            ->update(['name' => $name,'description' => $description]);
        return redirect('actions/'.$id)
                       ->with('success', 'แก้ไขบริการเรียบร้อยแล้ว');
    }

    public function removeAction($id){
        Action::where('action_id', $id)->delete();
        return redirect('actions')
                       ->with('success', 'ลบบริการเรียบร้อยแล้ว');
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
