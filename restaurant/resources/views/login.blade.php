<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/app.css"/>
</head>
<body>
<form method="post" action="{{route('postLogin')}}">
    @csrf
    <div class="box">
        <h1>Login</h1>

        <input type="email" name="email" value="email" onFocus="field_focus(this, 'email');"
               onblur="field_blur(this, 'email');" class="email"/>

        <input type="password" name="password" value="password" onFocus="field_focus(this, 'email');"
               onblur="field_blur(this, 'email');" class="email"/>

        <span style="color:red;">
{{--            {{dd($errors)}}--}}
            @if($errors->any())
                {!! implode('', $errors->all('<div color:red>:message</div>')) !!}
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
            @endif
        </span>

        <input class="btn" type="submit" value="Login">

    </div> <!-- End Box -->

</form>
</body>
<script src="js/app.js" type="text/javascript"></script>
</html>
