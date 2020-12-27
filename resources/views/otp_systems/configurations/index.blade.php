@extends('backend.layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Twillo Credential')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="twillo">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="TWILIO_SID">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('TWILIO SID')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="TWILIO_SID" value="{{  env('TWILIO_SID') }}" placeholder="TWILIO SID" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="TWILIO_AUTH_TOKEN">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('TWILIO AUTH TOKEN')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="TWILIO_AUTH_TOKEN" value="{{  env('TWILIO_AUTH_TOKEN') }}" placeholder="TWILIO AUTH TOKEN" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="TWILIO_VERIFY_SID">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('TWILIO VERIFY SID')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="TWILIO_VERIFY_SID" value="{{  env('TWILIO_VERIFY_SID') }}" placeholder="TWILIO VERIFY SID" >
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="VALID_TWILLO_NUMBER">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('VALID TWILLO NUMBER')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="VALID_TWILLO_NUMBER" value="{{  env('VALID_TWILLO_NUMBER') }}" placeholder="VALID TWILLO NUMBER" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Nexmo Credential')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="nexmo">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="NEXMO_KEY">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('NEXMO KEY')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="NEXMO_KEY" value="{{  env('NEXMO_KEY') }}" placeholder="NEXMO KEY" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="NEXMO_SECRET">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('NEXMO SECRET')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="NEXMO_SECRET" value="{{  env('NEXMO_SECRET') }}" placeholder="NEXMO SECRET" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('SSL Wireless Credential')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="ssl_wireless">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="SSL_SMS_API_TOKEN">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('SSL SMS API TOKEN')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SSL_SMS_API_TOKEN" value="{{  env('SSL_SMS_API_TOKEN') }}" placeholder="SSL SMS API TOKEN" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="SSL_SMS_SID">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('SSL SMS SID')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SSL_SMS_SID" value="{{  env('SSL_SMS_SID') }}" placeholder="SSL SMS SID" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="SSL_SMS_URL">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('SSL SMS URL')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SSL_SMS_URL" value="{{  env('SSL_SMS_URL') }}" placeholder="SSL SMS URL" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Fast2SMS Credential')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="fast2sms">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="AUTH_KEY">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('AUTH KEY')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="AUTH_KEY" value="{{  env('AUTH_KEY') }}" placeholder="AUTH KEY" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="ROUTE">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('ROUTE')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="demo-select2" name="ROUTE" required>
                                    <option value="p" @if (env('ROUTE') == "p") selected @endif>Promotional Use</option>
                                    <option value="t" @if (env('ROUTE') == "t") selected @endif>Transactional Use</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="LANGUAGE">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('LANGUAGE')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="demo-select2" name="LANGUAGE" required>
                                    <option value="english" @if (env('LANGUAGE') == "english") selected @endif>English</option>
                                    <option value="unicode" @if (env('LANGUAGE') == "unicode") selected @endif>Unicode</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="types[]" value="SENDER_ID">
                            <div class="col-lg-3">
                                <label class="control-label">{{__('SENDER ID')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="SENDER_ID" value="{{  env('SENDER_ID') }}" placeholder="6 digit SENDER ID" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
