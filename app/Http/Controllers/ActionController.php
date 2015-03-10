<?php namespace App\Http\Controllers;
use App\Action;
use App\Requirement;
use App\Document;
use App\Category;
use App\Transaction;
use App\Available;
use App\Queue;
use Illuminate\Http\Request;

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
        $old = Requirement::join('action', 'requirement.action_id', '=', 'action.action_id')
            ->join('document', 'requirement.document_id', '=', 'document.document_id')
            ->where('requirement.action_id','=',$id)
            ->select('document.name','document.document_id')
            ->get();
        return view('action.detail')
        ->with('action', Action::where('action_id','=',$id)->first())
        ->with('olds',$old);
    }

    public function addActionShow(){
        return view('action.addAction')->with('documents',Document::all());
    }

    public function addAction(Request $request){
        $arrays = $request->input('my-select');
        $name = $request->input('name');
        $category = $request->input('category');
        $description = $request->input('description');
        $temp = Category::where('name','=',$category)->first();
        if(is_null($temp)){
            $category_id = Category::insertGetId( ['name' => $category] );
            $gen = "INSERT INTO Category(id, name) VALUES('$category_id', '$category');";
            Transaction::insert(['type' => 'S', 'content' => $gen]);
        }else{
            $category_id = $temp->id;   
        }

        $id = Action::insertGetId(
            ['name' => $name,'description' => $description,'category_id'=>$category_id]
        );
        $gen = "INSERT INTO Action(id, name, description, category_id) VALUES('$id', '$name', '$description', '$category_id');";
        Transaction::insert(['type' => 'S', 'content' => $gen]);

        if(!is_null($arrays)){
            foreach($arrays as $element){
                Requirement::insert(
                    ['document_id' => $element,'action_id' => $id]
                );
                $gen = "INSERT INTO Requirement(action_id, document_id, is_optional) VALUES('$id', '$element', '0');";
                Transaction::insert(['type' => 'S', 'content' => $gen]);
            }
        }
        return redirect('actions/add')
                       ->with('success', 'เพิ่มบริการเรียบร้อยแล้ว');
    }

    public function editActionShow($id){
        $action = Action::where('action_id','=',$id)->first();
        return view('action.editAction')
                        ->with('action',$action)
                        ->with('documents',Document::all());
    }

    public function editAction(Request $request){
        $arrays = $request->input('my-select');
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        Action::where('action_id', $id)
            ->update(['name' => $name,'description' => $description]);
        if(!is_null($arrays)){
            Requirement::where('action_id','=',$id)->delete();
            foreach($arrays as $element){
                Requirement::insert(
                    ['document_id' => $element,'action_id' => $id]
                );
            }
        }    
        return redirect('actions/'.$id)
                       ->with('success', 'แก้ไขบริการเรียบร้อยแล้ว');
    }

    public function removeAction($id){
        Requirement::where("action_id",$id)->delete();
        Available::where("action_id",$id)->delete();
        Queue::where("action_id",$id)->delete();
        Action::where('action_id', $id)->delete();
        return redirect('actions')
                       ->with('success', 'ลบบริการเรียบร้อยแล้ว');
    }

    public function getCategory(Request $request){
        $term      = $request->input('term');
        $associate = array();
        $search    = Category::where('name', 'LIKE', '%'.$term.'%')->take(10)->get();
        foreach ($search as $result) {
            $associate[] = $result->name;
        }
        return response($associate);
    }

}