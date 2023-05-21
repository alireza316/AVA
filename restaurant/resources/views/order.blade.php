<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/app.css"/>
</head>
<body>
<form method="POST" action="{{route('postMenu')}}">
    @csrf
    <div class="box-width500">
        <h5>Your order is :</h5>

        @foreach($data as $index=>$items)
            <H2>{{$index}} : {{$items}}</H2>
            @if($index == 'Cheese Burger' && array_key_exists('Burger Extra Cheese', $data))
                <H1>With extra cheese</H1>
            @endif
            @if($index == 'Cheese Burger' && array_key_exists('Burger Extra beef', $data))
                <H1>With extra beef</H1>
            @endif
            @if($index == 'Peperoni Pizza' && array_key_exists('Pizza Extra Cheese', $data))
                <H1>With extra cheese</H1>
            @endif
            @if($index == 'Peperoni Pizza' && array_key_exists('Pizza Extra beef', $data))
                <H1>With extra beef</H1>
            @endif
        @endforeach

        <input class="btn" type="submit" value="Submit Order">

    </div> <!-- End Box -->

</form>
</body>
<script src="js/app.js" type="text/javascript"></script>
</html>
