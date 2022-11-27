@extends('layout.app')
<style>
       body {
            font-family: Verdana, Geneva, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: center;
            font-size: 14px;
            margin: 0;
             background: rgb(244, 240, 220) url(images/weighing.webp);
           background-repeat: no-repeat;
           background-attachment: fixed;
          background-position: center; 
         background-size: 1200px 850px;
        background-blend-mode: multiply;
          }
          div.firstem{
           height: 200px;
              }
          header#headapp{

           height: 50px;

             }
             .search_block{
      width: 100%;
      height: 44px;
      display: flex;
      justify-content: center;
      padding-right: 250px;
      align-items: center;
  }
   
         .select-box-search{
           width:25%;
           margin-right: 10px;
          
          }

          .select-box-search{
           width:30%;
           margin-right: 10px;
          
          }
          div.select-box-search select{
            float: none;
             margin-left:0;
             height: 45px;
             font-size:16px;
             margin-bottom:10px;
             width: 110px;
  padding: 0px 15px;
  cursor: pointer;
  border: 1px solid;
  font-weight: bold;
  border-radius: 10px;
  background: #f5ba1a;
  color:white;
  transition: all 0.2s ease;
          }

          div.select_arrow {  position: relative;
            
  top: 27px;
  right: 85px;
  width: 0;
  height: 0;
  pointer-events: none;
  border-width: 8px 5px 0 5px;
  border-style: solid;
  border-color: white transparent transparent transparent;
}
@-moz-document url-prefix() {
  div.select-box-search select{
    font-size:14px;
    width: 120px;
  }
  div.select_arrow {
    top: 27px;
    right: 100px;
  }
}

          .select_option select:hover, .select_option select:focus {
          color: #000000;
         background: #fafafa;
         border-color: #000000;
         outline: none;
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
  font-size:calc(0.75rem + 3px);
  width: 100%;
}

#file_result td, #file_result th {
  border: 1px solid #ddd;
  text-align:center;
  letter-spacing: 1px;
  padding: 8px;
}

#file_result tr:nth-child(even){background-color: #f2f2f2;}

#file_result tr:hover {background-color: #ddd;}

#file_result th {
  padding-top: 12px;
  text-align:right;
  padding-bottom: 12px;
  letter-spacing: 1px;
  background-color: #f5ba1a;
  color: white;

}
#file_result td.notfound{
    margin-top:50px;
    background-color: rgb(240, 231, 231);
    color:#ef4444;
    text-align:center;
    font-weight:bold;
    letter-spacing: 0.8px;
}

</style>
<script type="text/javascript">
  onload=()=>{
   
    const tanfid=document.getElementById('tanfid');
    const tabligh=document.getElementById('tabligh');

    tanfid.addEventListener('click',()=>{
      window.location.href='/tanfid';
    });

    tabligh.addEventListener('click',()=>{
      window.location.href='/tabligh';
    })

    const mainpage= document.getElementById('mainpage');

    mainpage.addEventListener('click',()=>{
      window.location.href='/search';
    })


  }
  </script>
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
    <form method="POST" action="{{ route('search') }}" class="container">
         @csrf
        <div class="search_block">
          <div class="searchform">
            <div class="CcAdNb"><span class="QCzoEc z1asCe MZy1Rb" style="height:20px;line-height:20px;width:20px">
            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg></span></div>
            <input class="searchinput" name="findmilaf" type="text" required placeholder="بحث" value="{{ old('findmilaf') }}">
            <button type="submit">بحث</button>
         </div>
         <div class="select-box-search select_option">
          <div class="select_arrow" ></div>
          <select name="wantedkind" value="{{ old('wantedkind') }}" required>
            <option value="file_tanfidi" >ملف تنفيدي</option>
            <option value="filetablighi">ملف تبليغى</option>
            <option value="Ijraa">اجراء</option>
          </select>
      </div>
        </div>
        <div class="newelem">
          <p class="milaf" id="tanfid"><a href="{{ route('tanfid') }}">ملف تنفيدي جديد</a></p>
          <p class="milaf" id="tabligh"><a href="{{ route('tabligh') }}">ملف تبليغي جديد </a></p>
          <p class="milaf" id="tabligh"><a href="{{ route('ijraa') }}">اجراء مباشر</a></p>
        </div>
    </form>
    @if(!empty($tablexist))
        <div class="foundresult">
         <div class="result">
          <table id="file_result">
          <thead>
          <tr> 
          @if($tabletype == 'file_tanfidi')
              <th  scope="col" >الرقم التسلسلي </th>
              <th  scope="col" >تاريخ تسلم الوثيقة موضوع الاجراء</th>
              <th  scope="col">نوع الاجراء</th>
              <th  scope="col">مراجع الملف موضوع الاجراء</th>
              <th  scope="col">الطالب</th>
              <th  scope="col">المطلوب ضده</th>
              <th  scope="col">تاريخ انجاز الاجراءات</th>
              <th  scope="col">ملخص الاجراءات المنجزة</th>
              <th  scope="col">تاريخ الارجاع الى كتابة الضبط</th>
              <th  scope="col">الوثيقة المضافة</th>
              <th  scope="col">ملاحظات</th>
          @elseif ($tabletype == 'filetablighi')
          
              <th  scope="col" >الرقم الترتيبي</th>
              <th  scope="col" >رقم القضية</th>
              <th  scope="col">نوعها</th>
              <th  scope="col">تاريخ الجلسة</th>
              <th  scope="col">مصدرها</th>
              <th  scope="col">رقمها ورقم حسابها</th>
              <th  scope="col">نوعها</th>
              <th  scope="col">تاريخ تسلمها</th>
              <th  scope="col">اسم طالب الاجراء و من ينوب عنه</th>
              <th  scope="col">اسم المطلوب ضده الاجراء و من ينوب عنه</th>
              <th  scope="col">تاريخ انجاز الاجراءات</th>
              <th  scope="col">تاريخ ارجاع الوثيقة</th>
              <th  scope="col">اضافة وثيقة</th>
              <th  scope="col">اضافة اشعار</th>
              <th  scope="col">ملاحظات</th>
         @elseif ($tabletype == 'Ijraa')
          <th  scope="col" >الرقم التسلسلي</th>
          <th  scope="col" >نوع الاجراء</th>
          <th  scope="col">تاريخ تسلم الاجراء</th>
          <th  scope="col">طالب الاجراء</th>
          <th  scope="col">المطلوب ضده الاجراء</th>
          <th  scope="col">تاريخ انجاز الاجراء</th>
          <th  scope="col">ملخص الاجراءات المنجزة</th>
          <th  scope="col">تاريخ تسليم الوثيقة</th>
          <th  scope="col">تحميل الوثيقة</th>
          <th  scope="col">ملاحظات</th>
          @endif
          </tr>

          </thead>
          <tbody>
          @if(empty($watika))
            <tr><td class="notfound" colspan="15" >
              {{ $notfound }} </td>
            </tr>
          @elseif($watika && $tabletype == 'file_tanfidi')
          @foreach($watika as $milaf)
          <td>{{ $milaf->Raqem }}</td>
          <td>{{ $milaf->date_receive }}</td>
          <td>{{ $milaf->ijrae_type }}</td>
          <td>{{ $milaf->marge_ref }}</td>
          <td>{{ $milaf->taleb }}</td>
          <td>{{ $milaf->matlob }}</td>
          <td>{{ $milaf->date_creation }}</td>
          <td>{{ $milaf->resume }}</td>
          <td>{{ $milaf->watika_reciev }}</td>
          <td>{{ $milaf->add_file }}</td>
          <td>{{ $milaf->note }}</td>
         </tr>
          @endforeach
         @elseif($watika && $tabletype == 'filetablighi')
         @foreach($watika as $milaf)
          <tr>
          <td>{{ $watika->Raqem }}</td>
          @if (!empty($tablighramz))
          <td lang='en' dir='ltr'>
          {{ $tablighramz[0]->year_kad }} /
          {{ $tablighramz[0]->ramez_kad }} /
           {{ $tablighramz[0]->rakem_kad }}
          </td>
          @endif
          <td>{{ $watika->kad_type }}</td>
          <td>{{ $watika->jalsa_date }}</td>
          <td>{{ $watika->it_source }}</td>
          <td>{{ $watika->rakmoha_rakem}}</td>
          <td>{{ $watika->kadiya_type }}</td>
          <td>{{ $watika->date_receive}}</td>
          <td>{{ $watika->taleb }}</td>
          <td>{{ $watika->matlob }}</td>
          <td>{{ $watika->date_ijraa }}</td>
          <td>{{ $watika->watika_reciev }}</td>
          <td>{{ $watika->watika }}</td>
          <td>{{ $watika->add_notif}}</td>
          <td>{{ $watika->note }}</td>
         </tr>
         @endforeach
         @elseif($watika && $tabletype == 'Ijraa')
         @foreach($watika as $milaf)
          <tr>
          <td>{{ $watika->Raqem }}</td>
          <td>{{ $watika->ijraa_type }}</td>
          <td>{{ $watika->date_receive }}</td>
          <td>{{ $watika->taleb }}</td>
          <td>{{ $watika->matlob }}</td>
          <td>{{ $watika->creat_date }}</td>
          <td>{{ $watika->ijraa_rs}}</td>
          <td>{{ $watika->date_receive }}</td>
          <td>{{ $watika->watika_up}}</td>
          <td>{{ $watika->note }}</td>
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
</body>
@endsection
