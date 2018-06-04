
<div class="login-page">



    <link rel="stylesheet" type="text/css" href="{{asset('css/login2.css')}}">
    <div class="form">
        {!! Form::open(['route' => 'login.store','method' => 'POST','files' => true]) !!}

            <h2>{!! Form::label('App Ventas Login', 'App Ventas Login', ['class' => 'awesome']); !!}
            </h2>

            {!! Form::text('nickname',null,['class' => 'form-control','placeholder' => 'Nickname...','required' => 'required']) !!}

            {!! Form::password('contrasena', ['class' => 'awesome','placeholder' => 'Password','required' => 'required']); !!}

        {!! Form::submit('Login'); !!}

        @if(isset($expiro))
                <strong>Info!</strong> Su sesion expiro.
        @endif
        <p class="message">Not registered? <a href="#">Create an account</a></p>
            </div>


        {!! Form::close() !!}
    </div>
</div>










