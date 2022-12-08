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
      .form_wrapper span{
        font-size:12px;
        position: relative;
        right:110px;
        color:red;
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
                <h1>انشاء حساب خاص</h1>
              </div>
              <div class="row clearfix">
                <div class="">
                  <form  method="POST" action="{{ route('register') }}">
                     @csrf 
                     <div class="input_field full-field ">
                        <label class="field-text"> الإسم الكامل</label>
                        <input type="text" name="name" placeholder=" الإسم الكامل" class="@error('name') error @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus />
                      </div>
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                       </span>
                        @enderror
                        <div class="input_field full-field ">
                        <label class="field-text"> البريد الالكتروني</label>
                        <input type="text" name="email" placeholder=" البريد الالكتروني" class="@error('email') error @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />
                      </div>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                       </span>
                        @enderror
                        <div class="input_field full-field ">
                        <label class="field-text"> إسم المستعمل</label>
                        <input type="text" name="username" placeholder="  إسم المستعل" class="@error('username') error @enderror" value="{{ old('username') }}" required autocomplete="username" autofocus />
                      </div>
                      @error('username')
                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                       </span>
                        @enderror

                      <div class="input_field full-field ">
                        <label class="field-text"> كلمة السر</label>
                        <input type="password" class="@error('password') error @enderror" name="password" placeholder="كلمة السر" value="{{ old('password') }}" required autocomplete="current-password" />
                      </div>
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="input_field full-field ">
                        <label class="field-text">إعادة كلمة السر </label>
                        <input id="password-confirm" type="password" placeholder="إعادة كلمة السر" name="password_confirmation" required autocomplete="new-password" />
                      </div>
 
                      <div class="sb-button">
                        <input class="button" type="submit" value=" انشاء حساب" />
                      </div>


                  </form>
                  <div class="button-wrap">
                      <a href="/login"><button class="button" id="login-btn" >تسجيل الدخول</button></a>
                      </div>
                </div>
              </div>
        <div>
    </div>
</body>
@endsection
