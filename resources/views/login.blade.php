@extends('layout.app')
<style type="text/css">
        #login{
          display: flex;
        }
        

      div.form_wrapper .input_field{
        margin-top:20px;
        margin-bottom: 15px;
        display: flex;
      align-items: center;
      }

      div.form_wrapper{
        width: 30%;
        border-radius: 8px;
        margin-top:100px;
        padding-left:0;
      }
      div.form_container{
        padding-left:0;
      }
      div.form_wrapper input[type=text],
      div.form_wrapper input[type=password],
      div.form_wrapper input[type=email]{
         width: 90%;
      }
      label.field-text{
        width: 40%; 
        margin-left: 10px;
      }
      .form_wrapper span.error{
        font-size:12px;
        color:red;
        margin-right:110px;
        margin-top:0;
        margin-bottom:14px;
      }
       .input_field input.error{
        box-shadow:0 0 2px 1px red;
      }
</style>
@section('content')

<body id="login">
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h1>تسجيل الدخول</h1>
              </div>
              <div class="row clearfix">
                <div class="">
                  <form  action="{{ route('login.check') }}" method="POST">
                     @csrf 
                     <div class="input_field full-field ">
                        <label class="field-text"> اسم المستعمل</label>
                        <input type="text" name="username" placeholder="اسم المستعمل" class="@error('username') error @enderror" value="{{ old('username') }}" required autocomplete="username" autofocus />
                      </div>
                      @error('username')
                      <span class="error" role="alert">
                                        <strong>{{ $message }}</strong>
                       </span>
                        @enderror

                      <div class="input_field full-field ">
                        <label class="field-text"> كلمة السر</label>
                        <input type="password" class="@error('password') error @enderror" name="password" placeholder="كلمة السر" value="{{ old('password') }}" required autocomplete="password" />
                      </div>
                      @error('password')
                                    <span class="error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
 
                      <div class="sb-button">
                        <input class="button" type="submit" value="تسجيل الدخول" />
                      </div>


                  </form>
                  <div class="button-wrap">
                        <a href="/register"><button class="button" id="register-btn" >إنشاء حساب</button></a>
                      </div>
                </div>
              </div>
        <div>
    </div>
</body>
@endsection
