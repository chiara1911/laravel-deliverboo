<div>
    <h1>
        Nuovo Ordine!
    </h1>
    <p>
       nuovo ordine ricevuto, ecco i dati:
       <ul>
           @foreach ($adminMail->dishes as $dish)
               <li>
                   {{ $dish->name }} x {{ $dish->pivot->quantity }}
               </li>
           @endforeach
       </ul>
    </p>
    <p>
       Dati dell'utente
       <ul>
        <li>
           nome: {{ $adminMail->name }} {{ $adminMail->surname }}
        </li>
        <li>
           indirizzo: {{ $adminMail->address }}
        </li>
        <li>
           email: {{ $adminMail->email }}
        </li>
        <li>
           telefono: {{ $adminMail->phone }}
        </li>
       </ul>
    </p>
</div>
