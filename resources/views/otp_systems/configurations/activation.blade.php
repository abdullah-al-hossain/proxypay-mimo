@extends('backend.layouts.app')

@section('content')

    <h3 class="text-center">{{__('Activate OTP')}}</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Nexmo OTP')}}</h3>
                </div>
                <div class="panel-body text-center">
                    <label class="switch">
                        <input type="checkbox" onchange="updateSettings(this, 'nexmo')" @if(\App\OtpConfiguration::where('type', 'nexmo')->first()->value == 1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Twillo OTP')}}</h3>
                </div>
                <div class="panel-body text-center">
                    <label class="switch">
                        <input type="checkbox" onchange="updateSettings(this, 'twillo')" @if(\App\OtpConfiguration::where('type', 'twillo')->first()->value == 1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('SSL Wireless OTP')}}</h3>
                </div>
                <div class="panel-body text-center">
                    <label class="switch">
                        <input type="checkbox" onchange="updateSettings(this, 'ssl_wireless')" @if(\App\OtpConfiguration::where('type', 'ssl_wireless')->first()->value == 1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Fast2SMS OTP')}}</h3>
                </div>
                <div class="panel-body text-center">
                    <label class="switch">
                        <input type="checkbox" onchange="updateSettings(this, 'fast2sms')" @if(App\OtpConfiguration::where('type', 'fast2sms')->first() != null && \App\OtpConfiguration::where('type', 'fast2sms')->first()->value == 1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Mimo OTP')}}</h3>
                </div>
                <div class="panel-body text-center">
                    <label class="switch">
                        <input type="checkbox" onchange="updateSettings(this, 'mimo')" @if(App\OtpConfiguration::where('type', 'mimo')->first() != null && \App\OtpConfiguration::where('type', 'fast2sms')->first()->value == 1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-center">{{__('OTP will be Used For')}}</h3>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Order Placement')}}</h3>
                </div>
                <div class="panel-body text-center">
                    <label class="switch">
                        <input type="checkbox" onchange="updateSettings(this, 'otp_for_order')" @if(\App\OtpConfiguration::where('type', 'otp_for_order')->first()->value == 1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Delivery Status Changing Time')}}</h3>
                </div>
                <div class="panel-body text-center">
                    <label class="switch">
                        <input type="checkbox" onchange="updateSettings(this, 'otp_for_delivery_status')" @if(\App\OtpConfiguration::where('type', 'otp_for_delivery_status')->first()->value == 1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Paid Status Changing Time')}}</h3>
                </div>
                <div class="panel-body text-center">
                    <label class="switch">
                        <input type="checkbox" onchange="updateSettings(this, 'otp_for_paid_status')" @if(\App\OtpConfiguration::where('type', 'otp_for_paid_status')->first()->value == 1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function updateSettings(el, type){
            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('{{ route('otp_configurations.update.activation') }}', {_token:'{{ csrf_token() }}', type:type, value:value}, function(data){
                if(data == '1'){
                    showAlert('success', 'Settings updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection
