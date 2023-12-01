<div class="row">
    <div class="col-md-6">
<div class="card m-auto">
    <div class="card-body">
        <h5 class="card-title">{{ __('Result Desc') }}</h5>
            <div class="col-md-12 ">
                @forelse(\App\Enums\SortEnum::sortByDesc($results) as $result)
                    <div class="border-bottom">
                <div class="m-auto ">
                   <h1>{{ $result['title']}}</h1>
                </div>

                <div class="w-100">
                    {!! $result['body'] !!}
                </div>
                    </div>
                    <br>
                @empty
                    {{__('Empty Data')}}
                @endforelse
            </div>
    </div>
</div>
</div>
 <div class="col-md-6">
<div class="card m-auto">
    <div class="card-body">
        <h5 class="card-title">{{ __('Result Asc') }}</h5>
            <div class="col-md-12 ">
                @forelse(\App\Enums\SortEnum::sortByAsc($results) as $result)
                    <div class="border-bottom">
                <div class="m-auto ">
                   <h1>{{ $result['title']}}</h1>
                </div>

                <div class="w-100">
                    {!! $result['body'] !!}
                </div>
                    </div>
                    <br>
                @empty
                    {{__('Empty Data')}}
                @endforelse
            </div>
    </div>
</div>
</div>
</div>
