@extends('layout.app')

<script src="{{ asset('js/moment/moment.js') }}" defer></script>

<script src="{{ asset('js/moment/moment-hijri.js') }}" defer></script>

<script type="text/javascript">
   onload=function(){
        dayjs().format()
        const TimeA=document.getElementById('TimeA');
        const TimeB=document.getElementById('TimeB');
        const Wifeinputs=document.querySelectorAll('div.wife-field');
        let Wifestatus=false, Childstatus=false, Time=0,months=0, Wifetotal= 0, Childstotal=0;
        const Childinputs=document.querySelectorAll('div.childs-field');
        const Alfitr = document.getElementById('AidAlfitr');
        const Aaldha= document.getElementById('AidAladha');
        const Numberofchild=document.getElementById('Numberofchil');
        const Childsmoney=document.getElementById('Childsmoney');
        const HouseMoney=document.getElementById('Housemoney');
        let lAsel=document.getElementById('lAsel');
        let mofawed=document.getElementById('mofawed');
        let Saar=document.getElementById('saar');
        let tva=document.getElementById('TVA');
        const wajiblkhazina=document.getElementById('wajiblkhazina');
        let total=document.getElementById('total');
        const ZawjaNafaka =document.getElementById('zawja-nafaka');
        const Motaa =document.getElementById('motaa');
        const Sidak =document.getElementById('sidak');
        const lIida =document.getElementById('l2ida');
        const Nafaka_child = document.getElementById('nafaka_child');
        const Saken = document.getElementById('saken');
        const Lhadana = document.getElementById('lhadana');
        const AladhaVal = document.getElementById('aladha');
        const AlfitrVal = document.getElementById('alfitr');


        let checkboxWife=document.querySelector('#checkboxWife label');
        let checkboxChilds=document.querySelector('#checkboxChilds label');
        checkboxWife.addEventListener('click',()=>{
          Wifestatus=!Wifestatus;
            Wifeinputs.forEach(item=>{
              item.classList.toggle('whidden')
            })
        })

        checkboxChilds.addEventListener('click',()=>{
          Childstatus=!Childstatus;
          Childinputs.forEach(item=>{
            item.classList.toggle('chidden');
          })
        })
         /****
         *working a little bit on Islamic aka Hijri date
         * 
         * */
    
          const Hijri_year=moment(new Date()).iYear();

          /***
           * The first day of Shawwāl is Eid al-Fitr,
           */

          const AidAlfitr=moment(`${Hijri_year}/10/1`, 'iYYYY/iM/iD');

          /*
           * Eid al-Adha is celebrated on the same date
           * every year: 12/10 
           * (the 10th day of the 12th lunar month, Dhul-Hijjah).
           * */
          const AidAladha=moment(`${Hijri_year}/12/10`, 'iYYYY/iM/iD');
          
        function AidCalcUltor(){
          if( TimeA.value && TimeB.value){  

               const CheckingAidalfitr=moment(AidAlfitr).isBetween(TimeA.value, TimeB.value);
               const CheckingAidaladha=moment(AidAladha).isBetween(TimeA.value, TimeB.value);

               if(CheckingAidaladha ){
                 Aaldha.classList.remove('aidhidden');
               }
               else{
                Aaldha.classList.add('aidhidden');
               }

               if(CheckingAidalfitr){
                Alfitr.classList.remove('aidhidden');
               }
               else{
                Alfitr.classList.add('aidhidden');
               }
            }

            }

             /*****Here we calculate wife money if the checkbox has been clicked ***/
            function CalculWife(){
              if(Wifestatus){
              Wifetotal=Number(ZawjaNafaka.value) + Number(Motaa.value) + Number(Sidak.value)+ Number(lIida.value);
              }
              else{
                Wifetotal=0;
              }
            }
          
            ZawjaNafaka.addEventListener('change',(event)=>{
               CalculWife();
            })

            Motaa.addEventListener('change',(event)=>{
              CalculWife();
            })

            Sidak.addEventListener('change',(event)=>{
              CalculWife();
            })

            lIida.addEventListener('change',(event)=>{
              CalculWife();
            })
           /*******Here we end wife calculation *******/
           /*********Childs money calculation *******/
           function CalculChild(){
            if(Childstatus){
              Childstotal=Number(Nafaka_child.value) + Number(Saken.value) + Number(Lhadana.value)+ Number(AladhaVal.value) + Number(AlfitrVal.value);
              console.log(Childstotal);
            }
              else{
                Childstotal=0;
                console.log(Childstotal);  
              }
           }
       
           Nafaka_child.addEventListener('change',(event)=>{
               CalculChild();
            })

            Saken.addEventListener('change',(event)=>{
              CalculChild();
            })

            Lhadana.addEventListener('change',(event)=>{
              CalculChild();
            })

            AladhaVal.addEventListener('change',(event)=>{
              CalculChild();
            })

            AlfitrVal.addEventListener('change',(event)=>{
              CalculChild();
            })



           /***************end of child calculation ****/
         function Timecalcul(){
          if( TimeA.value && TimeB.value){
            Time= dayjs(TimeB.value);
            months= Math.abs(Time.diff(TimeA.value, 'month', true)).toFixed(2); 
          }
          if( (months && Wifestatus) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
            LAselfunc();
          }
         }

         TimeA.addEventListener('change',()=>{
          Timecalcul();
         AidCalcUltor();
        }) 

        TimeB.addEventListener('change',()=>{
           Timecalcul();
           AidCalcUltor();
        })

      /**  WifeMoney.addEventListener('change',()=>{
          if( (months && Wifestatus) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
            LAselfunc();
          }
        })**/
        Numberofchild.addEventListener('change',()=>{
          if( (months && Wifetotal) && Childstotal && Numberofchild.value){
            LAselfunc();
          }
        })

        Saar.addEventListener('change',()=>{
          if( (months && Wifetotal) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
            LAselfunc();
          }
        })
        lAsel.addEventListener('change',function(){
             if(!this.value){
              LAselfunc();
             }
        });
         
        function LAselfunc(){
          let lAselam;
          lAsel.value=lAselam=(months*( Wifestatus ? Wifetotal : 1) )+(months* ( Childstatus ? Childstotal : 1 )*Numberofchild.value);
          lAsel.value=(Number(lAsel.value).toFixed(2))+' درهم ';
        
          if((Number(lAselam)>20001)){
            mofawed.value=Math.round(800+((Number(lAselam)-20000)*0.02));

            if( Number(mofawed.value)>10000){
              mofawed.value=10000;
            }
          }

          if((Number(lAselam)<20001)){
            mofawed.value=Math.round(270+((Number(lAselam)-6000)*0.03));
          }

          if((Number(lAselam)<6001)){
            mofawed.value=Math.round(150+((Number(lAselam)-3000)*0.04));
           }

           if((Number(lAselam)<3001)){
            mofawed.value=150;
          }
  
          if(lAselam &&(mofawed.value)){
            tva.value=Number(mofawed.value)*0.10;

            tva.value=Math.round((Number(tva.value).toFixed(2)));
          }
          if(Number(lAselam) &&Number(Saar.value)){
             wajiblkhazina.value=(Number(lAselam)+Number(Saar.value))/200;
          }

          if(mofawed.value && lAselam && Number(Saar.value) && Number(tva.value) && Number(Saar.value)){
            total.value =Number(mofawed.value)+Number(Saar.value)+Number(tva.value)+lAselam+Number(wajiblkhazina.value);
            total.value=(Number(total.value).toFixed(2)) +' درهم ';
          }
        } 
      }
    </script>
</script>
<style type="text/css">
form .whidden{
  display: none !important;
  visibility: hidden;

}

form .chidden{
  display: none !important;
  visibility: hidden;

}

form .aidhidden{
  display: none !important;
  visibility: hidden;
}
</style>
@section('content')
<body>
    <div class="form_wrapper">
        <div class="form_container">
          <div class="title_container">
            <h1>تنفيد</h1>
          </div>
          <div class="row clearfix">
            <div class="">
              <form>
                <div class="input_field">
                    <h2>معطيات ملف التنفيد</h2>
                </div>
                <div class="input_field full-field select_option">
                  <label class="field-text">موضوع ملف التنفيد</label>
                  <div class="select_arrow" ></div>
                    <select>
                      <option>... اختيار</option>
                      <option>النفقة</option>
                      <option>موضوع 2</option>
                    </select>
                </div>
                <div class="input_field full-field">
                    <label class="field-text">تاريخ الحكم</label>
                    <input type="date" name="tarikh_hokm" placeholder="Password" required />
                </div>
                <div class="input_field checkbox_option">
                   <div id="checkboxWife" class="checkbox-opt">
                   <p class="field-text">نفقة الزوجة</p>
                    <input type="checkbox" id="cb4">
                    <label  for="cb4" class="field-text"></label>
                   </div>
                   <div id="checkboxChilds" class="checkbox-opt">
                   <p class="field-text">نفقة الأبناء</p>
                    <input type="checkbox" id="cb5">
                    <label  for="cb5" class="field-text"></label>
                   </div>
                </div>
              
               <div  class="input_field full-field wife-field whidden">
                <label class="field-text">نفقة الزوجة</label>
                <input type="number" id="zawja-nafaka" name="zawja-nafaka" placeholder="النفقة بالدرهم" />
              </div>
              <div  class="input_field full-field wife-field whidden">
                <label class="field-text">المتعة</label>
                <input type="number" id="motaa" name="motaa" placeholder="المتعة بالدرهم" />
              </div>
              <div  class="input_field full-field wife-field whidden">
                <label class="field-text">كالئ الصداق</label>
                <input type="number" id="sidak" name="sidak" placeholder="كالئ الصداق بالدرهم" />
              </div>
              <div  class="input_field full-field wife-field whidden">
                <label class="field-text">السكن أثناء العدة</label>
                <input type="number" id="l2ida" name="l2ida" placeholder="السكن أثناء العدة بالدرهم" />
              </div>
              <div  class="input_field full-field childs-field chidden">
                <label class="field-text">نفقة الأبناء</label>
                <input type="number" name="nafaka_child" id="nafaka_child" placeholder="بالدرهم" required />
              </div>
              <div  class="input_field full-field childs-field chidden">
                <label class="field-text"> السكن</label>
                <input type="number" name="saken" id="saken" placeholder="بالدرهم" required />
              </div>
              <div  class="input_field full-field childs-field chidden">
                <label class="field-text"> الحضانة</label>
                <input type="number" name="lhadana" id="lhadana" placeholder="بالدرهم" required />
              </div>
              <div  id="AidAladha" class="input_field full-field childs-field chidden aidhidden">
                <label class="field-text"> الأعياد: عيد الأضحى*</label>
                <input type="number" name="aladha" id="aladha" placeholder="بالدرهم" required />
              </div>
              <div id="AidAlfitr" class="input_field full-field childs-field chidden aidhidden">
                <label class="field-text"> الأعياد: عيد الفطر*</label>
                <input type="number" id="alfitr" name="alfitr" placeholder="بالدرهم" required />
              </div>
               <div class="input_field full-field childs-field chidden">
                <label class="field-text">عدد الأبناء</label>
                <input type="number" name="Numberofchild" id="Numberofchil" placeholder=" الأبناء" required />
              </div>    
            <div class="input_field full-field">
                <label class="field-text">تاريخ بداية التنفيد</label>
                <input type="date" id="TimeA" name="TimeA" placeholder="Password" required />
             </div>
            <div class="input_field full-field">
              <label class="field-text">تاريخ نهاية التنفيد</label>
              <input type="date" id="TimeB" name="timeB" placeholder="Password" required />
             </div>
              <div class="input_field full-field  ">
                <label class="field-text"> الاصل</label>
                <input type="text" name="lAsel" disabled id="lAsel" placeholder="00.00 درهم " />
              </div>
              <div class="input_field full-field">
                <label class="field-text"> الصائر</label>
                <input id="saar" type="number" name="saar" placeholder="بالدرهم" required />
              </div>
              <div class="input_field full-field">
                <label class="field-text"> اتعاب المفوض</label>
                <input type="text" id="mofawed" disabled name="mofawed" placeholder="00.00 درهم " />
              </div>
              <div class="input_field full-field">
                <label class="field-text"> واجب الخزينة</label>
                <input type="text" id="wajiblkhazina" disabled name="wajiblkhazina" placeholder="00.00 درهم " />
              </div>
              <div class="input_field full-field">
                <label class="field-text"> TVA</label>
                <input type="text" disabled id="TVA" name="tva" placeholder="00.00 درهم " />
              </div>
              <div class="input_field full-field">
                <label class="field-text"> المجموع</label>
                <input type="text"  id="total" disabled  placeholder="00,00 درهم" required />
              </div>
                <div class="sb-button">
                  <input class="button" type="submit" value="طبع" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    
</body>
@endsection