<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\file_tanfidi;

use App\Models\filetablighi;

use App\Models\Ijraa;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Collection;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response;

use Symfony\Component\HttpFoundation\BinaryFileResponse;


class MofawadController extends Controller
{
    //
  
    public function __construct(){
        $this->middleware('auth');
      }

      public function index()
      {
        return view('search');
      }

    
    public function tabligh() {
        $filetablighi=DB::table('filetablighi')->latest()->first();
        $id=1;
        if(!empty($filetablighi)){
            $id=($filetablighi->id)+1;
        }
        return view('tabligh', ['id' => $id]);
    } 

    public function search(Request $request) {

        if(!empty(request('wantedkind'))){

        $file = DB::table(request('wantedkind'))
        ->where('id', '=', request('findmilaf'))
        ->orWhere('taleb','like' ,'%'.request('findmilaf').'%')
        ->orWhere('matlob','like' ,'%'.request('findmilaf').'%')
        ->get();

               
        $tablexist=true;
        $tabletype=request('wantedkind');
        if(DB::table(request('wantedkind'))
        ->where('id', '=', request('findmilaf'))
        ->orWhere('taleb','like' ,'%'.request('findmilaf').'%')
        ->orWhere('matlob','like' ,'%'.request('findmilaf').'%')
        ->exists()){
              
              
        return view('search',['watika' => $file ,'tablexist' => $tablexist, 'tabletype' =>  $tabletype]);
        }


        else{
            return view('search',['notfound' => 'لايوجد اي ملف بالمعلومات التي تم إدخالها', 'tablexist' => $tablexist, 'tabletype' =>  $tabletype]);  
        }
        }

        else{
           return view('search');
        }
    } 

    public function success() {
         if (empty(request('msg'))){
        return redirect('/');
         }
        return view('success',['msg' => request('msg') ]);
    } 

    public function tanfid() {

        /*$file_tanfidi= DB::table('file_tanfidi')->latest()->first();
        $id=1;

        if(!empty($file_tanfidi)){
            $id=($file_tanfidi->id)+1;
        }*/
        return view('tanfid');
    } 
      /********
       * method to create a new tanifi file
       * this method will be connected to the database
       * 
       */
    public function create_tanfid(Request $request) {
        
        if(empty(request('selectedYear'))){
            $todayYear=date("Y");
        }
        else{
            $todayYear=request('selectedYear');
        }

        $lastIdOfYear = file_tanfidi::whereYear('date_receive', $todayYear)->max('id');

        // Set the document ID property
        $NewdocumentId = $lastIdOfYear ? $lastIdOfYear + 1 : 1;
        $file_tanfidi=new file_tanfidi();

        if(!empty($NewdocumentId)){
            $file_tanfidi->Raqem=$NewdocumentId;
            $file_tanfidi->id= $NewdocumentId;
        }
        else{
            $file_tanfidi->Raqem=1;
            $file_tanfidi->id=1;
            
        }
        $file_tanfidi->date_receive=request('date_receive');
        $file_tanfidi->ijrae_type=request('ijrae_type');
        $file_tanfidi->taleb=request('taleb');
        $file_tanfidi->matlob=request('matlob');
        $file_tanfidi->date_creation=request('date_creation');
        $file_tanfidi->resume=request('resume');
        $file_tanfidi->watika_reciev=request('date_back');
        $file_tanfidi->note=request('note');

        $ramz = $file_tanfidi->ramz;
 
        $ramz['rakem_kad'] = request('rakem_kad');

        $ramz['ramez_kad'] = request('ramez_kad');

        $ramz['year_kad'] = request('year_kad');
        
        $file_tanfidi->ramz= $ramz;

        $Flist = $file_tanfidi->Flist;

 
  
         if(!empty(request('fileN'))){
            $time = Carbon::now();
            for($i=1; $i<request('fileN')+1;$i++){
                if(!empty(request("add_file-{$i}"))){
                    $file = request("add_file-{$i}");
                    $fileName = $file->getClientOriginalName();
                    //saving the file path and name, to do that we need a table to do soo
                    $Flist["file{$i}"] = ["{$time->year}/tanfidi/tanfid-{$file_tanfidi->Raqem}",$fileName];
                $path = $request->file("add_file-{$i}")->storeAs(
                    "public/{$time->year}/tanfidi/tanfid-{$file_tanfidi->Raqem}",$fileName
                );}
         }
         $file_tanfidi->Flist= $Flist;
        } 

        $file_tanfidi->save();
     

        return redirect()->route('success',[ 'msg' => " لقد تم انشاء ملفكم برقم ".$file_tanfidi->Raqem."  سيتم ارجاعمك الى الصفحة الرئيسية"]);
            

    }

    public function create_tabligh(Request $request) {

        $filetablighiID=DB::table('filetablighi')->latest()->first();
        $filetablighi=new filetablighi();

        if(!empty($filetablighiID)){
            $filetablighi->Raqem=($filetablighiID->id)+1;
            $filetablighi->id=($filetablighiID->id)+1;
        }
        else{
            $filetablighi->Raqem=1;
            $filetablighi->id=1;
            
        }
        $filetablighi->kad_type=request('kad_type');
        $filetablighi->jalsa_date=request('jalsa_date');
        $filetablighi->source=request('source');
        $filetablighi->its_source=request('its_source');
        $filetablighi->exits_source=request('exits_source');
        $filetablighi->rakmoha_rakem=request('rakmoha_rakem');
        $filetablighi->kadiya_type=request('kadiya_type');
        $filetablighi->date_receive=request('date_receive');
        $filetablighi->taleb=request('taleb_lijra');
        $filetablighi->matlob=request('naib');
        $filetablighi->date_ijraa=request('date_ijraa');
        $filetablighi->watika_reciev=request('date_back');
       
        $filetablighi->add_notif=request('add_notif');
        $filetablighi->note=request('note');
        
        $ramz = $filetablighi->ramz;
 
        $ramz['rakem_kad'] = request('rakem_kad');

        $ramz['ramez_kad'] = request('ramez_kad');

        $ramz['year_kad'] = request('year_kad');
        
        $filetablighi->ramz= $ramz;
        
        $Flist = $filetablighi->Flist;
  
         if(!empty(request('fileN'))){
            $time = Carbon::now();
            for($i=1; $i<request('fileN')+1;$i++){
                if(!empty(request("add_file-{$i}"))){
                    $file = request("add_file-{$i}");
                    $fileName = $file->getClientOriginalName();
                    //saving the file path and name, to do that we need a table to do soo
                    $Flist["file{$i}"] = ["{$time->year}/tablighi/tabligh-{$filetablighi->Raqem}",$fileName];
                $path = $request->file("add_file-{$i}")->storeAs(
                    "public/{$time->year}/tablighi/tabligh-{$filetablighi->Raqem}",$fileName
                );}
         }
         $filetablighi->Flist= $Flist;
        } 
        
        $filetablighi->save();

        return redirect()->route('success',[ 'msg' => " لقد تم انشاء ملفكم برقم ".$filetablighi->Raqem."  سيتم ارجاعمك الى الصفحة الرئيسية"]);
    } 

    public function ijraa(){

        $ijraa=DB::table('Ijraa')->latest()->first();
        $id=1;

        if(!empty($ijraa)){
            $id=($ijraa->id)+1;
        }
       
        return view('ijraa',['id' => $id]);

    }

    public function create_ijraa(Request $request){
        
        $IjraaID=DB::table('Ijraa')->latest()->first();
        $Ijraa=new Ijraa();

        if(!empty($IjraaID)){
            $Ijraa->Raqem=($IjraaID->id)+1;
            $Ijraa->id=($IjraaID->id)+1;
        }
        else{
            $Ijraa->Raqem=1;
            $Ijraa->id=1;
            
        }
        $Ijraa->ijraa_type=request('ijraa_type');
        $Ijraa->date_receive=request('date_receive');
        $Ijraa->taleb=request('taleb');
        $Ijraa->matlob=request('matlob');
        $Ijraa->creat_date=request('date_creation');
        $Ijraa->ijraa_rs=request('resume');
        $Ijraa->watika_reciev=request('watika_r');
        $Ijraa->watika_up=request('file');
        if(!empty(request('file'))){
        $path = $request->file('file')->store('files');
        }
        $Ijraa->note=request('note');

        $Flist =  $Ijraa->Flist;
  
        if(!empty(request('fileN'))){
           $time = Carbon::now();
           for($i=1; $i<request('fileN')+1;$i++){
               if(!empty(request("add_file-{$i}"))){
                   $file = request("add_file-{$i}");
                   $fileName = $file->getClientOriginalName();
                   //saving the file path and name, to do that we need a table to do soo
                   $Flist["file{$i}"] = ["{$time->year}/ijraa/ijraa-{ $Ijraa->Raqem}",$fileName];
               $path = $request->file("add_file-{$i}")->storeAs(
                   "public/{$time->year}/ijraa/ijraa-{$Ijraa->Raqem}",$fileName
               );}
        }
        $Ijraa->Flist= $Flist;
       } 
        $Ijraa->save();

        return redirect()->route('success',[ 'msg' => " لقد تم انشاء اجراء مباشر برقم ". $Ijraa->Raqem."  سيتم ارجاعمك الى الصفحة الرئيسية"]);

    }

    public function compute()
    {
        if(!empty(request('file_type'))){
            $files = DB::table(request('file_type'))
            ->whereBetween('date_receive', [request('start_date'), request('end_date')])
            ->get();

            $tablexist=true;
            $tabletype=request('file_type');
            $time = Carbon::now();
            $collection = collect([]);

            foreach ($files as $file) {
                $timeoffile= Carbon::createFromFormat('Y-m-d', $file->date_receive);
                $count_days = $timeoffile->diffInDays($time);
         
                if(!empty($file->watika_reciev)){
                $collection->push('valid');
                }
                elseif( $count_days>30 && empty($file->watika_reciev)){
                $collection->push('not-valid');
                }
                else{
                    $collection->push('');
                }

            }

            

            if(DB::table(request('file_type'))
            ->whereBetween('date_receive', [request('start_date'), request('end_date')])
            ->exists()){
            return view('compute',['tanfidi' => $files, 'tablexist' => $tablexist, 'tabletype' =>  $tabletype, 'coll' =>  $collection]);
            }

            else{
                return view('compute',['notfound' => 'لاتوجد اي وثيقة في الفترة التي قمتم بادخالها', 'tablexist' => $tablexist, 'tabletype' =>  $tabletype]);  
            }

            }
            else{
               return view('compute');
            }
    }


    public function modification(Request $reques) {

           try {
    
            $table=DB::table(request('type'))->find(request('id'));

            if(request('type')=='filetablighi'){
               $ramz = json_decode($table->ramz);
               return view('tablighmo',[ "table" =>$table, 'ramz' => $ramz ]);
            }

            if(request('type')=='file_tanfidi'){
            $ramz = json_decode($table->ramz);
            return view('tanfidmo',[ "table" =>$table, 'ramz' => $ramz ]);
             }
            if(request('type')=='Ijraa'){
            return view('ijraamo',[ "table" =>$table ]);
             } 

           }

           catch (\Exception $e) {

            return redirect('search');
    
            }

          }

    public function moditabligh(Request $request){
       
        $filetablighi=filetablighi::find(request('id'));
        $ramz = $filetablighi->ramz;
        $ramz['rakem_kad'] = request('rakem_kad');
        $ramz['ramez_kad'] = request('ramez_kad');
        $ramz['year_kad'] = request('year_kad');
        $filetablighi->ramz= $ramz;
        $filetablighi->kad_type=request('kad_type');
        $filetablighi->jalsa_date=request('jalsa_date');
        $filetablighi->source=request('source');
        $filetablighi->its_source=request('its_source');
        $filetablighi->exits_source=request('exits_source');
        $filetablighi->rakmoha_rakem=request('rakmoha_rakem');
        $filetablighi->kadiya_type=request('kadiya_type');
        $filetablighi->date_receive=request('date_receive');
        $filetablighi->taleb=request('taleb_lijra');
        $filetablighi->matlob=request('naib');
        $filetablighi->date_ijraa=request('date_ijraa');
        $filetablighi->watika_reciev=request('date_back');
       
        $Flist = $filetablighi->Flist;

        
        $length = request('length');

        if(!empty(request('fileN'))){
            $time = Carbon::now();
            for($i=1; $i<request('fileN')+1;$i++){
                $lastelem=$length + $i;
                if(!empty(request("add_file-{$lastelem}"))){
                    $file = request("add_file-{$lastelem}");
                    $fileName = $file->getClientOriginalName();
                    //saving the file path and name, to do that we need a table to do soo
                    $Flist["file{$lastelem}"] = ["{$time->year}/tablighi/tabligh-{$filetablighi->Raqem}",$fileName];
                $path = $request->file("add_file-{$lastelem}")->storeAs(
                    "public/{$time->year}/tablighi/tabligh-{$filetablighi->Raqem}",$fileName
                );}
         }
         $filetablighi->Flist= $Flist;
        }

        $filetablighi->note=request('note');
        $filetablighi->save();
        
        return redirect()->route('search', ['findmilaf' => request('id'), 'wantedkind' => 'filetablighi'])->with('status','لفد تم تعديل الملف الخاص بكم');
    }

    
    public function moditanfid(Request $request){
       
        $file_tanfidi=file_tanfidi::find(request('id'));
        $file_tanfidi->date_receive=request('date_receive');
        $file_tanfidi->ijrae_type=request('ijrae_type');
        $file_tanfidi->taleb=request('taleb');
        $file_tanfidi->matlob=request('matlob');
        $file_tanfidi->date_creation=request('date_creation');
        $file_tanfidi->resume=request('resume');
        $file_tanfidi->watika_reciev=request('date_back');
        $file_tanfidi->note=request('note');

        $ramz = $file_tanfidi->ramz;
 
        $ramz['rakem_kad'] = request('rakem_kad');

        $ramz['ramez_kad'] = request('ramez_kad');

        $ramz['year_kad'] = request('year_kad');
        
        $file_tanfidi->ramz= $ramz;
        
        $Flist = $file_tanfidi->Flist;

        
        $length = request('length');

        if(!empty(request('fileN'))){
            $time = Carbon::now();
            for($i=1; $i<request('fileN')+1;$i++){
                $lastelem=$length + $i;
                if(!empty(request("add_file-{$lastelem}"))){
                    $file = request("add_file-{$lastelem}");
                    $fileName = $file->getClientOriginalName();
                    //saving the file path and name, to do that we need a table to do soo
                    $Flist["file{$lastelem}"] = ["{$time->year}/tanfidi/tanfid-{$file_tanfidi->Raqem}",$fileName];
                $path = $request->file("add_file-{$lastelem}")->storeAs(
                    "public/{$time->year}/tanfidi/tanfid-{$file_tanfidi->Raqem}",$fileName
                );}
         }
         $file_tanfidi->Flist= $Flist;
        }

        $file_tanfidi->save();

        return redirect()->route('search', ['findmilaf' => request('id'), 'wantedkind' => 'file_tanfidi'])->with('status','لفد تم تعديل الملف الخاص بكم');

    }

      public function modiijraa(Request $request){

        $Ijraa=Ijraa::find(request('id'));
        $Ijraa->ijraa_type=request('ijraa_type');
        $Ijraa->date_receive=request('date_receive');
        $Ijraa->taleb=request('taleb');
        $Ijraa->matlob=request('matlob');
        $Ijraa->creat_date=request('date_creation');
        $Ijraa->ijraa_rs=request('resume');
        $Ijraa->watika_reciev=request('watika_r');

        $Ijraa->note=request('note');
        
        $Flist =  $Ijraa->Flist;

        $length = request('length');

        if(!empty(request('fileN'))){
            $time = Carbon::now();
            for($i=1; $i<request('fileN')+1;$i++){
                $lastelem=$length + $i;
                if(!empty(request("add_file-{$lastelem}"))){
                    $file = request("add_file-{$lastelem}");
                    $fileName = $file->getClientOriginalName();
                    //saving the file path and name, to do that we need a table to do soo
                    $Flist["file{$lastelem}"] = ["{$time->year}/ijraa/ijraa-{ $Ijraa->Raqem}",$fileName];
                $path = $request->file("add_file-{$lastelem}")->storeAs(
                    "public/{$time->year}/ijraa/ijraa-{ $Ijraa->Raqem}",$fileName
                );}
         }
         $Ijraa->Flist= $Flist;
        }
        $Ijraa->save();

        return redirect()->route('search', ['findmilaf' => request('id'), 'wantedkind' => 'Ijraa'])->with('status','لفد تم تعديل الملف الخاص بكم');
  
    
      } 

      public function delete ($id){
        DB::table(request('type'))->where('id', '=',request('id'))->delete();

        return redirect('/search')->with('status','لفد تم حدف الملف ');
      }

      public function xls(Request $request)
      {   
        
            try {
    
                $table=DB::table($request->type)->find($request->id);
    
                if($request->type=='filetablighi'){
                   $ramz = json_decode($table->ramz);
                   return response()->json([
                    'table' =>   $table,
                    'ramz' =>  $ramz
                ]);
                }
    
                if($request->type=='file_tanfidi'){
                    $ramz = json_decode($table->ramz);
                   return response()->json([
                    'table' => $table,
                    'ramz' =>  $ramz
                ]);
                 }

                if($request->type=='Ijraa'){
                    return response()->json([
                     'table' =>  $table,
                 ]);
                 } 
    
               }
    
               catch (\Exception $e) {
    
                return redirect('compute');
        
                }
         
      }

      public function docs(Request $request){
   

        $file_path = storage_path("app/public/".$request->path);

        if (!file_exists($file_path)) {
            return response()->json([
                'success' => false,
                'message' => 'File not found'
            ], 404);
        }
    
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => 'attachment; filename="'.rawurlencode(basename($file_path)).'"',
            'Content-Length' => filesize($file_path),
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
            'Last-Modified' => gmdate('D, d M Y H:i:s T', filemtime($file_path)),
            'Etag' => md5_file($file_path),
        ];
    
        return new BinaryFileResponse($file_path, 200, $headers);
    }

    public function mofawad(Request $request)
    {
        

             $table=DB::table('file_tanfidi')->find(request('id'));

             $ramz = json_decode($table->ramz);

             $id = $table->id;

            return view('mofawad',[ "id" => $id, "ramz" => $ramz ]);
        
     }
    
}
