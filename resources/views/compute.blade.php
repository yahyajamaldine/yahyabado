@extends('layout.app')

<script type="text/javascript" src="{{ asset('js/sheetjs/xlsx.js') }}" ></script>
<script type="text/javascript">
 onload=()=>{
  
  const Getfile = async ( id, datakind ) => {
  /* fetch JSON data and parse */
  let raw_data, worksheet, workbook;
    
    const ftch = await fetch('/xls', {method: 'POST', headers: { 'Content-Type': 'application/json',  'X-CSRF-TOKEN': '{{ csrf_token() }}' }, body: JSON.stringify({"id": id, "type": datakind }) })
    .then(async (response) => {
      if (response.status === 200) {
        raw_data = await response.json();
      } else {
        throw new Error('Something went wrong on API server!');
      }
    })
    .then((response) => {
      console.debug(response);
      // …
    }).catch((error) => {
      console.error(error);
    })

  /* flatten objects */
   if(datakind=='file_tanfidi'){
  const rows = [raw_data].map(row => ({
     'الرقم التسلسلي':row.table.Raqem,
     'تاريخ تسلم الوثيقة موضوع الاجراء':row.table.date_receive,
     'نوع الاجراء':row.table.taleb,
     'مراجع الملف موضوع الاجراء':`${row.ramz.rakem_kad}'/'${row.ramz.ramez_kad}'/'${row.ramz.year_kad}`,
     'الطالب':row.table.taleb,
     'المطلوب ضده':row.table.matlob,
     'تاريخ انجاز الاجراءات':row.table.date_creation,
     'تاريخ الارجاع الى كتابة الضبط':row.table.watika_reciev,
     'اضافة وثيقة': '',
     'ملاحظات':row.table.note,
  }));

  /* generate worksheet and workbook */
   worksheet = XLSX.utils.json_to_sheet(rows);
   workbook = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(workbook, worksheet, "ملف تنفيدي");

  /* fix headers */
  XLSX.utils.sheet_add_aoa(worksheet, [['الرقم التسلسلي',
     'تاريخ تسلم الوثيقة موضوع الاجراء',
     'نوع الاجراء',
     'مراجع الملف موضوع الاجراء',
     'الطالب',
     'المطلوب ضده',
     'تاريخ انجاز الاجراءات',
     'تاريخ الارجاع الى كتابة الضبط',
     'اضافة وثيقة',
     'ملاحظات']], { origin: "A1" });

   }

   if(datakind=='filetablighi'){
  const rows = [raw_data].map(row => ({
    'الرقم الترتيبي':row.table.Raqem,
     'رقم القضية':`${row.ramz.rakem_kad}'/'${row.ramz.ramez_kad}'/'${row.ramz.year_kad}`,
     'نوعها':row.table.kad_type,
     'تاريخ الجلسة':row.table.jalsa_date,
     'مصدرها':row.table.source,
      'المحكمة': row.table.its_source ,
       'تحديد': row.table.exits_sourcee ? row.table.exits_sourcee: "",
     'رقمها ورقم حسابها':row.table.rakmoha_rakem,
     'نوعها':row.table.kadiya_type,
     'تاريخ تسلمها':row.table.date_receive,
     'اسم طالب الاجراء و من ينوب عنه': row.table.taleb,
      'اسم المطلوب ضده الاجراء و من ينوب عنه': row.table.matlob,
      'تاريخ انجاز الاجراء': row.table.date_ijraa,
      'تاريخ ارجاع الوثيقة': row.table.watika_reciev,
     'ملاحظات':row.table.note,
  }));

  
  /* generate worksheet and workbook */
  worksheet = XLSX.utils.json_to_sheet(rows);
   workbook = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(workbook, worksheet, "ملف تبليغى");

  /* fix headers */
  XLSX.utils.sheet_add_aoa(worksheet, [[
  'الرقم الترتيبي',
     'رقم القضية',
     'نوعها',
     'تاريخ الجلسة',
     'مصدرها',
      'المحكمة',
       'تحديد',
     'رقمها ورقم حسابها',
     'نوعها',
     'تاريخ تسلمها',
     'اسم طالب الاجراء و من ينوب عنه',
      'اسم المطلوب ضده الاجراء و من ينوب عنه',
      'تاريخ انجاز الاجراء',
      'تاريخ ارجاع الوثيقة',
     'ملاحظات',

  ]], { origin: "A1" });
   }

   if(datakind=='Ijraa'){
  const rows = [raw_data].map(row => ({
    'الرقم التسلسلي':row.table.Raqem,
     'نوع الاجراء':row.table.ijraa_type,
     'تاريخ تسلم الاجراء':row.table.date_receive,
     'طالب الاجراء':row.table.taleb,
     'المطلوب ضده الاجراء':row.table.matlob,
     'تاريخ انجاز الاجراء':row.table.creat_date,
     'ملخص الاجراءات المنجزة':row.table.ijraa_rs,
     'تاريخ تسليم الوثيقة':row.table.watika_reciev,
     'ملاحظات':row.table.note,
  }));

  
  /* generate worksheet and workbook */
  worksheet = XLSX.utils.json_to_sheet(rows);
   workbook = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(workbook, worksheet, "إجراء");

  /* fix headers */
  XLSX.utils.sheet_add_aoa(worksheet, [['الرقم التسلسلي',
     'نوع الاجراء',
     'تاريخ تسلم الاجراء',
     'طالب الاجراء',
     'المطلوب ضده الاجراء',
     'تاريخ انجاز الاجراء',
     'ملخص الاجراءات المنجزة',
     'تاريخ تسليم الوثيقة',
     'ملاحظات']], { origin: "A1" });
   }

  /* create an XLSX file and try to save to Presidents.xlsx */
  XLSX.writeFile(workbook, `${datakind}-${id}.xlsx`, { compression: true });
};

  const mainpage= document.getElementById('mainpage');

  const xls = document.querySelectorAll('#xls');

xls.forEach(item=>{
 item.addEventListener('click',async ()=>{
           Getfile(item.className, item.getAttribute('data-kind'))
 })

})

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
  border-radius:8px;
  overflow: hidden;
  font-size:1rem;
  width: 100%;
}

#file_result td, #file_result th {
  border: 1px solid #ddd;
  text-align:center;
  padding: 8px;

}

#file_result tr:nth-child(even){background-color: #f2f2f2;
}

tr a{
  color:black;
}
#file_result  tr:nth-child(even) a{
 color:black;
}

#file_result tr:hover {background-color: #ddd;}

#file_result th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #f5ba1a;
  color: white;
}
#file_result td.notfound{
    margin-top:50px;
    background-color: rgb(240, 231, 231);
    text-align:center;
    font-weight:bold;
    letter-spacing: 0L5px;
}

#file_result tr.valid{
  background-color:#22c55e;
  color:white;
}
#file_result tr.not-valid{
  background-color:#ef4444;
  color:white;
}

#xls svg {
  width:20px;
  height:20px;
  padding-top: 5px;
  cursor: pointer;
  fill:black;
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
            <h1>الإحصاء:</h1>
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
                     <option value="Ijraa">إجراء</option>
                    </select>
                </div>

                <div class="input_field full-field">
                    <label class="field-text">من </label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}" required />
                 </div>

                 <div class="input_field full-field">
                    <label class="field-text">إلى</label>
                    <input type="date" name="end_date" value="{{ old('end_date') }}" required />
                 </div>
              </div>
                <br/>
                <br/>
                <div class="sb-button">
                  <input class="button" type="submit" value="إحصاء" />
                </div>
        @if(!empty($tablexist))
          <div class="foundresult">
            <div class="result">
            <table id="file_result">
            <thead>
             <tr> 
              <th  scope="col" >الرقم التسلسلي </th>
              <th  scope="col">نوع الإجراء</th>
              <th  scope="col">الطالب</th>
              <th  scope="col">المطلوب ضده</th>
              <th  scope="col">تاريخ تسلم الوثيقة </th>
              <th  scope="col">تحميل</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($tanfidi))
            <tr><td class="notfound" colspan="6" >{{ $notfound }}</td></tr>
            @elseif($tanfidi && $tabletype == 'file_tanfidi')
            @foreach($tanfidi as $milaf)
            <tr class="{{ $coll[$loop->index] }}">
               <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->Raqem }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->ijrae_type }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->taleb }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->matlob }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->date_receive }}</a></td>
           <td id="xls"  class="{{ $milaf->Raqem }}"  data-kind="{{ $tabletype }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M365.3 93.38l-74.63-74.64C278.6 6.742 262.3 0 245.4 0H64C28.65 0 0 28.65 0 64l.0065 384c0 35.34 28.65 64 64 64H320c35.2 0 64-28.8 64-64V138.6C384 121.7 377.3 105.4 365.3 93.38zM336 448c0 8.836-7.164 16-16 16H64.02c-8.838 0-16-7.164-16-16L48 64.13c0-8.836 7.164-16 16-16h160L224 128c0 17.67 14.33 32 32 32h79.1V448zM229.1 233.3L192 280.9L154.9 233.3C146.8 222.8 131.8 220.9 121.3 229.1C110.8 237.2 108.9 252.3 117.1 262.8L161.6 320l-44.53 57.25c-8.156 10.47-6.25 25.56 4.188 33.69C125.7 414.3 130.8 416 135.1 416c7.156 0 14.25-3.188 18.97-9.25L192 359.1l37.06 47.65C233.8 412.8 240.9 416 248 416c5.125 0 10.31-1.656 14.72-5.062c10.44-8.125 12.34-23.22 4.188-33.69L222.4 320l44.53-57.25c8.156-10.47 6.25-25.56-4.188-33.69C252.2 220.9 237.2 222.8 229.1 233.3z"/></svg></td>    
          </tr>
             @endforeach
            @elseif($tanfidi && $tabletype == 'filetablighi')
            @foreach($tanfidi as $milaf)
            <tr class="{{ $coll[$loop->index] }}">
               <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->Raqem }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->kad_type }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->taleb }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->matlob }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->date_receive }}</a></td>
          <td id="xls"  class="{{ $milaf->Raqem }}"  data-kind="{{ $tabletype }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M365.3 93.38l-74.63-74.64C278.6 6.742 262.3 0 245.4 0H64C28.65 0 0 28.65 0 64l.0065 384c0 35.34 28.65 64 64 64H320c35.2 0 64-28.8 64-64V138.6C384 121.7 377.3 105.4 365.3 93.38zM336 448c0 8.836-7.164 16-16 16H64.02c-8.838 0-16-7.164-16-16L48 64.13c0-8.836 7.164-16 16-16h160L224 128c0 17.67 14.33 32 32 32h79.1V448zM229.1 233.3L192 280.9L154.9 233.3C146.8 222.8 131.8 220.9 121.3 229.1C110.8 237.2 108.9 252.3 117.1 262.8L161.6 320l-44.53 57.25c-8.156 10.47-6.25 25.56 4.188 33.69C125.7 414.3 130.8 416 135.1 416c7.156 0 14.25-3.188 18.97-9.25L192 359.1l37.06 47.65C233.8 412.8 240.9 416 248 416c5.125 0 10.31-1.656 14.72-5.062c10.44-8.125 12.34-23.22 4.188-33.69L222.4 320l44.53-57.25c8.156-10.47 6.25-25.56-4.188-33.69C252.2 220.9 237.2 222.8 229.1 233.3z"/></svg></td>        
        </tr>
             @endforeach
            @elseif($tanfidi && $tabletype == 'Ijraa')
            @foreach($tanfidi as $milaf)
            <tr class="{{ $coll[$loop->index] }}">
               <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->Raqem }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->ijraa_type }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->taleb }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->matlob }}</a></td>
          <td><a id="link" href="{{ route('modi',[ 'type' => $tabletype , 'id' => $milaf->Raqem ] ) }}">{{ $milaf->date_receive }}</a></td>       
          <td id="xls" class="{{ $milaf->Raqem }}" data-kind="{{ $tabletype }}" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M365.3 93.38l-74.63-74.64C278.6 6.742 262.3 0 245.4 0H64C28.65 0 0 28.65 0 64l.0065 384c0 35.34 28.65 64 64 64H320c35.2 0 64-28.8 64-64V138.6C384 121.7 377.3 105.4 365.3 93.38zM336 448c0 8.836-7.164 16-16 16H64.02c-8.838 0-16-7.164-16-16L48 64.13c0-8.836 7.164-16 16-16h160L224 128c0 17.67 14.33 32 32 32h79.1V448zM229.1 233.3L192 280.9L154.9 233.3C146.8 222.8 131.8 220.9 121.3 229.1C110.8 237.2 108.9 252.3 117.1 262.8L161.6 320l-44.53 57.25c-8.156 10.47-6.25 25.56 4.188 33.69C125.7 414.3 130.8 416 135.1 416c7.156 0 14.25-3.188 18.97-9.25L192 359.1l37.06 47.65C233.8 412.8 240.9 416 248 416c5.125 0 10.31-1.656 14.72-5.062c10.44-8.125 12.34-23.22 4.188-33.69L222.4 320l44.53-57.25c8.156-10.47 6.25-25.56-4.188-33.69C252.2 220.9 237.2 222.8 229.1 233.3z"/></svg></td>        
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