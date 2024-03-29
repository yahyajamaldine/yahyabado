@extends('layout.app')
<script type="text/javascript">
 onload=()=>{
  const mainpage= document.getElementById('mainpage');
  const fNumber=document.getElementById('fNumber');
  const FilesUp= document.getElementsByClassName('filElM');
  const secondprt=document.getElementById('co-button');

mainpage.addEventListener('click',()=>{
  window.location.href='/search';
})

secondprt.addEventListener('click',function(e){
  e.preventDefault();
  window.location.href='{{ route('mofawad',[ 'id' =>  $table->Raqem ] ) }}';
})



fNumber.addEventListener('change',function(param){

for(let i=0;i<(this.value);i++){
 /* Showing wanted number of upload foreme*/
   FilesUp[i].classList.remove('hidden')
   FilesUp[i].setAttribute('required','');

  }

   for(let i=(this.value);i<(FilesUp.length);i++){
 /* hidding none wanted files*/
   FilesUp[i].classList.add('hidden');
   FilesUp[i].removeAttribute('required');
   }

})
 }
</script>
<style type="text/css">
div.form_wrapper {
  width: 55%;
}
#logoutsvg{
   float: right;
   fill:black
}
#filelinks a{
   text-decoration: underline;
   font-weight: bolder;
   color:#3e6b8e;
   margin-right: 215px;
}
.form_wrapper .hidden{
  display: none !important;
}

#bts{
  display:flex;
  justify-content:space-between;
  padding-right: 22%;
  width:100%;
  margin:0;
}

#bts .button-wrap {
  width:max-content;
}

.sb-button:first-of-type{
  float:right;
}
/*.sb-button:last-of-type{
  margin-right:90px;
}*/


#co-button{
  background: #6f6f6d;
}
</style>
@section('content')

<body>
<div class="firstem">
     <header id="headapp">
      <ul>
        <li id="mainpage">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          width="30px" height="30px" viewBox="0 0 495.398 495.398" style="enable-background:new 0 0 495.398 495.398;"
          xml:space="preserve"><g><g><g><path d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391
               v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158
               c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747
               c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z"/>
             <path d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401
               c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79
               c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z"/>
           </g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g>
       </g><g></g><g></g></svg>
       <span>          الصفحة الرئيسية
      </span>
        </li>
        <li>
        <a href="{{ route('search') }}">
           من نحن ؟
</a> </li>
        <li>
        <a href="{{ route('search') }}">

          نظرة عامة
          </a></li>
          <li >
          <a href="{{ route('compute') }}">
          الإحصاء
          </a></li>
         <li>
         <a href="{{ route('ijraa') }}">
         إجراء مباشر
         </a></li>
         <li id="logoutli"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
         <svg id="logoutsvg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 490.3 490.3" width="30px" height="30px" style="enable-background:new 0 0 490.3 490.3;" xml:space="preserve">
<g>
	<g>
		<path d="M0,121.05v248.2c0,34.2,27.9,62.1,62.1,62.1h200.6c34.2,0,62.1-27.9,62.1-62.1v-40.2c0-6.8-5.5-12.3-12.3-12.3
			s-12.3,5.5-12.3,12.3v40.2c0,20.7-16.9,37.6-37.6,37.6H62.1c-20.7,0-37.6-16.9-37.6-37.6v-248.2c0-20.7,16.9-37.6,37.6-37.6h200.6
			c20.7,0,37.6,16.9,37.6,37.6v40.2c0,6.8,5.5,12.3,12.3,12.3s12.3-5.5,12.3-12.3v-40.2c0-34.2-27.9-62.1-62.1-62.1H62.1
			C27.9,58.95,0,86.75,0,121.05z"/>
		<path d="M385.4,337.65c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l83.9-83.9c4.8-4.8,4.8-12.5,0-17.3l-83.9-83.9
			c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l63,63H218.6c-6.8,0-12.3,5.5-12.3,12.3c0,6.8,5.5,12.3,12.3,12.3h229.8l-63,63
			C380.6,325.15,380.6,332.95,385.4,337.65z"/>
	</g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>

         </li>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
            </form>
      </ul>
     </header>
    </div>
    <div class="form_wrapper">
        <div class="form_container">
          <div class="title_container">
            <h1>تكشيف الملف التنفيدي رقم </h1>
          </div>
          <br/>
          <br/>
          <div class="row clearfix">
            <div class="">
            <form  class="file_form" method="POST" action="{{ route('moditanfid', $table->Raqem) }}" enctype="multipart/form-data">
              @csrf
                <div class="input_field full-field select_option">
                  <label class="field-text">الرقم التسلسلي                </label>
                  <input type="text" name="Raqem" value="{{  $table->Raqem }}" readonly placeholder=" الرقم التسلسلي " required />
                </div>
                <div class="input_field full-field">
                    <label class="field-text">تاريخ تسلم الوثيقة موضوع الاجراء
                    </label>
                    <input type="date" name="date_receive" value="{{  $table->date_receive }}" placeholder=" تاريخ تسلم الوثيقة مموضوع الاجراء" required />
                </div>
                <div class="input_field full-field">
                    <label class="field-text">نوع الاجراء                    </label>
                    <input type="text" name="ijrae_type" value="{{  $table->ijrae_type }}" placeholder="نوع الاجراء " required />
                </div>
                <div class="input_field full-field">
                  <label class="field-text">مراجع الملف موضوع الاجراء                </label>
                  <div id="input_holder">
                     <input type="number" min="1" name="rakem_kad" value="{{  $ramz->rakem_kad }}" placeholder="الرقم" required >
                     /
                     <input type="text" name="ramez_kad"  value="{{   $ramz->ramez_kad }}"placeholder="الرمز" required>
                     /
                     <input type="number" min="2022" name="year_kad" value="{{   $ramz->year_kad }}" placeholder="السنة" requied>
                     <span>*</span>
                  </div>
                </div>
              <div class="input_field full-field">
                <label class="field-text">الطالب                </label>
                <input type="text" name="taleb" value="{{  $table->taleb }}" placeholder="الطالب " required />
              </div>
               <div class="input_field full-field">
                <label class="field-text">المطلوب ضده  
                </label>
                <input type="text" name="matlob" value="{{  $table->matlob }}" placeholder=" المطلوب ضده "/>
              </div>
              <div class="input_field full-field">
                <label class="field-text">تاريخ انجاز الاجراءات                </label>
                <input type="date" name="date_creation" value="{{  $table->date_creation }}" placeholder="" />
              </div>
              <div class="input_field full-field">
                <label class="field-text">ملخص الاجراءات المنجزة                </label>
                <input type="text" name="resume" value="{{  $table->resume }}" placeholder=" ملخص الاجراءات المنجزة  " />
            </div>
              <div class="input_field full-field">
                <label class="field-text">تاريخ الارجاع الى كتابة الضبط
                </label>
                <input type="date" name="date_back" value="{{  $table->watika_reciev }}" placeholder="" />
             </div>
          @if(!empty($table->Flist))    
             <div id="filelinks">  
          @php
             $Flist = json_decode($table->Flist);
             $length = count(get_object_vars($Flist));
             $allowedfileNB= 5 - $length;

          @endphp 
          @foreach($Flist as $link)
            <div class="input_field full-field" >
            <label class="field-text">  الوثيقة رقم - {{ $loop->index+1 }}
                </label>
              <a class="filelink" href="{{ $link[0] }}/{{ $link[1] }}">{{ $link[1] }}</a> 
            </div>
          @endforeach
             </div>  
          @else
          @php
             $length =0;
             $allowedfileNB= 5
          @endphp
          @endif
             <!---We have to pay attention to the naMe of uploaded name, a repeated file name  may replace the old one-->
             <div class="input_field full-field">
                <label class="field-text" for="myfile"> إضافة وثائق أخرى            </label>
                <input type="number" min="0"  max="{{  $allowedfileNB  }}" name="fileN" id="fNumber"  placeholder="" />
                <input type="hidden" name="length" value="{{ $length }}"  placeholder="" />
              </div>
              @for ($i =1 ; $i < 6 ; $i++)
              <div class="input_field full-field filElM hidden">
                <label class="field-text" for="myfile"> إضافة الوثيقة-{{ $length + $i }}             </label>
                <input type="file" id="myfile" name="add_file-{{ $length + $i  }}"  placeholder="" />
              </div>     
              @endfor    
              <div class="input_field full-field  ">
                <label for="molahada "class="field-text"> ملاحظات</label>
                <textarea id="molahda" name="note" rows="4" cols="50">{{ $table->note }}</textarea>
              </div>
                <br/>
                <br/>
                <div id="bts">
                <div class="sb-button">
                  <input id="button-add" class="button" type="submit" value="حفظ " />
                </div>

                <div class="button-wrap sb-button">
                        <a href="{{ route('mofawad',[ 'id' =>  $table->Raqem ] ) }}"><button class="button" id="co-button" >مرحلة الحساب
                          <svg style="padding-top:5px" fill="white" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                          viewBox="0 0 460 460" xml:space="preserve">
                       <g id="XMLID_241_">
                         <g>
                           <path d="M369.635,0H90.365C73.595,0,60,13.595,60,30.365v399.27C60,446.405,73.595,460,90.365,460h279.27
                             c16.77,0,30.365-13.595,30.365-30.365V30.365C400,13.595,386.405,0,369.635,0z M108.204,343.61v-43.196
                             c0-3.451,2.797-6.248,6.248-6.248h43.196c3.451,0,6.248,2.797,6.248,6.248v43.196c0,3.451-2.797,6.248-6.248,6.248h-43.196
                             C111.001,349.858,108.204,347.06,108.204,343.61z M108.204,256.61v-43.196c0-3.451,2.797-6.248,6.248-6.248h43.196
                             c3.451,0,6.248,2.797,6.248,6.248v43.196c0,3.451-2.797,6.248-6.248,6.248h-43.196C111.001,262.858,108.204,260.06,108.204,256.61
                             z M308.891,421H151.109c-11.046,0-20-8.954-20-20c0-11.046,8.954-20,20-20h157.782c11.046,0,20,8.954,20,20
                             C328.891,412.046,319.937,421,308.891,421z M208.402,294.165h43.196c3.451,0,6.248,2.797,6.248,6.248v43.196
                             c0,3.451-2.797,6.248-6.248,6.248h-43.196c-3.451,0-6.248-2.797-6.248-6.248v-43.196
                             C202.154,296.963,204.951,294.165,208.402,294.165z M202.154,256.61v-43.196c0-3.451,2.797-6.248,6.248-6.248h43.196
                             c3.451,0,6.248,2.797,6.248,6.248v43.196c0,3.451-2.797,6.248-6.248,6.248h-43.196C204.951,262.858,202.154,260.06,202.154,256.61
                             z M345.548,349.858h-43.196c-3.451,0-6.248-2.797-6.248-6.248v-43.196c0-3.451,2.797-6.248,6.248-6.248h43.196
                             c3.451,0,6.248,2.797,6.248,6.248v43.196h0C351.796,347.061,348.999,349.858,345.548,349.858z M345.548,262.858h-43.196
                             c-3.451,0-6.248-2.797-6.248-6.248v-43.196c0-3.451,2.797-6.248,6.248-6.248h43.196c3.451,0,6.248,2.797,6.248,6.248v43.196h0
                             C351.796,260.061,348.999,262.858,345.548,262.858z M354,149.637c0,11.799-9.565,21.363-21.363,21.363H127.364
                             C115.565,171,106,161.435,106,149.637V62.363C106,50.565,115.565,41,127.364,41h205.273C344.435,41,354,50.565,354,62.363V149.637
                             z"/>
                         </g>
                       </g>
                       </svg>                        </button>
                      </div>
                </div>
              </form>
              <div class="button-wrap">
                        <a href="/search"><button class="button" id="register-btn" > إلغاء</button></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    
</body>
@endsection
