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
             height: 42px;
             font-size:16px;
             margin-bottom:9.5px;
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
#file_result tr:nth-child(even){background-color: #f2f2f2;}

#file_result tr:hover {background-color: #ddd;}

#file_result td, #file_result th {
  border: 1px solid #ddd;
  text-align:center;
  letter-spacing: 1px;
}

#file_result th {
  padding-left:2px;
  padding-right:4px;
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
/**********Let's fix the input field */
#file_result td{
  padding-block:6px;
  width:6%;
}
#file_result td:first-of-type{
   width:5%;

}
#file_result td:nth-child(2){
  padding-block:7px;
  width:8%;
}
tr a{
   color:#000000;
}

#file_result th {
    text-align: center;
}
td svg{
  width:20px;
  height:20px;
  padding-top: 5px;
  cursor: pointer;
  fill:#ef4444;
}

#filelinks a{
   text-decoration: underline;
   font-weight: bolder;
   color:#3e6b8e;
}
#filelinks ul{
  display: flex;
  flex-direction: column;
  align-items: start;
  color:#3e6b8e;

}

#filelinks ul li{
  margin-bottom: 10%;
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

    const filelink = document.querySelectorAll('.filelink');

    filelink.forEach((item)=>{

       item.addEventListener('click', async function(event){
        event.preventDefault();
         const path= item.getAttribute('href')

        const ftch = await fetch('/docs', {
          method: 'POST', headers: { 'Content-Type': 'application/json',  'X-CSRF-TOKEN': '{{ csrf_token() }}' }, 
          body: JSON.stringify({"path": path})
         }).then(response => {
    if (response.ok) {
        // Get the content disposition header, which contains the filename
        const contentDisposition = response.headers.get('Content-Disposition');
        const filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
        const matches = filenameRegex.exec(contentDisposition);
        const filename = matches[1].replace(/^"(.+(?="$))"$/, '$1');


        // Create a new blob object with the file data and download it
        response.blob().then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = decodeURI(filename);
            a.click();
            window.URL.revokeObjectURL(url);
        });
    } else {
        // Handle error response
        response.json().then(error => {
            console.error(error.message);
        });
    }
}).catch(error => {
    console.error(error);
});
      });
    });

    mainpage.addEventListener('click',()=>{
      window.location.href='/search';
    })
    
    let notifier = new AWN() // where options is an object with your custom values
    
    @if (session('status'))
    notifier.success(' {{ session('status') }} ');
    @endif

    @if(!empty($watika))
      
     let onCancel = () => {notifier.warning('تم إلغاء العملية')};

    const Delet=document.querySelectorAll('.delete');
     
    Delet.forEach((item)=>{
       item.addEventListener('click',function(event){
        event.preventDefault();
        const elem=this;
        notifier.confirm(
        'هل تريد إتمام العملية',
        function () {  
            elem.submit();
        },
         onCancel,
         {
         labels: {
        confirm: `<b>حدف الملف رقم ${this.id}</b>`
       }
       }
       )
       })
    })
    @endif
    
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
              <th  scope="col">الوثائق المضافة</th>
              <th  scope="col">ملاحظات</th>
              <th  scope="col">حدف</th>
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
              <th  scope="col">الوثائق المضافة</th> 
              <th  scope="col">حدف</th>
         @elseif ($tabletype == 'Ijraa')
          <th  scope="col" >الرقم التسلسلي</th>
          <th  scope="col" >نوع الاجراء</th>
          <th  scope="col">تاريخ تسلم الاجراء</th>
          <th  scope="col">طالب الاجراء</th>
          <th  scope="col">المطلوب ضده الاجراء</th>
          <th  scope="col">تاريخ انجاز الاجراء</th>
          <th  scope="col">ملخص الاجراءات المنجزة</th>
          <th  scope="col">تاريخ تسليم الوثيقة</th>
          <th  scope="col">الوثائق المضافة</th> 
          <th  scope="col">ملاحظات</th>
          <th  scope="col">حدف</th>
          @endif
          </tr>
          </thead>
          <tbody>
          @if(empty($watika))
            <tr>
             <td class="notfound" colspan="15" >
              {{ $notfound }} </td>
            </tr>
          @elseif($watika && $tabletype == 'file_tanfidi')
          @foreach($watika as $milaf)
        <tr>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->Raqem }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->date_receive }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->ijrae_type }}</a></td>
          <td lang='en' dir='ltr'>
            <a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">
            @php
             $ramz = json_decode($milaf->ramz);
             echo $ramz->year_kad ." / ". $ramz->ramez_kad ." / ".$ramz->rakem_kad;
            @endphp 
            </a>
          </td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->taleb }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->matlob }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->date_creation }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->resume }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->watika_reciev }}</a></td>
          <td id="filelinks">
            @if(!empty($milaf->Flist))
            <ul>
          @php
             $Flist = json_decode($milaf->Flist);
          @endphp 
          @foreach($Flist as $link)
            <li>
              <a class="filelink" href="{{ $link[0] }}/{{ $link[1] }}">{{ $link[1] }}</a>
            </li>         
          @endforeach 
           </ul>  
           @else
               لا توجد أي وثيقة

           @endif
          </td>
           <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->note }}</a></td>
           <td>
            <form class="delete" id="{{ $milaf->Raqem  }}" action="/delete/{{ $tabletype }}/{{$milaf->Raqem}}" method="POST">
              @csrf
              @method('DELETE')
              <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
              </svg></p>
              </form>
            </td>
          </tr>
          @endforeach
         @elseif($watika && $tabletype == 'filetablighi')
         @foreach($watika as $milaf)
          <tr>
            <td><a id="link" target="_blank" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->Raqem }}</a></td>
          <td lang='en' dir='ltr'>
            <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">
            @php
             $ramz = json_decode($milaf->ramz);
             echo $ramz->year_kad ." / ". $ramz->ramez_kad ." / ".$ramz->rakem_kad;
            @endphp 
            </a>
          </td>
          <td> <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->kad_type }}</a></td>
          <td> <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->jalsa_date }}</a></td>
          <td> <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->source }}</a></td>
          <td> <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->rakmoha_rakem}}</a></td>
          <td>  <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->kadiya_type }}</a></td>
          <td> <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->date_receive}}</a></td>
          <td> <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->taleb }}</a></td>
          <td>  <a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->matlob }}</a></td>
          <td id="filelinks">
            @if(!empty($milaf->Flist))
            <ul>
          @php
             $Flist = json_decode($milaf->Flist);
          @endphp 
          @foreach($Flist as $link)
            <li>
              <a class="filelink" href="{{ $link[0] }}/{{ $link[1] }}">{{ $link[1] }}</a>
            </li>         
          @endforeach 
           </ul>  
           @else
               لا توجد أي وثيقة

           @endif
          </td>
          <td>
            <form class="delete" id="{{ $milaf->Raqem  }}" action="/delete/{{ $tabletype }}/{{$milaf->Raqem}}" method="POST">
              @csrf
              @method('DELETE')
              <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
              </svg></p>
              </form>
          </td>
        </tr>
         @endforeach
        </a>
         @elseif($watika && $tabletype == 'Ijraa')
         @foreach($watika as $milaf)
          <tr>
            <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->Raqem }}</a></td>
          <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->ijraa_type }}</a></td>
          <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->date_receive }}</a></td>
          <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->taleb }}</a></td>
          <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->matlob }}<a></td>
          <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->creat_date }}</a></td>
          <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->ijraa_rs}}</a></td>
          <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->date_receive }}</a></td>
          <td id="filelinks">
            @if(!empty($milaf->Flist))
            <ul>
          @php
             $Flist = json_decode($milaf->Flist);
          @endphp 
          @foreach($Flist as $link)
            <li>
              <a class="filelink" href="{{ $link[0] }}/{{ $link[1] }}">{{ $link[1] }}</a>
            </li>         
          @endforeach 
           </ul>  
           @else
               لا توجد أي وثيقة

           @endif
          </td>
          <td><a id="link" target="_blank" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->note }}</a></td>
          <td>
            <form class="delete" id="{{ $milaf->Raqem  }}" action="/delete/{{ $tabletype }}/{{$milaf->Raqem}}" method="POST">
              @csrf
              @method('DELETE')
              <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
              </svg></p>
              </form>
          </td>
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
