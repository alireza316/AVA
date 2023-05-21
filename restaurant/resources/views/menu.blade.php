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
        <h5>Menu</h5>

        @foreach($data as $index=>$items)
            <H1>{{$index}}</H1>
            @foreach($items as $item)
                <H3>{{$item['name']}}</H3>
                @foreach(json_decode($item['toppings']) as $topping)
                {{$topping}}
                @endforeach
            @if($index == 'Burger')
                <br>
                    <input type="checkbox" id="ext-cheese-br" name="ext-cheese-{{$item['name']}}" value="ext-cheese-br">
                    <label for="ext-cheese-br"> Extra cheese</label>
                    <br>
                    <input type="checkbox" id="ext-beef-br" name="ext-beef-{{$item['name']}}" value="ext-beef-br">
                    <label for="ext-beef-br"> Extra beef</label><br>
                @elseif($index == 'Pizza')
                    <br>
                    <input type="checkbox" id="ext-cheese-pz" name="ext-cheese-{{$item['name']}}" value="ext-cheese-pz">
                    <label for="ext-cheese-pz"> Extra cheese</label>
                    <br>
                    <input type="checkbox" id="ext-beef" name="ext-beef-{{$item['name']}}" value="ext-beef">
                    <label for="ext-beef"> Extra beef</label><br>
                @endif
            <br>
                <input type="text" name="qty-{{$index}}-{{$item['name']}}" placeholder="0" style="width: 10px"  onFocus="field_focus(this, 'quantity');"
                       onblur="field_blur(this, 'quantity');" class="email"/>
                <hr style="width: 50%;border: 1px solid red">
            @endforeach
            <hr>
        @endforeach

        <input class="btn" type="submit" value="Submit Order">

    </div> <!-- End Box -->

</form>
</body>
<script src="js/app.js" type="text/javascript"></script>
</html>
