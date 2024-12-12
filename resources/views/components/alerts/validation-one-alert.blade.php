
@if(session()->has('success'))
<div class="card px-3 py-2 rounded-0 mb-2 success-alert">
    {{session('success')}}
</div>
@elseif(session()->has('error'))
    <div class="card px-3 py-2 rounded-0 mb-2 vaildation-alert">
        {{session('error')}}
    </div>
@endif

@if ($errors->any())
    <div class="card px-3 py-2 rounded-0 mb-2 vaildation-alert">
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    </div>
@endif

