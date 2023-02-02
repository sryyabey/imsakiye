@extends('layouts.frontend')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('İmsakiye Generator') }}</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <!-- reklam alanı -->
                    </div>
                    <hr>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control select2" name="country" id="country" >
                                <option value=""> --- </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control select2" name="city" id="city">
                                <option value=""> --- </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control select2" name="town" id="town">
                                <option value=""> --- </option>
                            </select>
                        </div>
                    </div>
<hr>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" id="tarih" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <input type="number" id="gun" max="31" class="form-control" placeholder="Day">
                        </div>
                    </div>

                    <hr>

                    <div class="row text-center">
                        <div class="col-md-3" >
                            <h4 id="townName"></h4>
                        </div>
                        <div class="col-md-3" >
                            <h4 id="cityName"></h4>
                        </div>
                        <div class="col-md-3" >
                            <h4 id="countryName"></h4>
                        </div>
                    </div>
                    <hr>

                    <div id="imsakiye" style="display:none">

                        <hr>
                        <table class="table table-striped" id="imsakiyeTable" >
                            <thead>
                            <tr>
                                <td>{{ trans('global.web.tarih') }}</td>
                                <td>{{ trans('global.web.imsak') }}</td>
                                <td>{{ trans('global.web.gunes') }}</td>
                                <td>{{ trans('global.web.ogle') }}</td>
                                <td>{{ trans('global.web.ikindi') }}</td>
                                <td>{{ trans('global.web.aksam') }}</td>
                                <td>{{ trans('global.web.yatsi') }}</td>
                            </tr>
                            </thead>
                            <tbody id=tableCl>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script src="{{ asset('js/salah.js') }}"></script>
@endsection
