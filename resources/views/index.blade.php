<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minesweeper</title>
</head>

<body>
    <div class="container">
        @foreach ($mines as $mine)
            @if ($mine->id % 10 === 1)
                <div class="row">
            @endif

            @if ($mine->is_opened)
                <div class="field">
                    {{ $mine->is_mine ? '💣' : $mine->mines_around }}
                </div>
            @else
                <a href="{{ route('click', $mine->id) }}">
                    <div class="field">
                        @if ($mine->is_opened)
                            {{ $mine->mines_around }}
                        @endif
                    </div>
                </a>
            @endif


            @if ($mine->id % 10 === 0)
    </div>
    @endif
    @endforeach
    </div>
</body>

</html>
