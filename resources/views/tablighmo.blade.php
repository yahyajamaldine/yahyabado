@extends('layout.app')
<script type="text/javascript">
 onload=()=>{
     const mainpage= document.getElementById('mainpage');

    mainpage.addEventListener('click',()=>{
      window.location.href='/search';
    })
  
    const ListofSource={
    "محاكم الإستئناف": [
       '... اختيار',
                 'محكمة الاستئناف بالرباط',
                    'محكمة الاستئناف الدار البيضاء',
                    'محكمة الاستئناف بأكادير',
                   'محكمة الاستئناف بورزازات',
                   'محكمة الاستئناف بالحسيمة',
                    'محكمة الاستئناف بتازة',
                  'محكمة الاستئناف ببني ملال',
                   'محكمة الاستئناف بفاس',
                   'محكمة الاستئناف بالقنيطرة',
                   'محكمة الاستئناف بالعيون',
                   'محكمة الاستئناف بمراكش',
                   'محكمة الاستئناف بمكناس',
                   'محكمة الاستئناف بالرشيدية',
                  ' محكمة الاستئناف بوجدة',
                   'محكمة الاستئناف بالناضور',
                  'محكمة الاستئناف بآسفي',
                   'محكمة الاستئناف بالجديدة',
                   'محكمة الاستئناف بسطات',
                   'محكمة الاستئناف بخريبكة',
                   'محكمة الاستئناف بطنجة',
                   'محكمة الاستئناف بتطوان',
                   'محكمة الاستئناف بكلميم']
                   ,
            "المحاكم الإبتدائية":  [
            '... اختيار',
            'محكمة الاستئناف بالرباط',
                    'محكمة الاستئناف الدار البيضاء',
                    'محكمة الاستئناف بأكادير',
                   'محكمة الاستئناف بورزازات',
                   'محكمة الاستئناف بالحسيمة',
                    'محكمة الاستئناف بتازة',
                  'محكمة الاستئناف ببني ملال',
                   'محكمة الاستئناف بفاس',
                   'محكمة الاستئناف بالقنيطرة',
                   'محكمة الاستئناف بالعيون',
                   'محكمة الاستئناف بمراكش',
                   'محكمة الاستئناف بمكناس',
                   'محكمة الاستئناف بالرشيدية',
                  'محكمة الاستئناف بوجدة',
                   'محكمة الاستئناف بالناضور',
                  'محكمة الاستئناف بآسفي',
                   'محكمة الاستئناف بالجديدة',
                   'محكمة الاستئناف بسطات',
                   'محكمة الاستئناف بخريبكة',
                   'محكمة الاستئناف بطنجة',
                   'محكمة الاستئناف بتطوان',
                   'محكمة الاستئناف بكلميم']
                   ,

                   "المحاكم التجارية":    [
                   '... اختيار',
                   'محكمة الاستئناف التجارية بالدار البيضاء',
'محكمة الإستئناف التجارية بفاس',
'محكمة الإستئناف التجارية بمراكش'],

"محاكم الإستئناف التجارية":  [
'... اختيار',  
'محكمة الاستئناف التجارية بالدار البيضاء',
'محكمة الإستئناف التجارية بفاس',
'محكمة الإستئناف التجارية بمراكش']
,

"محاكم الإستئناف الإدارية":[ 
'... اختيار',
              'محكمة الاستئناف الإدارية بالرباط',
              'محكمة الإستئناف الإدارية بمراكش' 
            ],
            "المحاكم الإدارية":[ 
            '... اختيار',
              'محكمة الاستئناف الإدارية بالرباط',
              'محكمة الإستئناف الإدارية بمراكش' 
            ]
   };        
const IbtidaList={
       'محكمة الاستئناف بالرباط':[
         ' المحكمة الابتدائية بالرباط',
         ' المحكمة الابتدائية بسلا',
        '  المحكمة الابتدائية بتمارة',
       ' المحكمة الابتدائية بالخميسات',
      ' المحكمة الإبتدائية بتيفلت',
       ' المحكمة الابتدائية بالرماني',
       ' محكمة ابتدائية نموذجية',
      ' المحكمة الابتدائية بالرباط - قسم قضاء الأسرة',
      ' المحكمة الابتدائية بسلا- قسم قضاء الأسرة',
    '  المحكمة الابتدائية بالخميسات - قسم قضاء الأسرة',
         ],
        'محكمة الاستئناف الدار البيضاء':[          
       'المحكمة الابتدائية المدنية بالدار البيضاء',
        'المحكمة الابتدائية بالمحمدية',
         'المحكمة الابتدائية ببنسليمان',
        'المحكمة الابتدائية الإجتماعية بالدار البيضاء'
         ],
        'محكمة الاستئناف بأكادير':[
'المحكمة الإبتدائية بأكادير',
'المحكمة الابتدائية بإنزكان',
'المحكمة الإبتدائية بتارودانت - مركز القاضي المقيم بأولاد تايمة',
'المحكمة الابتدائية بتارودانت - مركز القاضي المقيم بأولاد برحيل',
'المحكمة الابتدائية بتارودانت - مركز القاضي المقيم بتافنكولت',
'المحكمة الابتدائية بتارودانت - مركز القاضي المقيم بتالوين',
'المحكمة الابتدائية بتيزنيت',
'المحكمة الابتدائية بطاطا',
'ابتدائية آسا الزاك',
'المحكمة الإبتدائية بتارودانت',
'المحكمة الابتدائية بتارودانت - قسم قضاء الأسرة',
'المحكمة الإبتدائية بتزنيت- قسم قضاء الأسرة',
'المحكمة الإبتدائية بإنزكان- قسم قضاء الأسرة'
         ],

      'محكمة الاستئناف بورزازات':[
         'المحكمة الإبتدائية بورزازات-قسم قضاء الأسرة',
'المحكمة الإبتدائية بتنغير',
'مركز القاضي المقيم بقلعة مكونة - المحكمة الإبتدائية بتنغير',
'المحكمة الإبتدائية بزاكورة',
'مركز القاضي المقيم بأكدز - المحكمة الإبتدائية بزاكورة',
'المحكمة الإبتدائية بورزازات',
'المحكمة الإبتدائية بزاكورة - قسم قضاء الأسرة'
         ],
         'محكمة الاستئناف بالحسيمة':[
         'المحكمة الابتدائية بالحسيمة',
        'المحكمة الإبتدائية بتارجيست'
         ],
         'محكمة الاستئناف بتازة':[
"المحكمة الإبتدائية بتازة",
"المحكمة الابتدائية بتازة - مركز القاضي المقيم بواد أمليل",
"المحكمة الإبتدائية بتازة- قسم قضاء الأسرة"
   
         ]
         ,
          'محكمة الاستئناف ببني ملال':[
          "المحكمة الابتدائية ببني ملال",
         "مركز القاضي المقيم بتاكزيرت",
         "المحكمة الإبتدائية بقصبة تادلة",
         "مركز القاضي المقيم بالقصيبة - المحكمة الإبتدائية بقصبة تادلة",
         "مركز القاضي المقيم بزاوية الشيخ - المحكمة الإبتدائية بقصبة تادلة",
         "مركز القاضي المقيم باغبالة - المحكمة الإبتدائية بقصبة تادلة",
         "المحكمة الابتدائية بالفقيه بن صالح",
         "المحكمة الإبتدائية بسوق السبت أولاد النمة - مركز القاضي المقيم بدار ولد زيدوح",
         "المحكمة الإبتدائية بسوق السبت أولاد النمة",
         "المحكمة الإبتدائية بأزيلال - مركز القاضي المقيم بابزو",
         "المحكمة الابتدائية بازيلال - مركز القاضي المقيم بدمنات",
         "المحكمة الإبتدائية بأزيلال - مركز القاضي المقيم بتاكفلت",
         "المحكمة الإبتدائية بأزيلاال - مركز القاضي المقيم بتيلوكيت",
         "المحكمة الإبتدائية بخنيفرة",
         "المحكمة الإبتدائية بأزيلال",
         "المحكمة الابتدائية بخنيفرة- قسم قضاء الأسرة",
         "المحكمة الابتدائية ببني ملال- قسم قضاء الأسرة",
         "المحكمة الإبتدائية بالفقيه بن صالح-قسم قضاء الأسرة",
         "المحكمة الابتدائية بازيلال - مركز القاضي المقيم بايت اعتاب",
         ],
        'محكمة الاستئناف بفاس':[
         "المحكمة الابتدائية بفاس",
"المحكمة الابتدائية بصفرو",
"المحكمة الإبتدائية لبولمان بميسور",
"المحكمة الابتائية لبولمان بميسور - مركز القاضي المقيم بأوطاط الحاج",
"المحكمة الابتدائية بتاونات",
"المحكمة الإبتدائية بتاونات - مركز القاضي المقيم بتيسة",
"المحكمة الابتدائية بفاس - قسم قضاء الأسرة",
         ],
         'محكمة الاستئناف بالقنيطرة': [
         "المحكمة الابتدائية بالقنيطرة",
"المحكمة الإبتدائية بسيدي سليمان",
"المحكمة الابتدائية بسوق أريعاء الغرب",
"المحكمة الابتدائية بسيدي قاسم",
"المحكمة الإبتدائية بمشرع بلقصيري",
"المحكمة الابتدائية بالقنيطرة- قسم قضاء الأسرة",
"المحكمة الإبتدائية بسيدي قاسم - قسم قضاء الأسرة"
         ],
        'محكمة الاستئناف بالعيون':[
        "المحكمة الابتدائية بالعيون",
"المحكمة الإبتدائية بالعيون - مركز القاضي المقيم بطرفاية",
"مركز القاضي المقيم ببوجدور - المحكمة الإبتدائية بالعيون",
"المحكمة الابتدائية بالسمارة",
"المحكمة الإبتدائية بوادي الذهب",
"المحكمة الابتدائية بالسمارة - قسم قضاء الأسرة",
"المحكمة الإبتدائية بوادي الذهب - مركز القاضي المقيم ببئر كندوز",
        ],
        'محكمة الاستئناف بمراكش':[   
"مركز القاضي المقيم بآيت اورير - المحكمة الإبتدائية بمراكش",
"المحكمة الإبتدائية بامنتانوت",
"مركز القاضي المقيم بشيشاوة - المحكمة الإبتدائية بامنتانوت",
"المحكمة الإبتدائية بقلعة السراغنة",
"مركز القاضي المقيم بسيدي رحال - المحكمة الإبتدائية بقلعة السراغنة",
"المحكمة الابتدائية بابن جرير",
"المحكمة الإبتدائية بمراكش",
"المحكمة الإبتدائية بمراكش - قسم قضاء الأسرة"
        ],
         'محكمة الاستئناف بمكناس':[
        "المحكمة الإبتدائية بمكناس",
"المحكمة الإبتدائية بأزرو",
"المحكمة الابتدائية بمكناس- قسم قضاء الأسرة"
        ],
       'محكمة الاستئناف بالرشيدية' :[
"المحكمة الإبتدائية بميدلت",
"المحكمة الإبتدائية بالرشيدية",
"المحكمة الإبتدائية بالرشيدية - مركز القاضي المقيم بكلميمة",
"المحكمة الإبتدائية بميدلت - مركز القاضي المقيم بالريش"
        ],
        'محكمة الاستئناف بوجدة':[
 "المحكمة الابتدائية بجرسيف",
 "المحكمة الابتدائية بوجدة",
 "المحكمة الابتدائية ببركان",
 "المحكمة الإبتدائية لفجيج ببوعرفة",
 "المحكمة الإبتدائية بتاوريرت",
 "المحكمة الابتدائية بوجدة - قسم قضاء الأسرة",
 "المحكمة الإبتدائية بجرسيف-قسم قضاء الأسرة",
 "المحكمة الإبتدائية بتاوريرت - قسم قضاء الأسرة",
 "المحكمة الإبتدائية ببركان - قسم قضاء الأسرة",
        ],
       'محكمة الاستئناف بالناضور':[
 "المحكمة الإبتدائية بالناضور",
 "المحكمة الإبتدائية بالدريوش",
 "المحكمة الابتدائية بالناضور- قسم قضاء الأسرة"
        ],
        'محكمة الاستئناف بآسفي':[
"المحكمة الإبتدائية بآسفي",
"مركز القاضي المقيم بجمعة اسحيم - المحكمة الإبتدائية بآسفي",
"المحكمة الإبتدائية باليوسفية",
"المحكمة الإبتدائية بالصويرة",
"المحكمة الابتدائية بآسفي - قسم قضاء الأسرة",
"المحكمة الإبتدائية باليوسفية - قسم قضاء الأسرة"
        ],
         'محكمة الاستئناف بالجديدة':[   
 "المحكمة الإبتدائية بالجديدة",
 "المحكمة الإبتدائية بسيدي بنور",
 "المحكمة الابتدائية سيدي بنور- قسم قضاء الأسرة",
 "المحكمة الابتدائية بالجديدة- قسم قضاء الأسرة"
         ],
         'محكمة الاستئناف بسطات':[
"المحكمة الإبتدائية بسطات",
"المحكمة الإبتدائية بسطات - مركز القاضي المقيم بالبروج",
"المحكمة الإبتدائية ببرشيد",
"المحكمة الابتدائية ببن أحمد",
"المحكمة الإبتدائية ببن أحمد - قسم قضاء الأسرة",
"المحكمة الابتدائية ببرشيد - قسم قضاء الأسرة"
       ],
        'محكمة الاستئناف بخريبكة':[
    "المحكمة الإبتدائية بخريبكة",
    "المحكمة الإبتدائية بوادي زم",
    "المحكمة الإبتدائية بأبي الجعد"
        ],
        'محكمة الاستئناف بطنجة':[
           "المحكمة الإبتدائية بطنجة",
"المحكمة الإبتدائية بأصيلة",
"المحكمة الإبتدائية بالعرائش",
"المحكمة الإبتدائية بالقصر الكبير",
"المحكمة الابتدائية بالعرائش - قسم قضاء الأسرة",
"المحكمة الابتدائية بالقصر الكبير - قسم قضاء الأسرة",
"المحكمة الإبتدائية بطنجة - قسم قضاء الأسرة"
          ],
        'محكمة الاستئناف بتطوان':[
 "المحكمة الابتدائية وزان",
 "المحكمة الإبتدائية بتطوان",
 "المحكمة الإبتدائية بشفشاون"
],
        'محكمة الاستئناف بكلميم':[
           "مركز القاضي المقيم بسيدي إفني",
 "المحكمة الابتدائية بكلميم",
 "المحكمة الابتدائية بطانطان",
 "المحكمة الإبتدائية بطانطان - قسم قضاء الأسرة",
 "المحكمة الإبتدائية بكلميم - قسم قضاء الأسرة"
          ]
  };
  const TijariList={
  'محكمة الاستئناف التجارية بالدار البيضاء':[
"المحكمة التجارية بالرباط",
"المحكمة التجارية بالدار البيضاء"],

'محكمة الإستئناف التجارية بفاس':[
    "المحكمة التجارية بفاس",
"المحكمة التجارية بمكناس",
"المحكمة التجارية بوجدة",
"المحكمة التجارية بطنجة"
    ],
    
    'محكمة الإستئناف التجارية بمراكش': [      
"المحكمة التجارية بمراكش",
"المحكمةالتجارية بأكادير"
    ]
  };
  const MahkimIdarList={
    'محكمة الاستئناف الإدارية بالرباط':[
  '... اختيار',  
  "المحكمة الإدارية بالرباط",
"المحكمة الإدارية بالدار البيضاء",
"المحكمة الإدارية بفاس",
"المحكمة الإدارية بمكناس",
"المحكمة الإدارية بوجدة"
],
'محكمة الإستئناف الإدارية بمراكش':[
  '... اختيار',
  "المحكمة الإدارية بمراكش",
  "المحكمة الإدارية بأكادير"
  ]
  };
  
   const SelectedType= document.getElementById('its_type');

   const ItsSource= document.getElementById('its_source');
   
   const ExItsSource= document.getElementById('exits_source');

   const Sourceholder= document.getElementById('source_holder');

   const EXSourceholder= document.getElementById('exsource_holder');
  
   let Idmahkama;

   function Handlertype(event){
         const MatchedObj=[IbtidaList,TijariList,MahkimIdarList];
         Exhandler(event,MatchedObj[Idmahkama]);
    }
   function Exhandler(event,Arr){
        let newevent=event.target.value;
        while (ExItsSource.length > 0) {
          ExItsSource.remove(0);
         }
         Arr[newevent].map((item,index)=>{
      let opt = document.createElement('option');
      opt.innerHTML = item;
      if(index!=0){
        opt.value = item;
       }
       ExItsSource.appendChild(opt);
      });
      EXSourceholder.classList.remove('hidden');
      }

SelectedType.addEventListener('change',(event)=>{

    while (ItsSource.length > 0) {
      ItsSource.remove(0);
    }

    ListofSource[event.target.value].map((item,index)=>{
      let opt = document.createElement('option');
      opt.innerHTML = item;
      if(index!=0){
        opt.value = item;
       }
      ItsSource.appendChild(opt);
    
    });
    
    Sourceholder.classList.remove('hidden');
     /*************************/

     if(event.target.value=="المحاكم الإبتدائية"){
      Idmahkama=0;
      EXSourceholder.classList.add('hidden');
      ItsSource.addEventListener('change',Handlertype);
      }
     else if(event.target.value=="محاكم الإستئناف التجارية"){
      Idmahkama=1;
      EXSourceholder.classList.add('hidden');
      ItsSource.addEventListener('change',Handlertype);
      }
     else if(event.target.value=="المحاكم الإدارية"){
      Idmahkama=2;
      EXSourceholder.classList.add('hidden');
      ItsSource.addEventListener('change',Handlertype);
      }

      else{
        ItsSource.removeEventListener('change',Handlertype);
        EXSourceholder.classList.add('hidden');
      }


   }); 

 }
</script>
<style type="text/css">
div.form_wrapper {
  width: 55%;
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
            <h1>تكشيف الملف التبليغي رقم {{ $table->Raqem }} </h1>
          </div>
          <br/>
          <br/>
          <div class="row clearfix">
            <div class="">
              <form  class="file_form" method="POST" action="{{ route('moditabligh', $table->Raqem) }}" enctype="multipart/form-data">
                 @csrf
                <div class="input_field full-field select_option">
                  <label class="field-text">الرقم الترتيبي </label>
                  <input id="rakem" type="number" readonly name="raqem" value="{{  $table->Raqem }}" required />
                </div>
                <div class="input_field full-field">
                    <label class="field-text">رقم القضية
                    </label>
                    <div id="input_holder">
                     <input type="number"  min="1" value="{{ $ramz->rakem_kad  }}" placeholder="الرقم"name="rakem_kad" required >
                     /
                     <input type="text" value="{{ $ramz->ramez_kad }}" name="ramez_kad" placeholder="الرمز" required>
                     /
                     <input type="number" value="{{ $ramz->year_kad }}" min="2022" name="year_kad" placeholder="السنة" requied>
                     <span>*</span>
                    </div>
                </div>
                <div class="input_field full-field select_option">
                    <label class="field-text">نوعها </label>
                    <div class="select_arrow" ></div>
                    <select name="kad_type">
                      <option <?php if( $table->kad_type == "مدني"){ echo 'selected'; } ?> value="مدني">مدني</option>
                      <option <?php if( $table->kad_type == "جنحى"){ echo 'selected'; } ?> value="جنحى">جنحى</option>
                      <option <?php if( $table->kad_type == "تجاري"){ echo 'selected'; } ?> value="تجاري">تجاري</option>
                      <option <?php if( $table->kad_type == "اداري"){ echo 'selected'; } ?> value="اداري">اداري</option>
                      <option <?php if( $table->kad_type == "استعجالي"){ echo 'selected'; } ?> value="استعجالي"> استعجالي</option>
                    </select>
                </div>
                <div class="input_field full-field">
                  <label class="field-text">تاريخ الجلسة                </label>
                  <input type="date" value="{{ $table->jalsa_date }}" name="jalsa_date" placeholder="" required />
               </div>
              <div class="input_field full-field select_option">
                <label class="field-text">مصدرها                </label>
                <div class="select_arrow" ></div>
                    <select id="its_type" name="source">
                      <option>... اختيار</option>
                      <option <?php if($table->source == "محاكم الإستئناف") { echo 'selected'; } ?> value="محاكم الإستئناف">محاكم الإستئناف</option>
                      <option <?php if($table->source == "المحاكم الإبتدائية") { echo 'selected'; } ?> value="المحاكم الإبتدائية">المحاكم الإبتدائية</option>
                      <option <?php if($table->source == "المحاكم التجارية") { echo 'selected'; } ?> value="المحاكم التجارية">المحاكم التجارية</option>
                      <option <?php if($table->source == "محاكم الإستئناف التجارية") { echo 'selected'; } ?> value="محاكم الإستئناف التجارية">محاكم الإستئناف التجارية</option>
                      <option <?php if($table->source == "محاكم الإستئناف الإدارية") { echo 'selected'; } ?> value="محاكم الإستئناف الإدارية">محاكم الإستئناف الإدارية</option>
                      <option <?php if($table->source == "المحاكم الإدارية") { echo 'selected'; } ?> value="المحاكم الإدارية">المحاكم الإدارية</option>

                    </select>
              </div>

              <div  id="source_holder"class="input_field full-field select_option @if(empty($table->its_source)) hidden @endif">
                <label class="field-text">المحكمة
                </label>
                <div class="select_arrow" ></div>
                <select id="its_source" name="its_source">
                  <option value="{{ $table->its_source }}" selected >{{ $table->its_source }}</option>             
                </select>
              </div>

              <div  id="exsource_holder"class="input_field full-field select_option @if(empty($table->exits_source)) hidden @endif">
                <label class="field-text">تحديد
                </label>
                <div class="select_arrow" ></div>
                <select id="exits_source" name="exits_source">   
                <option value="{{ $table->exits_source }}" selected >{{ $table->exits_source }}</option>          
                </select>
              </div>

              <div class="mahkama input_field full-field"></div>
               <div class="input_field full-field">
                <label class="field-text">رقمها ورقم حسابها
                </label>
                <input type="number" value="{{ $table->rakmoha_rakem }}" name="rakmoha_rakem" placeholder="رقمها" />
              </div>
              <div class="input_field full-field">
                <label class="field-text">نوعها                </label>
                <input type="text" value="{{ $table->kadiya_type }}" name="kadiya_type" placeholder="نوعها" required />
              </div>
              <div class="input_field full-field">
                <label class="field-text"> تاريخ تسلمها                </label>
                <input type="date" value="{{ $table->date_receive }}" name="date_receive" placeholder=" تاريخ تسلمها"  required />
            </div>
              <div class="input_field full-field">
                <label class="field-text"> اسم طالب الاجراء و من ينوب عنه                </label>
                <input type="text" value="{{ $table->taleb }}" name="taleb_lijra" placeholder=" طالب الاجراء و من ينوب عنه" required />
              </div>
              <div class="input_field full-field  ">
                <label class="field-text">اسم المطلوب ضده الاجراء و من ينوب عنه                </label>
                <input type="text" value="{{ $table->matlob }}" name="naib" required placeholder=" اسم المطلوب ضده الاجراء و من ينوب عنه " />
              </div>
              <div class="input_field full-field">
                <label class="field-text">تاريخ انجاز الاجراء                </label>
                <input type="date" value="{{ $table->date_ijraa }}" name="date_ijraa" placeholder="" />
            </div>
              <div class="input_field full-field">
                <label class="field-text"> تاريخ ارجاع الوثيقة                </label>
                <input type="date"value="{{ $table->watika_reciev }}" name="date_back" placeholder=""  />
             </div>
              <div class="input_field full-field">
                <label class="field-text" for="myfile"> اضافة وثيقة               </label>
                <input type="file" id="myfile" name="watika" placeholder=""  />
              </div>
              <div class="input_field full-field">
                <label class="field-text" for="myfile"> اضافة اشعار               </label>
                <input type="file" id="myfile" name="add_notif" placeholder="" />
              </div>
              <div class="input_field full-field">
                <label for="molahada "class="field-text"> ملاحظات</label>
                <textarea id="molahda" name="note"  rows="4" cols="50">"{{  $table->note }} </textarea>
              </div>
                <br/>
                <div class="sb-button">
                  <input class="button" type="submit" value="تعديل" />
                </div>
              </form>
              <div class="button-wrap">
                        <a href="/search"><button class="button" id="register-btn" >إلغاء</button></a>
                      </div>
            </div>
          </div>
        </div>
      </div>
    
</body>
@endsection
