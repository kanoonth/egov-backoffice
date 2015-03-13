<?php namespace App\Http\Controllers;
use App\Action;
use App\Requirement;
use App\Document;
use App\Transaction;
use App\Queue;
use Illuminate\Http\Request;

class DocumentController extends Controller {


    public $restful = true;
    protected $rules = [
        'name' => ['required', 'min:3'],
        'file' => ['image']
    ];
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
        return view('document.index')
        ->with('documents', Document::orderBy('name')->get());
    }

    public function detail($id){
        return view('document.detail')
        ->with('document', Document::where('document_id','=',$id)->first());
    }

    public function addDocumentShow(){
        return view('document.addDocument');
    }

    public function addDocument(Request $request){
        $this->validate($request, $this->rules);
        $name = $request->input('name');
        $description = $request->input('description');
        $id = Document::insertGetId(
            ['name' => $name,'description' => $description]
        );
        $filename = "";
        $file = $request->file('file');
        if(!is_null($file)){
            $extension =$file->getClientOriginalExtension();
            $filename = $id.'_'.str_random(12).'.'.$extension;
            $destinationPath = public_path().'/images/upload';
            $path = '/images/upload/'.$filename;
            $file->move($destinationPath,$filename);
            Document::where('document_id', $id)
                ->update(['photo_path' => $path]);
        }
        // TODO: Check the validity of this code, by mapfap
        $gen = "INSERT INTO Document(id, name, description, photo_path) VALUES('$id', '$name', '$description', '$filename');";
        Transaction::insert(['type' => 'S', 'content' => $gen]);
        if(!is_null($filename)){
            $gen = $filename;
            Transaction::insert(['type' => 'F', 'content' => $gen]);
        }

        return redirect('documents/add')
                       ->with('success', 'เพิ่มเอกสารเรียบร้อยแล้ว');
    }

    public function editDocumentShow($id){
        $document = Document::where('document_id','=',$id)->first();
        return view('document.editDocument')
                        ->with('document',$document);
    }

    public function editDocument(Request $request){
        $this->validate($request, $this->rules);
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        Document::where('document_id', $id)
             ->update(['name' => $name,'description' => $description]);

        $file = $request->file('file');
        if(!is_null($file)){
            $extension =$file->getClientOriginalExtension();
            $filename = $id.'_'.str_random(12).'.'.$extension;
            $destinationPath = public_path().'/images/upload';
            $path = '/images/upload/'.$filename;
            $file->move($destinationPath,$filename);
            Document::where('document_id', $id)
                ->update(['photo_path' => $path]);
        }
        $gen = "UPDATE Document SET id='$id', name='$name', description='$description', photo_path='$filename' WHERE id='$id';";
        Transaction::insert(['type' => 'S', 'content' => $gen]);
        if(!is_null($filename)){
            $gen = $filename;
            Transaction::insert(['type' => 'F', 'content' => $gen]);
        }
        return redirect('documents/'.$id)
                        ->with('success', 'แก้ไขเอกสารเรียบร้อยแล้ว');
    }

    public function removeDocument($id){
        $gen = "DELETE FROM Document WHERE id='$id';";
        Transaction::insert(['type' => 'S', 'content' => $gen]);
        Requirement::where("document_id",$id)->delete();
        Document::where('document_id', $id)->delete();
        return redirect('documents')
                       ->with('success', 'ลบเอกสารเรียบร้อยแล้ว');
    }

}