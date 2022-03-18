<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($dailyReport->status==1)
        <h1><center>Kapatax - {{ __('messages.dailyreportReviewed') }}</center></h1>
    @else
        <h1><center>Kapatax - {{ __('messages.dailyreportApproved') }}</center></h1>
    @endif
    <p>{{ __('content.dailyreport') }} {{ __('content.of') }} {{ $dailyReport->folio->location->name }}</p>
    <p>{{ __('content.of') }} {{ $dailyReport->folio->date }}  {{ __('content.in') }}  {{ __('content.turn') }} {{ $dailyReport->turn->name }}</p>
    @if($dailyReport->status==1)
        <p>{{ __('messages.reviewedby').' '.$dailyReport->reviewer()->person->fullName }}</p>
    @else
        <p>{{ __('messages.approvedby').' '.$dailyReport->approver()->person->fullName }}</p>
    @endif
</body>
</html>