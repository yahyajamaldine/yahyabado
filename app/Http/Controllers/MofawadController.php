<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\file_tanfidi;

use App\Models\fileTFnB;

use App\Models\filetablighi;

use App\Models\fileTBnB;

use App\Models\Ijraa;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Collection;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class MofawadController extends Controller
{
    //
  
    public function __construct(){
        $this->middleware('auth');
      }

    public function index() {
        return view('/');
       }

    public function mofawad() {
        return view('pizza.index',['pizza' => $pizza]);
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
        ->where('Raqem', '=', request('findmilaf'))
        ->orWhere('taleb','like' ,'%'.request('findmilaf').'%')
        ->orWhere('matlob','like' ,'%'.request('findmilaf').'%')
        ->get();

        $tablexist=true;
        $tabletype=request('wantedkind');
        if(DB::table(request('wantedkind'))
        ->where('Raqem', '=', request('findmilaf'))
        ->orWhere('taleb','like' ,'%'.request('findmilaf').'%')
        ->orWhere('matlob','like' ,'%'.request('findmilaf').'%')
        ->exists()){

         
        if( $tabletype == 'file_tanfidi'){

            $tablighramz=DB::table('fileTFnB')
            ->whereExists(function ($query) {
                $query->select('*')
                      ->from('file_tanfidi')
                      ->whereColumn('file_tanfidi.id', 'fileTFnB.file_tanfidi_id');
            })->get();

            return view('search',['watika' => $file, 'tablexist' => $tablexist, 'tabletype' =>  $tabletype, 'tablighramz' => $tablighramz]);
         }

         elseif( $tabletype == 'filetablighi'){

            $tablighramz=DB::table('fileTBnB')
            ->whereExists(function ($query) {
                $query->select('*')
                      ->from('filetablighi')
                      ->whereColumn('filetablighi.id', 'fileTBnB.filetablighi_id');
            })->get();

            $tablighramz=DB::table('fileTBnB')
            ->whereExists(function ($query) {
                $query->select('*')
                      ->from('filetablighi')
                      ->whereColumn('filetablighi.id', 'fileTBnB.filetablighi_id');
            })->get();

            return view('search',['watika' => $file, 'tablexist' => $tablexist, 'tabletype' =>  $tabletype, 'tablighramz' => $tablighramz]);
         }

        return view('search',['watika' => $file, 'tablexist' => $tablexist, 'tabletype' =>  $tabletype]);
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
        $file_tanfidi=DB::table('file_tanfidi')->latest()->first();
        $id=1;

        if(!empty($file_tanfidi)){
            $id=($file_tanfidi->id)+1;
        }
        return view('tanfid', ['id' => $id]);
    } 
      /********
       * method to create a new tanifi file
       * this method will be connected to the database
       * 
       */
    public function create_tanfid(Request $request) {
    
        $file_tanfidi=new file_tanfidi();
        $file_tanfidi->Raqem=request('Raqem');
        $file_tanfidi->date_receive=request('date_receive');
        $file_tanfidi->ijrae_type=request('ijrae_type');
        $file_tanfidi->taleb=request('taleb');
        $file_tanfidi->matlob=request('matlob');
        $file_tanfidi->date_creation=request('date_creation');
        $file_tanfidi->resume=request('resume');
        $file_tanfidi->watika_reciev=request('date_back');
        $file_tanfidi->add_file=request('add_file');
        $file_tanfidi->note=request('note');
        if(!empty(request('file'))){
            $path = $request->file('add_file')->store('files');
            }
        $file_tanfidi->save();
          /****Since we have a value that's combined we are going to create a table for it */
          $fileTFnB=new fileTFnB();
          $fileTFnB->rakem_kad=request('rakem_kad');
          $fileTFnB->ramez_kad=request('ramez_kad');
          $fileTFnB->year_kad=request('year_kad');
          $fileTFnB->file_tanfidi_id=$file_tanfidi->id;
          $fileTFnB->save();

        return redirect()->route('success',[ 'msg' => " لقد تم انشاء ملفكم برقم ".$file_tanfidi->Raqem."  سيتم ارجاعمك الى الصفحة الرئيسية"]);
    } 

    public function create_tabligh(Request $request) {
    
        $filetablighi=new filetablighi();
        $filetablighi->Raqem=request('raqem');
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
        $filetablighi->watika=request('watika');

        if(!empty(request('watika'))){
            $path = $request->file('watika')->store('files');
        }
        $filetablighi->add_notif=request('add_notif');
        $filetablighi->note=request('note');
        $filetablighi->save();
     
        /****Since we have a value that's combined we are going to create a table for it */
        $fileTBnB=new fileTBnB();
        $fileTBnB->rakem_kad=request('rakem_kad');
        $fileTBnB->ramez_kad=request('ramez_kad');
        $fileTBnB->year_kad=request('year_kad');
        $fileTBnB->filetablighi_id=$filetablighi->id;
        $fileTBnB->save();

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

        $Ijraa=new Ijraa();
        $Ijraa->Raqem=request('Raqem');
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
        if(!empty(request('type')) && !empty(request('id'))){

            $table=DB::table(request('type'))->find(request('id'));
            
          if(request('type')=='filetablighi'){
            $tablighramz=DB::table('fileTBnB')
            ->whereExists(function ($query) {
                $query->select('*')
                      ->from('filetablighi')
                      ->whereColumn('filetablighi.id','fileTBnB.filetablighi_id');
            })->get();
                
               return view('tablighmo',[ "table" =>$table , "tablighramz" => $tablighramz ]);
          }
       
        }
    }

    public function moditabligh(Request $request){
       
        $filetablighi=filetablighi::find(request('id'));

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
        $filetablighi->watika=request('watika');

        if(!empty(request('watika'))){
            $path = $request->file('watika')->store('files');
        }
        $filetablighi->add_notif=request('add_notif');
        $filetablighi->note=request('note');
        $filetablighi->save();

        $fileTBnB=fileTBnB::where('filetablighi_id', $filetablighi->id)->first();
        $fileTBnB->rakem_kad=request('rakem_kad');
        $fileTBnB->ramez_kad=request('ramez_kad');
        $fileTBnB->year_kad=request('year_kad');
        $fileTBnB->save();

        return redirect('search');
    }

    public function compute_search()
    {

       
    }
    
}
