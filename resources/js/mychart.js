import Chart from 'chart.js/auto';

// const labels = [
//     'January',
//     'February',
//     'March',
//     'April',
//     'May',
//     'June',
// ];

// const data = {
//     labels: labels,
//     datasets: [{
//         label: 'Grafico Ordini',
//         backgroundColor: 'rgb(255, 99, 132)',
//         borderColor: 'rgb(255, 99, 132)',
//         data: [0, 10, 5, 2, 20, 30, 45],
//     }]
// };

// const config = {
//     type: 'radar',
//     data: data,
//     options: {}
// };

// new Chart(
//     document.getElementById('myChart'),
//     config
// );
(async function() {
    const data = [       
            {
                "name": "Mario",
                "surname": "Rossi",
                "address": "Via Roma, 1",
                "email": "mario.rossi@example.com",
                "phone": "0954873052",
                "total_price": 35.50,
                "created_at": "2023-12-30 12:04:10",
                "updated_at": "2023-12-30 12:04:10"
            },
            {
                "name": "Laura",
                "surname": "Bianchi",
                "address": "Corso Italia, 10",
                "email": "laura.bianchi@example.com",
                "phone": "0930567392",
                "total_price": 25.20,
                "created_at": "2023-12-31 16:15:45",
                "updated_at": "2023-12-31 16:15:45"
            },
            {
                "name": "Luigi",
                "surname": "Verdi",
                "address": "Via Garibaldi, 5",
                "email": "luigi.verdi@example.com",
                "phone": "0945296638",
                "total_price": 42.80,
                "created_at": "2024-01-04 21:40:13",
                "updated_at": "2024-01-04 21:40:13"
            },
            {
                "name": "Giovanna",
                "surname": "Ferrari",
                "address": "Piazza Dante, 3",
                "email": "giovanna.ferrari@example.com",
                "phone": "0956395610",
                "total_price": 48.90,
                "created_at": "2024-01-15 10:14:50",
                "updated_at": "2024-01-15 10:14:50"
            },
            {
                "name": "Marco",
                "surname": "Russo",
                "address": "Via Milano, 15",
                "email": "marco.russo@example.com",
                "phone": "0956201345",
                "total_price": 35.60,
                "created_at": "2024-02-03 18:32:30",
                "updated_at": "2024-02-03 18:32:30"
            }     
    ];
  
    new Chart(
      document.getElementById('myChart'),
      {
        type: 'bar',
        data: {
          labels: data.map(row => row.created_at + ' - ' + row.name + ' ' + row.surname),
          datasets: [
            {
              label: 'Guadagni',
              data: data.map(row => row.total_price)
            }
          ]
        }
      }
    );
  })();