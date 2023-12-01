@extends('layouts.app')

@section('content')
    <body>
    <section class="section dashboard ">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card m-auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Make Process') }}</h5>
                        <form class="row g-3 form-process" method ="POST"  action="{{route('process')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="col-md-8 m-auto">
                                    <div class="mb-3">
                                        <h6 >{{ __('Insert File') }}</h6>
                                        <div class="upload-content d-flex">
                                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                                   id="file" name="file"  placeholder="{{__('File')}}"
                                                   value="{{old('file')}}">
                                            @error('file')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center buttons-make">
                                        <button type="submit" class="btn btn-success process">{{__('Make Process')}}</button>
                                        <button type="reset" class="btn btn-secondary">{{__('Reset')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><br>

            <div class="col-lg-10 process-content m-auto">

            </div>
    </section>
    </body>

@endsection
