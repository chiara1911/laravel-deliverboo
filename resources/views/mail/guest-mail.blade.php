<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mail</title>
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: 'Urbanist', sans-serif;
        }

        .container-mail {
            max-width: 1000px;
            margin: 0 auto;
        }

        .card-mail {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background-size: cover;
            background-position: center;
        }

        .yellow-mail-wrapper-up {
            transform: rotate(180deg);
            position: relative;
            height: 100px;
            top: -10px;
            z-index: 1;
        }

        .yellow-mail-wrapper-down {
            position: relative;
            height: 100px;
            bottom: -10px;
            z-index: 1;
        }

        .internal-mail-padding {
            padding: 30px;
        }

        .card-mail-center {
            max-width: 600px;
            margin: 0 auto;
            border-radius: 20px;
            background-color: white;
            padding: 30px;
            background-size: 300px;
            background-position: center;
            background-repeat: no-repeat;
        }

        h2 {
            font-size: 3rem;
            font-weight: bold;
            padding-bottom: 20px;
            text-align: center;
            color: #E94B4F;
        }

        p {
            font-size: 1.5rem;
            text-align: center;
        }

        ul {
            padding: 20px 0;
            list-style: none;
            font-size: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>



<div class="container-mail">
    <div class="card-mail" style= "background-image: url({{ Vite::asset('resources/img/mail-bg.jpg') }})">
        <div class="yellow-mail-wrapper-up">
            <img src="{{ Vite::asset('resources/img/wave-yellow.png') }}" alt="mail-bg">
        </div>
        <div class="internal-mail-padding">
            <div class="card-mail-center"
                style= "background-image: url({{ Vite::asset('resources/img/logo-bg-mail.png') }})">
                <h2>
                    Il tuo Ordine
                </h2>
                <div>
                    <p>
                        Ciao {{ $guestMail->name }},<br> ti ringraziamo per aver scelto Deliveboo. <br>
                        Ti confermiamo che il ristorante <br> ha preso a carico il tuo ordine:
                    <ul>
                        @foreach ($guestMail->dishes as $dish)
                            <li>
                                {{ $dish->name }} x {{ $dish->pivot->quantity }}
                            </li>
                        @endforeach
                        totale: {{ $guestMail->total_price }} €
                    </ul>
                    </p>
                    <p style="padding-bottom: 30px">
                        I nostri fattorini sono già in viaggio. <br>
                        Deliveboo
                    </p>
                </div>
            </div>
        </div>
        <div class="yellow-mail-wrapper-down">
            <img src="{{ Vite::asset('resources/img/wave-yellow.png') }}" alt="mail-bg">
        </div>
    </div>
</div>

</html>
