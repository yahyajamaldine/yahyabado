@extends('layout.app')
<script type="text/javascript">
   onload=function(){
        dayjs().format()
        const TimeA=document.getElementById('TimeA');
        const TimeB=document.getElementById('TimeB');
        const WifeMoney=document.getElementById('WifeMoney');
        const Numberofchild=document.getElementById('Numberofchil');
        const Childsmoney=document.getElementById('Childsmoney');
        const HouseMoney=document.getElementById('Housemoney');
        let Wifestatus=false;
        let lAsel=document.getElementById('lAsel');
        let mofawed=document.getElementById('mofawed');
        let Saar=document.getElementById('saar');
        let tva=document.getElementById('TVA');
        let Time=0,months=0;
        const wajiblkhazina=document.getElementById('wajiblkhazina');
        let total=document.getElementById('total');

        let checkboxBefore=document.querySelector('.checkbox_option label');
        checkboxBefore.addEventListener('click',()=>{
          Wifestatus=!Wifestatus;
          WifeMoney.disabled=!Wifestatus;
        })
       
         function Timecalcul(){
          if( TimeA.value && TimeB.value){
            Time= dayjs(TimeB.value);
            months= Math.abs(Time.diff(TimeA.value, 'month', true)).toFixed(2); 
          }
          if( (months && WifeMoney.value) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
            LAselfunc();
          }
         }

         TimeA.addEventListener('change',()=>{
           Timecalcul();
        }) 

        TimeB.addEventListener('change',()=>{
          Timecalcul();
        })

        WifeMoney.addEventListener('change',()=>{
          if( (months && WifeMoney.value) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
            LAselfunc();
          }
        })
        Numberofchild.addEventListener('change',()=>{
          if( (months && WifeMoney.value) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
            LAselfunc();
          }
        })

        Childsmoney.addEventListener('change',()=>{
          if( (months && WifeMoney.value) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
            LAselfunc();
          }
        })

        HouseMoney.addEventListener('change',()=>{
          if( (months && WifeMoney.value) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
            LAselfunc();
          }
        })
        Saar.addEventListener('change',()=>{
          if( (months && WifeMoney.value) && (Childsmoney.value && HouseMoney.value) && Numberofchild.value){
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
          lAsel.value=lAselam=(months*( Wifestatus ? Number(WifeMoney.value) : 1) )+((months* Number(Childsmoney.value))*Numberofchild.value) +  Number(HouseMoney.value);
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
                    <input type="date" name="password" placeholder="Password" required />
                </div>
                <div class="input_field checkbox_option">
                    <p class="field-text">نفقة الزوجة</p>
                    <input type="checkbox" id="cb4">
                    <label  for="cb4" class="field-text"></label>
                </div>
                <div class="input_field full-field">
                  <label class="field-text">تاريخ بداية التنفيد</label>
                  <input type="date" id="TimeA" name="TimeA" placeholder="Password" required />
               </div>
              <div class="input_field full-field">
                <label class="field-text">تاريخ نهاية التنفيد</label>
                <input type="date" id="TimeB" name="timeB" placeholder="Password" required />
               </div>
               <div class="input_field full-field">
                <label class="field-text">النفقة الواجبة للزوجة شهريا</label>
                <input type="number" id="WifeMoney" name="WifeMoney" placeholder="بالدرهم" disabled/>
              </div>
              <div class="input_field full-field">
                <label class="field-text">عدد الأبناء</label>
                <input type="number" name="Numberofchild" id="Numberofchil" placeholder=" الأبناء" required />
              </div>
              <div class="input_field full-field">
                <label class="field-text"> نفقة الأبناء</label>
                <input type="number" name="Childsmoney" id="Childsmoney" placeholder="بالدرهم" required />
              </div>
              <div class="input_field full-field">
                <label class="field-text"> السكن سنويا</label>
                <input type="number" name="Housemoney" id="Housemoney" placeholder="بالدرهم" required />
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