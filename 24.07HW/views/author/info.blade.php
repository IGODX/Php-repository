<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- <h2>{{ $id }} {{ $author['firstname'] }} {{ $author['surname'] }}</h2> --}}
    <h2>{{ $id }} {{ $author->firstname }} {{ $author->surname }}</h2>
    @forelse ($books as $book)
        <div>{{ $book->title }}</div>
    @empty
        <div>There are no books of this author!</div>
    @endforelse
</body>

</html>
