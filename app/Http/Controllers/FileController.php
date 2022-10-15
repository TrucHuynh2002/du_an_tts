<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Response;
use ZipArchive;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = "Download file nhóm trưởng";
        $data = File::all();
        return view('nhom.download_nt', compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'upload' => 'required|mimes:doc,docx',

        ],[
            'upload.required' => 'Chưa chọn file',
            'upload.mimes' => 'File khong dung dinh dang'
            
        ]);
        $t = new File;
        $get_image = $request->file('upload');
        if ($get_image) {
            $path = 'upload/file';  //duong dan den file
            $name_image = $get_image->getClientOriginalName(); //lay ten file
            // dd($get_name_image);
            $find_file = File::where('ten_file','=',$name_image)->first();
        
            if($find_file){
                    $name_image  = current(explode('.',$name_image)); //tach mang sau dau .
                   $name_image = $name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension(); //
            }
           
            // $new_image = $name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension(); //
            $get_image->move($path,$name_image);
            $t->ten_file = $name_image;
        }
        $t->save();
            // return redirect(route('dotthuctap.index'))->with(['success' => 'Thêm thành công !']);
            return redirect()->back()->with(['success' => 'Upload thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $file= File::find($id);
        // dd($file);
        //xoa file anh trong public
        // $get_name_file = DB::table('file')->select('ten_file')->where('id','=',$request->id)->first();
        if($file){
            if($file->ten_file != '' && file_exists(public_path('upload/file/'.($file->ten_file)))){
                unlink(public_path('upload/file/'.($file->ten_file)));
            };
        $file->delete();
             return redirect()->back()->with(['success' => 'Xóa thành công !']);
        }   
         return redirect()->back()->with(['errors' => 'Xóa thất bại !']);
       
    }
    public function getDownload($id){
        //PDF file is stored under project/public/download/info.pdf
        $file= File::find($id);
        $link=public_path('upload/file/'.($file->ten_file));
        return Response::download($link);
    }
    public function downloadAll(Request $request){


        // GOI FILE ZIP

        // $zip = new ZipArchive;
        // $fileName = 'file.zip';
        // if($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE){
        //     $files = FacadesFile::files(public_path('upload/file'));
        //     foreach($request->fileDownload as $files){
        //         $relativeZip = basename($files);
        //         // $file= File::find($files);
        //         // $link=public_path('upload/file/'.($file->ten_file));
        //         $zip->addFile($files,$relativeZip);
                
        //     }
        //     $zip->close();
        // };

        // return response()->download(public_path($fileName));
        
    }
}
