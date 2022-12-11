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

class MofawadController extends Controller
{
    //
  
    public function __construct(){
        /*$this->middleware('auth');*/
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

        $file_tanfidiID=DB::table('file_tanfidi')->latest()->first();
        $file_tanfidi=new file_tanfidi();

        if(!empty($file_tanfidiID)){
            $file_tanfidi->Raqem=($file_tanfidiID->id)+1;
        }
        else{
            $file_tanfidi->Raqem=1;
            
        }
        $file_tanfidi->date_receive=request('date_receive');
        $file_tanfidi->ijrae_type=request('ijrae_type');
        $file_tanfidi->taleb=request('taleb');
        $file_tanfidi->matlob=request('matlob');
        $file_tanfidi->date_creation=request('date_creation');
        $file_tanfidi->resume=request('resume');
        $file_tanfidi->watika_reciev=request('date_back');
        $file_tanfidi->add_file=request('add_file');
        $file_tanfidi->note=request('note');

        $ramz = $file_tanfidi->ramz;
 
        $ramz['rakem_kad'] = request('rakem_kad');

        $ramz['ramez_kad'] = request('ramez_kad');

        $ramz['year_kad'] = request('year_kad');
        
        $file_tanfidi->ramz= $ramz;

        if(!empty(request('file'))){
            $path = $request->file('add_file')->store('files');
            }
        $file_tanfidi->save();
     

        return redirect()->route('success',[ 'msg' => " لقد تم انشاء ملفكم برقم ".$file_tanfidi->Raqem."  سيتم ارجاعمك الى الصفحة الرئيسية"]);
    } 

    public function create_tabligh(Request $request) {

        $filetablighiID=DB::table('filetablighi')->latest()->first();
        $filetablighi=new filetablighi();

        if(!empty($filetablighiID)){
            $filetablighi->Raqem=($filetablighiID->id)+1;
        }
        else{
            $filetablighi->Raqem=1;
            
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
        $filetablighi->watika=request('watika');

        if(!empty(request('watika'))){
            $path = $request->file('watika')->store('files');
        }
        $filetablighi->add_notif=request('add_notif');
        $filetablighi->note=request('note');
        
        $ramz = $filetablighi->ramz;
 
        $ramz['rakem_kad'] = request('rakem_kad');

        $ramz['ramez_kad'] = request('ramez_kad');

        $ramz['year_kad'] = request('year_kad');
        
        $filetablighi->ramz= $ramz;
        
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
          
            $check = Str::contains(request('type'), ['filetablighi', 'file_tanfidi','Ijraa']);

        if($check){

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
           else{
            return redirect('search');
           }
          }
        else{
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
        $filetablighi->watika=request('watika');

        if(!empty(request('watika'))){
            $path = $request->file('watika')->store('files');
        }
        $filetablighi->add_notif=request('add_notif');
        $filetablighi->note=request('note');
        $filetablighi->save();

        return redirect('search');
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
        $file_tanfidi->add_file=request('add_file');
        $file_tanfidi->note=request('note');

        $ramz = $file_tanfidi->ramz;
 
        $ramz['rakem_kad'] = request('rakem_kad');

        $ramz['ramez_kad'] = request('ramez_kad');

        $ramz['year_kad'] = request('year_kad');
        
        $file_tanfidi->ramz= $ramz;

        if(!empty(request('file'))){
            $path = $request->file('add_file')->store('files');
            }
        $file_tanfidi->save();

        return redirect('search');
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
        $Ijraa->watika_up=request('file');
        if(!empty(request('file'))){
        $path = $request->file('file')->store('files');
        }
        $Ijraa->note=request('note');
        $Ijraa->save();

        return redirect('search');
    
      } 

    public function compute_search()
    {

       
    }
    
}
