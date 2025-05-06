<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Calculator</title>
    <link rel="stylesheet" href="{{ asset('css/calculator.css') }}">
</head>

<body>
    <div class="calculator">
        <h1>Lara Calculator</h1>


        <form action="{{ route('calculate') }}" method="POST">
            @csrf
            <input type="number" name="number1" value="{{ old('number1') }}" placeholder="Enter first number" required>
            <input type="number" name="number2" value="{{ old('number2') }}" placeholder="Enter second number"
                required>

            <div class="buttons">
                <button type="submit" name="operator" value="+">+</button>
                <button type="submit" name="operator" value="-">-</button>
                <button type="submit" name="operator" value="*">*</button>
                <button type="submit" name="operator" value="/">/</button>
            </div>
        </form>

        @if (isset($result))
            <h2>Result: {{ $result }}</h2>
        @elseif (isset($error))
            <h2 style="color: red;">Error: {{ $error }}</h2>
        @endif

        @if (isset($number1) && isset($number2) && isset($operator))
            <h3>Value: {{ $number1 }} {{ $operator }} {{ $number2 }}</h3>
        @endif
    </div>
</body>

</html>
