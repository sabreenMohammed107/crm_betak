
@include('layouts.head')


<body class="ms-body   ms-primary-theme ms-has-quickbar">
    <div class="row no-gutters justify-content-center login-wrapper">
        <div class="col-md-6 col-10">
            <div class="login mt-5 p-5 bg-white">
                <div class="logo mb-4">
                    <img src="{{ asset('public/assets/img/logo.png') }}" class="img-fluid" alt="">
                </div>
                <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate="">
                    <div class="mb-3">

                        @csrf

                          <label for="email">Your Email</label>
                          <div class="input-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" value="{{ old('email') }}" required required="">
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="password">Your Password</label>
                          <div class="input-group">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" required="">
                          </div>
                        </div>

                        @if($errors->has('email'))
                        <p class="text-center" style="color: red">
                            {{ $errors->first('email') }}
                        </p>
                        @endif

                        <button class="btn btn-primary mt-4 d-block w-100" type="submit">Log In</button>
                 </form>
            </div>
        </div>
    </div>

@include('layouts.footer')
