
<div id="restaurant-cover" class="d-flex justify-content-center align-items-center mb-5">
    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{$restaurant->name}}">
    <div id="restaurant-card" class="card text-center">
        <div class="card-header bg-white">
            <h2 class="fw-bold">{{$restaurant->name}}</h2>

        </div>
        <div class="card-body p-1">
            <p class="d-flex justify-content-center  column-gap-2">
                @foreach ($restaurant->types as $type)
                    <span class="color-tertiary fs-5">{{$type->name}}</span>
                @endforeach
            </p>
            <p>{{$restaurant->address}}</p>
        </div>
    </div>
</div>

