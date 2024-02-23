@extends('layouts.mail-layout')

@section('mail-content')
    <div class="container p-3 my-5">
        <div class="card border-0 rounded-4 overflow-hidden mail-card" style= "background-image: url({{ Vite::asset('resources/img/mail-bg.jpg') }})">
            <div class="yellow-mail-wrapper">
                <img src="{{ Vite::asset('resources/img/wave-yellow.png') }}" alt="">
            </div>
            <div class="p-5">
                <div class="rounded-4 m-auto w-75 bg-light p-5 card-mail-center" style= "background-image: url({{ Vite::asset('resources/img/logo-bg-mail.png') }})">
                    <h2 class="text-center fs-1 fw-bold pb-3">
                        Il tuo Ordine
                    </h2>
                    <div>
                        <p class="fs-5 text-center">
                        Ciao {{ $guestMail->name }}, ti ringraziamo per aver scelto Deliverboo. <br>
                        Ti confermiamo che il ristorante ha preso a carico il tuo ordine.
                        <ul class="fs-5 d-flex flex-column justify-content-center align-items-center" >

                            @foreach ($guestMail->dishes as $dish)
                                <li class=" list-unstyled ">
                                    {{ $dish->name }} x {{ $dish->pivot->quantity }}
                                </li>
                            @endforeach
                            totale: {{ $guestMail->total_price }} €
                        </ul>
                        </p>
                        <p class="fs-5 text-center">
                        I nostri fattorini sono già in viaggio. <br>
                        Buon Appetito
                        </p>
                        <div class="fs-5 text-center">
                            Deliverboo
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <img src="{{ Vite::asset('resources/img/wave-yellow.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection

{{-- <div>
    <div>
        <h2>
            Il tuo Ordine
        </h2>
        <p>
           Ciao {{ $guestMail->name }}, ti ringraziamo per aver scelto Deliverboo. <br>
           Ti confermiamo che il ristorante ha preso a carico il tuo ordine:
           <ul>
               @foreach ($guestMail->dishes as $dish)
                   <li>
                       {{ $dish->name }} x {{ $dish->pivot->quantity }}
                   </li>
               @endforeach
           </ul>
        </p>
        <p>
           I nostri fattorini sono in viaggio per recuperarlo e consegnarti il tutto quanto prima.
        </p>
        <div>
            Deliverboo
        </div>
    </div>
</div> --}}
