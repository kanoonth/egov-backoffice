<?php namespace App\Http\Controllers;
use App\Action;
use App\Requirement;
use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller {


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
        $name = $request->input('name');
        $description = $request->input('description');
        $id = Document::insertGetId(
            ['name' => $name,'description' => $description]
        );
        $file = $request->file('file');
        $extension =$file->getClientOriginalExtension();
        $filename = $id.'_'.str_random(12).'.'.$extension;
        $destinationPath = public_path().'/images/upload';
        $path = '/images/upload/'.$filename;
        $file->move($destinationPath,$filename);
        Document::where('document_id', $id)
            ->update(['photo_path' => $path]);
        return redirect('documents/add')
                       ->with('success', 'เพิ่มเอกสารเรียบร้อยแล้ว');
    }

    public function editDocumentShow($id){
        $document = Document::where('document_id','=',$id)->first();
        return view('document.editDocument')
                        ->with('document',$document);
    }

    public function editDocument(Request $request){
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
        return redirect('documents/'.$id)
                        ->with('success', 'แก้ไขเอกสารเรียบร้อยแล้ว');
    }

    public function removeDocument($id){
        Document::where('document_id', $id)->delete();
        return redirect('documents')
                       ->with('success', 'ลบเอกสารเรียบร้อยแล้ว');
    }

}