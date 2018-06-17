<div class="row m-0">
    @foreach($data as $item)
    <div class="col-md-3 col-4 p-0">
        <a href="{{url('/product/'.$item->id)}}">
            <div class="card">
                <div class="p-i" style="background:url('{{$item->cover}}') no-repeat"></div>
                <div class="card-body">
                    <h6 class="card-title text-center">{{$item->name}}</h6>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    <div class="col-md-12 p-0  bg-white">
        <strong class="float-right p-2"><i class="fas fa-eye"></i> View All</strong>
    </div>
</div>
