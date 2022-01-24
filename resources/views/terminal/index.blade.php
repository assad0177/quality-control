@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="fs-5 fw-bold mb-1">{{ __('Dashboard') }}</h2>
                            <p>{{ __('You are logged in as Terminal !') }}</p>

                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <table class="table table-clear">
                                        <thead style="border-bottom:1px solid black">
                                            <th>Terminal Information</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="left"><strong>Terminal Username</strong></td>
                                                <td class="right">{{$terminal->username}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Client Name</strong></td>
                                                <td class="right">
                                                    {{$terminal->client->first_name."   ".$terminal->client->last_name}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Plan Name</strong></td>
                                                <td class="right">
                                                    {{$terminal->plan->name}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    @php
                                        $hash = Crypt::encryptString(json_encode(['c_id' => $terminal->client_id,'t_id' => $terminal->id]));
                                    @endphp
                                    {{$hash}}
                                    <p style="text-align: right">{{QrCode::size(200)->generate($hash);}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
