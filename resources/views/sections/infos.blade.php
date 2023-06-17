<div class="container-fluid pt-5">
    <div class="container pb-3">
        <div class="row">

            @foreach ($infos as $item)
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <img src="/files/{{ $item->icon }}" width="50px" alt="">
                        <div class="pl-4">
                            <h4>{{ $item->title }}</h4>
                            <p class="m-0">{{ \Str::limit($item->description, 2) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
