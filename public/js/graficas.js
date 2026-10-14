document.addEventListener("DOMContentLoaded",function(){
 const ctx=document.getElementById('productoPorCategoriaChart');
 const ctx1=document.getElementById('productoPorCategoriaChartbarra');

 const labels=window.labels;
 const data=window.data;
 //grafica pastel
new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Productos por Categoría',
                data: data,
                backgroundColor: [
                    '#4e73df',
                    '#1cc88a',
                    '#36b9cc',
                    '#f6c23e',
                    '#e74a3b',
                    '#858796'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                title: { display: false }
            }
        }
    });

//grafica tipo barras
 new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Productos por Categoría',
                data: data,
                backgroundColor: '#4e73df',
                borderColor: '#2e59d9',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: { display: false },
                title: {
                    display: false,
                    text: 'Productos por Categoría (Barras)'
                }
            }
        }
    });


});