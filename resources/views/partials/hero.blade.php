
<div id="restaurant-cover" class="d-flex justify-content-center align-items-center">
    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{$restaurant->name}}">
    <div id="restaurant-card" class="card text-center">
        <div class="card-header bg-white">
            <h2 class="fw-bold">{{$restaurant->name}}</h2>

        </div>
        <div class="card-body p-1">
            <p class="d-flex justify-content-center align-items-center column-gap-2">
                @foreach ($restaurant->types as $type)
                    <span class="fs-5">{{$type->name}}</span>
                    @if ($loop->last)
                    @else
                    <i class="fa-solid fa-circle little-dot"></i>
                    @endif
                @endforeach
            </p>
            <p>{{$restaurant->address}}</p>
        </div>
    </div>
</div>

