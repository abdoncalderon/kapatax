@extends('layouts.print')

@foreach ($folio->daily_reports as $dailyReport)

    {{-- HEADER --}}

    @section('header')

        <div class="logos">
            <div class="logo"><img src="{{ asset('images/setting/stakeholders/logos/'.stakeholder_logofile($dailyReport->folio->location->zone->project,1)) }}" class="logo-img"></div>
            <div class="logo"><img src="{{ asset('images/setting/stakeholders/logos/'.stakeholder_logofile($dailyReport->folio->location->zone->project,2)) }}" class="logo-img"></div>
            <div class="logo"><img src="{{ asset('images/setting/stakeholders/logos/'.stakeholder_logofile($dailyReport->folio->location->zone->project,3)) }}" class="logo-img"></div>
            <div class="logo"><img src="{{ asset('images/setting/stakeholders/logos/'.stakeholder_logofile($dailyReport->folio->location->zone->project,4)) }}" class="logo-img"></div>
        </div>
        <p class="projectTitle">{{ $dailyReport->folio->location->zone->project->name }}</p>
        <hr class="line">
        <p class="headerTitle">{{ __('messages.workbookdailyreport') }}</p>
        <hr class="line">

        <div class="details">
            <div>
                <div class="fields">{{ __('content.location') }}:</div>
                <div class="contents">{{ trim($dailyReport->folio->location->name) }}</div>
                {{-- <div class="fields"></div>
                <div class="contents"></div> --}}
            </div>
            <div>
                <div class="fields">{{ __('content.date') }}:</div>
                <div class="contents">{{ date('l d F Y',strtotime($dailyReport->folio->date)) }}</div>
                <div class="fields">{{ __('content.number') }}:</div>
                <div class="contents">{{ $dailyReport->folio->number }}</div>
            </div>
            <div>
                <div class="fields">{{ __('content.turn') }}:</div>
                <div class="contents">{{ $dailyReport->turn->name }}</div>
            </div> 
        </div>
        <hr class="line">

    @endsection


    {{-- CONTENT --}}

    @section('content')

        {{-- Report --}}

        <div class="section">
            <p class="sectionTitle">{{ __('content.activities') }}</p>
            <p class="report">{{ $dailyReport->report }}</p>
            
            {{-- Comments x Report --}}

            @if ($dailyReport->haveCommentsReport())

                <p class="comments">{{ __('content.comments') }}:</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-date">{{ __('content.date') }}</th>
                            <th class="td-comment">{{ __('content.comment') }}</th>
                            <th class="td-author">{{ __('content.author') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->comments as $commentDailyReport)
                            @if($commentDailyReport->section=='report')
                                <tr>
                                    <td class="td-date">{{ $commentDailyReport->dateComment }}</td>
                                    <td class="td-comment">{{ $commentDailyReport->comment }}</td>
                                    <td class="td-author">{{ $commentDailyReport->projectUser->user->person->fullName }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

            @endif
        </div>

        {{-- Positions --}}

        @if(count($dailyReport->positions)>0)

            <div class="section">
                <p class="sectionTitle">{{ __('content.positions') }}</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-stakeholder">{{ __('content.stakeholder') }}</th>
                            <th class="td-position">{{ __('content.position') }}</th>
                            <th class="td-quantity">{{ __('content.quantity') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->positions as $positionDailyReport)
                            <tr>
                                <td class="td-stakeholder">{{ $positionDailyReport->stakeholder->name }}</td>
                                <td class="td-position">{{ $positionDailyReport->position->name }}</td>
                                <td class="td-quantity">{{ $positionDailyReport->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Comments x Positions --}}

                @if ($dailyReport->haveCommentsPositions())
                    <p class="comments">{{ __('content.comments') }}:</p>
                    <table>
                        <thead>
                            <tr>
                                <th class="td-date">{{ __('content.date') }}</th>
                                <th class="td-comment">{{ __('content.comment') }}</th>
                                <th class="td-author">{{ __('content.author') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyReport->comments as $commentPosition)
                                @if($commentPosition->section=='positions')
                                    <tr>
                                        <td class="td-date">{{ $commentPosition->dateComment }}</td>
                                        <td class="td-comment">{{ $commentPosition->comment }}</td>
                                        <td class="td-author">{{ $commentPosition->projectUser->user->person->fullName }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        @endif

        {{-- Equipments --}}

        @if(count($dailyReport->equipments)>0)

            <div class="section">

                <p class="sectionTitle">{{ __('content.equipments') }}</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-stakeholder">{{ __('content.stakeholder') }}</th>
                            <th class="td-equipment">{{ __('content.equipment') }}</th>
                            <th class="td-quantity">{{ __('content.quantity') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->equipments as $equipmentDailyReport)
                            <tr>
                                <td class="td-stakeholder">{{ $equipmentDailyReport->stakeholder->name }}</td>
                                <td class="td-equipment">{{ $equipmentDailyReport->equipment->name }}</td>
                                <td class="td-quantity">{{ $equipmentDailyReport->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Comments x Equipments --}}

                @if ($dailyReport->haveCommentsEquipments())
                    <p class="comments">{{ __('content.comments') }}:</p>
                    <table>
                        <thead>
                            <tr>
                                <th class="td-date">{{ __('content.date') }}</th>
                                <th class="td-comment">{{ __('content.comment') }}</th>
                                <th class="td-author">{{ __('content.author') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyReport->comments as $commentEquipment)
                                @if($commentEquipment->section=='equipments')
                                    <tr>
                                        <td class="td-date">{{ $commentEquipment->dateComment }}</td>
                                        <td class="td-comment">{{ $commentEquipment->comment }}</td>
                                        <td class="td-author">{{ $commentEquipment->projectUser->user->person->fullName }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
                
            </div>

        @endif

        {{-- Events--}}

        @if(count($dailyReport->events)>0)

            <div class="section">
                <p class="sectionTitle">{{ __('content.events') }}</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-origin">{{ __('content.origin') }}</th>
                            <th class="td-start">{{ __('content.start') }}</th>
                            <th class="td-finish">{{ __('content.finish') }}</th>
                            <th class="td-description">{{ __('content.description') }}</th>
                            <th class="td-impact">{{ __('content.impact') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->events as $eventDailyReport)
                            <tr>
                                <td class="td-origin">{{ $eventDailyReport->cause }}</td>
                                <td class="td-start">{{ $eventDailyReport->start }}</td>
                                <td class="td-finish">{{ $eventDailyReport->finish }}</td>
                                <td class="td-description">{{ $eventDailyReport->description }}</td>
                                <td class="td-impact">{{ $eventDailyReport->haveImpact() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Comments x Events --}}

                @if ($dailyReport->haveCommentsEvents())
                    <p class="comments">{{ __('content.comments') }}:</p>
                    <table>
                        <thead>
                            <tr>
                                <th class="td-date">{{ __('content.date') }}</th>
                                <th class="td-comment">{{ __('content.comment') }}</th>
                                <th class="td-author">{{ __('content.author') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyReport->comments as $commentEvent)
                                @if($commentEvent->section=='events')
                                    <tr>
                                        <td class="td-date">{{ $commentEvent->dateComment }}</td>
                                        <td class="td-comment">{{ $commentEvent->comment }}</td>
                                        <td class="td-author">{{ $commentEvent->projectUser->user->person->fullName }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        @endif

        {{-- Attachments--}}

        @if(count($dailyReport->attachments)>0)

            <div class="section">
                <p class="sectionTitle">{{ __('content.attachments') }}</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-attachment">{{ __('content.attachment') }}</th>
                            <th class="td-description">{{ __('content.description') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->attachments as $attachmentDailyReport)
                            <tr>
                                <td class="td-attachment"><img src="{{ asset('images/agreement/dailyreports/attachments/'.$attachmentDailyReport->filename) }}" alt=""></td>
                                <td class="td-description">{{ $attachmentDailyReport->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Comments x Attachments --}}

                @if ($dailyReport->haveCommentsEvents())
                    <p class="comments">{{ __('content.comments') }}:</p>
                    <table>
                        <thead>
                            <tr>
                                <th class="td-date">{{ __('content.date') }}</th>
                                <th class="td-comment">{{ __('content.comment') }}</th>
                                <th class="td-author">{{ __('content.author') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyReport->comments as $commentAttachment)
                                @if($commentAttachment->section=='attachments')
                                    <tr>
                                        <td class="td-date">{{ $commentAttachment->dateComment }}</td>
                                        <td class="td-comment">{{ $commentAttachment->comment }}</td>
                                        <td class="td-author">{{ $commentAttachment->projectUser->user->person->fullName}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        @endif

        {{-- Notes--}}

        @if(count($folio->notes)>0)

            <div class="section">

                <p class="sectionTitle">{{ __('content.notes') }}</p>

                @foreach ($folio->notes as $note)
                    <table>
                        <thead>
                            <tr>
                                <th class="td-header">{{ __('content.date') }}</th>
                                <th class="td-header">{{ __('content.author') }}</th>
                                <th class="td-header">{{ __('content.note') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="td-date">{{ $note->date }}</td>
                                <td class="td-author">{{ $note->projectUser->user->person->fullName }}</td>
                                <td class="td-note">{{ $note->note }}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- Comments x Note --}}

                    @if ($note->haveComments())
                        <p class="comments">{{ __('content.comments') }}:</p>
                        <table>
                            <thead>
                                <tr>
                                    <th class="td-date">{{ __('content.date') }}</th>
                                    <th class="td-comment">{{ __('content.comment') }}</th>
                                    <th class="td-author">{{ __('content.author') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($note->comments as $comment)
                                    <tr>
                                        <td class="td-date">{{ $comment->dateComment }}</td>
                                        <td class="td-comment">{{ $comment->comment }}</td>
                                        <td class="td-author">{{ $comment->projectUser->user->person->fullName }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                @endforeach

            </div>

        @endif

        {{-- Signatures--}}
 
        <div class="section">

            <p class="sectionTitle">{{ __('content.signatures') }}</p>

            <table>
                <thead>
                    <tr>
                        <th class="td-signature-title">{{ __('messages.approvedby') }}</th>
                        <th class="td-signature-title">{{ __('messages.reviewedby') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-signature"><img src="{{ asset('images/people/signatures/'.$dailyReport->approver()->person->signature) }}" alt=""></td>
                        <td class="td-signature"><img src="{{ asset('images/people/signatures/'.$dailyReport->reviewer()->person->signature) }}" alt=""></td>
                    </tr>
                    <tr>
                        <td class="td-signature-name">{{ $dailyReport->approver()->person->fullName ?? '' }}</td>
                        <td class="td-signature-name">{{ $dailyReport->reviewer()->person->fullName ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="td-signature-name">{{ $dailyReport->approver()->stakeholder->name ?? '' }}</td>
                        <td class="td-signature-name">{{ $dailyReport->reviewer()->stakeholder->name ?? '' }}</td>
                    </tr>             
                </tbody>
            </table>

            
            
        </div>

    @endsection

    @section('footer')
    @endsection

@endforeach