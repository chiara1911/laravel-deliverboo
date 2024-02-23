@extends('layouts.mail-layout')

@section('mail-content')
    <div class="container">
        <div class="card p-3 ">
            <h2>
                Il tuo Ordine
            </h2>
            <p>
            Ciao nome, ti ringraziamo per aver scelto Deliverboo. <br>
            Ti confermiamo che il ristorante ha preso a carico il tuo ordine:
            <ul>
                {{-- @foreach ($guestMail->dishes as $dish) --}}
                    <li>
                        nomepiatto x quantita
                    </li>
                {{-- @endforeach --}}
            </ul>
            </p>
            <p>
            I nostri fattorini sono in viaggio per recuperarlo e consegnarti il tutto quanto prima.
            </p>
            <div>
                Deliverboo
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
