@extends('layout.app')
<style type="text/css">
div.form_wrapper {
  width: 55%;
}
#logoutsvg{
   float: right;
   fill:black
}

.form_wrapper .hidden{
  display: none !important;
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
            <h1>إضافة ملف تنفيدي:            </h1>
          </div>
          <br/>
          <br/>
          <div class="row clearfix">
            <div class="">
              <form id="file_form" class="file_form" method="POST" enctype="multipart/form-data" action="{{ route('create_tanfid') }}">
              @csrf
              {{-- Include the Livewire component --}}
              {{-- This component contains the selected year and the id of the document--}}
                
               {{-- <livewire:id-by-year/>  --}}
                
                <div class="input_field full-field">
                    <label class="field-text">تاريخ تسلم الوثيقة موضوع الإجراء
                    </label>
                    <input type="date" name="date_receive" placeholder=" تاريخ تسلم الوثيقة مموضوع الاجراء" required />
                </div>
                <div class="input_field full-field">
                    <label class="field-text">نوع الإجراء                    </label>
                    <input type="text" name="ijrae_type" placeholder="نوع الاجراء " required />
                </div>
                <div class="input_field full-field">
                  <label class="field-text">مراجع الملف موضوع الإجراء                </label>
                  <div id="input_holder">
                     <input type="number" min="1" placeholder="الرقم"name="rakem_kad" required >
                     /
                     <input type="text" name="ramez_kad" placeholder="الرمز" required>
                     /
                     <input type="number" min="2022" name="year_kad" placeholder="السنة" requied>
                     <span>*</span>
                  </div>
                </div>
              <div class="input_field full-field">
                <label class="field-text">الطالب                </label>
                <input type="text" name="taleb" placeholder="الطالب " required />
              </div>
               <div class="input_field full-field">
                <label class="field-text">المطلوب ضده  
                </label>
                <input type="text" name="matlob" placeholder=" المطلوب ضده "/>
              </div>
              <div class="input_field full-field">
                <label class="field-text">تاريخ إنجاز الاجراءات                </label>
                <input type="date" name="date_creation" placeholder="" />
              </div>
              <div class="input_field full-field">
                <label class="field-text">ملخص الإجراءات المنجزة                </label>
                <input type="text" name="resume" placeholder=" ملخص الاجراءات المنجزة  " />
            </div>
              <div class="input_field full-field">
                <label class="field-text">تاريخ الإرجاع إلى كتابة الضبط
                </label>
                <input type="date" name="date_back" placeholder="" />
            </div>
            <div class="input_field full-field">
                <label class="field-text" for="myfile"> تحديد عدد الوثائق              </label>
                <input type="number" min="0"  max="5" name="fileN" id="fNumber"  placeholder="" />
              </div>

              <div class="input_field full-field filElM hidden">
                <label class="field-text" for="myfile"> إضافة الوثيقة-1               </label>
                <input type="file" id="myfile" name="add_file-1"  placeholder="" />
              </div>
             <div class="input_field full-field filElM hidden">
                <label class="field-text" for="myfile"> إضافة الوثيقة-2               </label>
                <input type="file" id="myfile" name="add_file-2"  placeholder="" />
              </div>
              <div class="input_field full-field filElM hidden">
                <label class="field-text" for="myfile"> إضافة الوثيقة-3               </label>
                <input type="file"  id="myfile" name="add_file-3"  placeholder="" />
              </div>
              <div class="input_field full-field filElM hidden">
                <label class="field-text" for="myfile"> إضافة الوثيقة-4               </label>
                <input type="file" id="myfile" name="add_file-4"  placeholder="" />
              </div>
              <div class="input_field full-field filElM hidden">
                <label class="field-text" for="myfile"> إضافة الوثيقة-5               </label>
                <input type="file" id="myfile" name="add_file-5"  placeholder="" />
              </div>
              <div class="input_field full-field  ">
                <label for="molahada "class="field-text"> ملاحظات</label>
                <textarea id="molahda" name="note" rows="4" cols="50"></textarea>
              </div>
                <br/>
                <br/>
                <div id="bts">
                <div class="sb-button">
                  <input id="button-add" class="button" type="submit" value="حفظ " />
                </div>
               </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    
</body>

<script type="text/javascript">

  onload=()=>{
   const mainpage= document.getElementById('mainpage');
   const fNumber=document.getElementById('fNumber');
   const FilesUp= document.getElementsByClassName('filElM');
 
   const buttonadd=document.getElementById('button-add');
 
   const file_form=document.getElementById('file_form');
 
 mainpage.addEventListener('click',()=>{
   window.location.href='/search';
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
 
        file_form.addEventListener('submit',()=>{
       buttonadd.disabled = true;
      });
 
 
  }
 </script>
@endsection
