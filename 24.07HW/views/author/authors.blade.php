<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>{{ $title }}</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Firstname</th>
                <th>Surname</th>
                <th>Year of birth</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td> {{ $author->id }}</td>
                    <td> {{ $author->firstname }}</td>
                    <td> {{ $author->surname }}</td>
                    <td> {{ $author->yearOfBirth }}</td>
                    <td><a href="/authors/{{ $author->id }}">Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
