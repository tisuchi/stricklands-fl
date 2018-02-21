@extends('admin.main_login')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <a href="Admin/Welcome" class="login-logo"><img class="" width="80%" src="http://i.imgur.com/iDdBd7F.png" alt="branding logo"></a>
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Reset Your Password</span>
                  </h6>
                  @include('admin.partials.messages')
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" action="{{ route('reset-your-password') }}" method="post" id="login-form">
                      {!! csrf_field() !!}
                      
                      <?php
                        $url = Request::url();
                        $url = explode('/', $url);
                        $lastSegment = '';
                        if (count($url) > 1) {
                          $lastSegment = $url[count($url)-1];
                        }
                      ?>

                      <input type="hidden" name="hash" value="{{ $lastSegment }}">
                      
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg" id="password" name="password" minlength="6"
                        placeholder="Enter Password" required>
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg" id="password" name="password_confirmation" minlength="6"
                        placeholder="Enter Password Again" required>
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>
                      </fieldset>

                  	<div class="form-group">
						    
                <div class="card-footer">
                  <div class="">
                    {{-- <p class="float-sm-left text-center m-0"><a href="{{ route('forget-password') }}" class="card-link">Recover password</a></p> --}}
                    {{-- <p class="float-sm-right text-center m-0">New to Stack? <a href="register-simple.html" class="card-link">Sign Up</a></p> --}}
                  </div>
                </div>
                <label style="color:red;">
							
						</label>
					</div>	

                  	<div class="form-group row" style="display: none;">
                        <div class="col-md-6 col-12 text-center text-md-left">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me">Save Now</label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-12 text-center text-md-right">
                        	<a href="recover-password.html" class="card-link">Forgot Password?</a>
                        </div>
                  	</div>
                  	<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
              		</div>
                </div>
                
                <div class="card-footer" style="display: none;">
                  <div class="">
                    <p class="float-sm-left text-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p>
                    <p class="float-sm-right text-center m-0">New to Stack? <a href="register-simple.html" class="card-link">Sign Up</a></p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

@stop
