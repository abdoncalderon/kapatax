<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><center>JBOOK - {{ __('content.dailyReport') }}</center></h1>
    <p>{{ __('content.dailyReport') }} {{ __('content.of') }} {{ $dailyReport->folio->location->name }}</p>
    <p>{{ __('content.of') }} {{ $dailyReport->folio->date }}  {{ __('content.in') }}  {{ __('content.turn') }} {{ $dailyReport->turn->name }}</p>
    @if($dailyReport->status==1)
        <p>{{ __('messages.revieweddby').' '.$dailyReport->reviewer() }}</p>
    @else
        <p>{{ __('messages.approvedby').' '.$dailyReport->approver() }}</p>
    @endif
</body>
</html>