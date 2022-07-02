<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            width: 90%;
            margin: auto;
            background-color: lightgray;
        }

        .logos{
            padding: 1em;
        }

        .logo1{
            display: inline-block;
            width: 49%
        }

        .logo2{
            display: inline-block;
            width: 50%
        }
        
        .title{
            width: 100%;
            text-align: center;
            background-color: black;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 1.75rem;
            color: white;
        }

        .data{
            width: 100%;
            margin: 1rem;
        }

        .item{
            display: inline-block;
            width: 18%;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            vertical-align: top;
            margin: 0rem;
        }

        .value{
            display: inline-block;
            width: 78%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0rem;
        }

        .table {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table, th, td{
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table tr:nth-child(even){background-color: #f2f2f2;}

        .table tr:hover {background-color: #ddd;}

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .buttons {
            width: 100%;
            padding: 1rem;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            justify-content: center;
        }

        .button-approve{
            display: inline-flex;
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        .button-reject{
            display: inline-flex;
            background-color: #db441e; /* Green */
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="logos">
            <div class="logo1">
                <img src="{{ asset('documents/admin/logo/kapatax.png') }}" alt="logo" style="float: left;">
            </div>
            <div class="logo2">
                <img src="{{ asset('documents/admin/logo/kapatax.png') }}" alt="logo" style="float: right;">
            </div>
        </div>
        <div class="title">
            <h3>{{ __('messages.approvalRequest') }}</h3>
        </div>
        <hr>
        <div class="data">

            {{-- applicant --}}

            <div class="item">
                <p><strong>{{ __('content.applicant') }}</strong></p>
            </div>
            <div class="value">
                <p>{{ $needRequest->applicant->user->person->fullName }}</p>
            </div>

            {{-- zone --}}

            <div class="item">
                <p><strong>{{ __('content.zone') }}</strong></p>
            </div>
            <div class="value">
                <p>{{ $needRequest->location->zone->name }}</p>
            </div>

            {{-- location --}}

            <div class="item">
                <p><strong>{{ __('content.location') }}</strong></p>
            </div>
            <div class="value">
                <p>{{ $needRequest->location->name }}</p>
            </div>

            {{-- description --}}

            <div class="item">
                <p><strong>{{ __('content.description') }}</strong></p>
            </div>
            <div class="value">
                <p>{{ $needRequest->description }}</p>
            </div>

            {{-- expected cost --}}

            <div class="item">
                <p><strong>{{ __('messages.expectedCost') }}</strong></p>
            </div>
            <div class="value">
                <p>$ {{ $needRequest->expectedCost }}</p>
            </div>

        </div>

        <hr>

         {{-- items --}}

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 60%;">{{ __('content.reference') }}</th>
                        <th style="width: 10%; text-align: center;">{{ __('content.quantity') }}</th>
                        <th style="width: 10%; text-align: center;">{{ __('content.unity') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($needRequest->needRequestItems as $item)
                        <tr>
                            <td>{{ $item->reference }}</td>
                            <td style="text-align: center;">{{ $item->quantity }}</td>
                            <td style="text-align: center;">{{ $item->unity->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="buttons">
            <a class="button-approve" href="{{ route('myNeedRequest.approval',[$needRequest->id,3]) }}">{{  __('content.approve') }}</a> 
            <a class="button-reject" href="{{ route('myNeedRequest.approval',[$needRequest->id,2]) }}">{{  __('content.reject') }}</a>
        </div>
    </div>
    
    
</body>
</html>