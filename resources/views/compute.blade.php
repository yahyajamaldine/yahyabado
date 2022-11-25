@extends('layout.app')
<script type="text/javascript">
 onload=()=>{
  const mainpage= document.getElementById('mainpage');

mainpage.addEventListener('click',()=>{
  window.location.href='/search';
})
 }
</script>
<style type="text/css">
 div.form_wrapper{
  width:60%;
 }
#logoutsvg{
   float: right;
   fill:black
}
.ihssa_list{
   display:flex;
   justify-content:space-between;
   height:40px;
   width:100%;

}
#compute-form .select_option select{
    float: none;
    margin-left:0px;
    font-size:14px;
    font-weight: bold;
     color: black;
    width: 50%;
}

#compute-form .select_arrow {
    top: 14px;
    left: 70px;
    border-color: #4e4c4c transparent transparent transparent;
}

#compute-form .input_field{
  flex: 1 0 25%;
}

#compute-form .field-text{
  padding-left:10px;
  font-size:17px;
}

#compute-form  input[type=date]{
  float: none;
  margin-left:0px;
  width: 70%;
}

.foundresult{
          width: 100%;
         display: flex;
         height:80%;
          justify-content: center;
         }
         .result{
          width:100%;
          height:max-content;
          background-color:white;
         }
         #file_result {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  border:1px solid white;
  border-radius:4px;
  font-size:1rem;
  width: 100%;
}

#file_result td, #file_result th {
  border: 1px solid #ddd;
  text-align:right;
  padding: 8px;
}

#file_result tr:nth-child(even){background-color: #f2f2f2;}

#file_result tr:hover {background-color: #ddd;}

#file_result th {
  padding-top: 12px;
  text-align:right;
  padding-bottom: 12px;
  background-color: #f5ba1a;
  color: white;
}
td.notfound{
    margin-top:50px;
    background-color: rgb(240, 231, 231);
    text-align:right;
    font-weight:bold;
    letter-spacing: 1px;
}

#file_result tr.valid{
  background-color:#22c55e;
  color:white;
}
#file_result tr.not-valid{
  background-color:#ef4444;
  color:white;
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
          الاحصاء
          </a></li>
         <li>
         <a href="{{ route('ijraa') }}">
         اجراء مباشر
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
            <h1>الاحصاء:</h1>
          </div>
          <br/>
          <br/>
          <div class="row clearfix">
            <div class="">
              <form id="compute-form" method="POST" action="{{ route('compute') }}">
              @csrf
              <div class="ihssa_list">
                 <div class="input_field full-field select_option">
                    <label class="field-text">نوع الوثيقة</label>
                    <div class="select_arrow" ></div>
                    <select name="file_type" value="{{ old('file_type') }}">
                    <option value="file_tanfidi" >ملف تنفيدي</option>
                    <option value="filetablighi">ملف تبليغى</option>
                     <option value="Ijraa">اجراء</option>
                    </select>
                </div>

                <div class="input_field full-field">
                    <label class="field-text">من </label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}" required />
                 </div>

                 <div class="input_field full-field">
                    <label class="field-text">الى</label>
                    <input type="date" name="end_date" value="{{ old('end_date') }}" required />
                 </div>
              </div>
                <br/>
                <br/>
                <div class="sb-button">
                  <input class="button" type="submit" value="احصاء" />
                </div>
        @if(!empty($tablexist))
          <div class="foundresult">
            <div class="result">
            <table id="file_result">
            <thead>
             <tr> 
              <th  scope="col" >الرقم التسلسلي </th>
              <th  scope="col">نوع الاجراء</th>
              <th  scope="col">الطالب</th>
              <th  scope="col">المطلوب ضده</th>
              <th  scope="col">تاريخ تسلم الوثيقة </th>
            </tr>
            </thead>
            <tbody>
            @if(empty($tanfidi))
            <tr><td class="notfound" colspan="15" >{{ $notfound }}</td></tr>
            @elseif($tanfidi && $tabletype == 'file_tanfidi')
            @foreach($tanfidi as $milaf)
            <tr class="{{ $coll[$loop->index] }}">
              <td>{{ $milaf->Raqem }}</td>
              <td>{{ $milaf->ijrae_type }}</td>
               <td>{{ $milaf->taleb }}</td>
               <td>{{ $milaf->matlob }}</td>
               <td>{{ $milaf->date_receive }}</td>
             </tr>
             @endforeach
            @elseif($tanfidi && $tabletype == 'filetablighi')
            @foreach($tanfidi as $milaf)
            <tr class="{{ $coll[$loop->index] }}">
              <td>{{ $milaf->Raqem }}</td>
              <td>{{ $milaf->kad_type }}</td>
               <td>{{ $milaf->taleb_lijra }}</td>
               <td>{{ $milaf->naib }}</td>
               <td>{{ $milaf->date_receive }}</td>
             </tr>
             @endforeach
            @elseif($tanfidi && $tabletype == 'Ijraa')
            @foreach($tanfidi as $milaf)
            <tr class="{{ $coll[$loop->index] }}">
              <td>{{ $milaf->Raqem }}</td>
              <td>{{ $milaf->ijraa_type }}</td>
               <td>{{ $milaf->taleb_ijraa }}</td>
               <td>{{ $milaf->matlob_d }}</td>
               <td>{{ $milaf->date_receive }}</td>
             </tr>
             @endforeach
             @endif
            </tbody>
            <tfoot>
            </tfoot>
           </table>
           </div>
            </div>
         @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    
</body>
@endsection