@extends('layouts.admin')
@section('title','Email Setting')
@section('heading','Send Invitation Email')
@section('css')
    <style>
        .bg-orange{
            background-color: orange;
        }
    </style>
@endsection

@section('content')
@php
$setting=$setting['send_invitation_email'];
$setting=json_decode($setting)
@endphp

    <section>
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="{{route('admin.email.save')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="send_invitation_email" name="email_type">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">

                                <div class="card-header card-header-primary">
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <strong class="text-info">Caption of Email:</strong>
                                                <input type="text" value="{{$setting->hello}}" name="hello" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">

                                            <strong class="text-info">Subject of Email:</strong>
                                            <textarea type="text" name="subject" class="form-control small-summernote"  placeholder="write subject...">{{$setting->subject??''}}
                                            </textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <strong class="text-info">1st Half of Email:</strong>
                                            <textarea type="text" name="first_part" class="form-control small-summernote" rows="2">{{$setting->first_part??''}}</textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <strong class="text-info">2nd Half of Email:</strong>
                                            <textarea type="text" name="second_part" class="form-control small-summernote" rows="2">
                                                {{$setting->second_part??''}}
                                            </textarea>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <strong class="text-info">Signature of Email:</strong>
                                            <input type="hidden" name="set_img" value="{{$setting->image??''}}">
                                            <input type="file" name="image" class="form-control dropify"  data-default-file="{{asset($setting->image??'')}}">
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 mt-1">
                                            <strong class="text-info">Thanks of Email:</strong>
                                            <input type="text" value="{{$setting->team}}" name="team" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-title bg-orange1 p-1">
                                    <h1 class="text-center text-white"><img src="{{ asset(\App\Models\Setting::where('key','logo')->first()->value ?? '')  }}" style="width: 120px;" alt=""></h1>
                                </div>
                                <div class="card-body">
                                    <h4 id="hello">{{$setting->hello}}</h4>
                                    <br>
                                    <h3 id=subject>{!! $setting->subject??'' !!}</h3>
                                    <p><span id="first">{!! $setting->first_part??'' !!} </span><span id="name1" class="font-weight-bold">User</span><span id="second"> {!! $setting->second_part??'' !!}</span></p>
                                    @if($setting->image??'')
                                    <img src="{{asset($setting->image??'')}}" alt="no image"></img>
                                    @endif
                                    <h5 id="team">{{$setting->team}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Save</button>

                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection

@section('js')
    <script>
        $(document).on('keyup','.form-control',function (){
            var name=$(this).attr('name')
            var val=$(this).val()
            if (name=='hello')
            {
                $('#hello').text(val)
            }
            if (name=='first-part')
            {
                $('#first').text(val)
            }
            if (name=='second-part')
            {
                $('#second').text(val)
            }
            if (name=='team')
            {
                $('#team').text(val)
            }
            if (name=='subject')
            {
                $('#subject').text(val)
            }
        })
    </script>
@endsection

