
@extends('layout/base')
@section('register')
  <meta name="csrf-token" content="{{ csrf_token() }}" >
  <link rel ="stylesheet" href={{ URL::asset('css/register.css') }}>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6" style="position: relative">
            <h1 class="heading-register" >Tạo Tài Khoản</h1>
        </div>
        <div class="col-md-4 offset-md-1 ">
          <div class="alert alert-success hiden" style="display: none">
              <p id="success"></p>
          </div>
            <form method="POST"  action=" {{ route("check_register") }}"  id="register-form">
              <div class="form-group">
                <label for="fullname">Họ tên</label>
                <input type="text" name="name" id="fullname" class="form-control" placeholder="Ho ten" aria-describedby="helpId">
                <small id="form-message" class="text"></small>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                <label class="form-check-label" for="inlineRadio1">Nam</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                <label class="form-check-label" for="inlineRadio2">Nữ</label>
              </div>
              <div class="form-group">
                <label for="date">Ngày </label>
                <input type="text" name="date" id="date" class="form-control" placeholder="dd//mm//yy" aria-describedby="helpId">
                <small id="form-message" class="text"></small>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId">
                <small id="form-message" class="text"></small>
              </div>
              <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Mật Khẩu" aria-describedby="helpId">
                <small id="form-message" class="text"></small>
              </div>
              <div class="form-group">
                <label for="confirmPass">Nhập lại mật khẩu</label>
                <input type="password" name="confirmPass" id="confirmPass" class="form-control" placeholder="Nhập lại mật khẩu" aria-describedby="helpId">
                <small id="form-message" class="text"></small>
              </div>
              <p>This site is protected by reCAPTCHA and the Google <span><a href ="https://policies.google.com/privacy">Privacy Policy</a></span> and <span><a href="https://policies.google.com/terms">Terms of Service</a></span> apply.</p>
              <button  type="submit" class="btn btn-primary">Đăng kí</button>
            </form>
        </div>
      </div>
    </div>
  </section>
  <script type="module" src="{{ URL::asset('js/validator.js') }}"></script> 
  <script type="module" src="{{ URL::asset('js/registerJS.js') }}"></script> 
@endsection
  