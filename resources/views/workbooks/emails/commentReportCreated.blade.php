<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><center>Kapatax - {{ __('content.comment') }}</center></h1>
    <p>{{ $comment->dailyReport->folio->location->name }}</p>
    <p>{{ $comment->dailyReport->turn->name }}</p>
    <p>{{ $comment->date }}</p>
    <p>{{ $comment->section }}</p>
    <p>{{ $comment->comment }}</p>
    <p>{{ $comment->user->person->fullName }}</p>

</body>
</html>