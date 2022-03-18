<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><center>Kapatax - {{ __('messages.noteIssued')}}</center></h1>
    <p>{{ __('content.note') }} {{ __('content.of') }} {{ $note->folio->location->name }}</p>
    <p>{{ __('content.of') }} {{ $note->folio->date }}  {{ __('content.in') }}  {{ __('content.turn') }} {{ $note->turn->name }}</p>
    <p>{{ __('messages.madeby') }} {{ $note->projectUser->user->person->fullName }}</p>
    <p>{{ __('content.say') }}:</p>
    <p>{{ $note->note }}</p> 

</body>
</html>