<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Config::get('app.name')}} - Calculate</title>
</head>

<body>
    <form>
        <input type="number" name="number1" min="0" value="{{ $number1 }}">
        <select name="sign">
            @foreach($signs as $sign)
                <option
                        value="{{ $sign }}"
                        @selected($signInput == $sign)
                >{{ $sign }}</option>
            @endforeach
        </select>
        <input type="number" name="number2" min="0" value="{{ $number2 }}">
        <button type="submit">Calculate</button>
        Result: {{ $result }}
    </form>
</body>

</html>
