"use strict";

$(function(){
    var ctx = document.getElementById('userChart').getContext('2d');

    var userChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: $('#userMonthCount').attr('data-label'),
                data: JSON.parse($('#userMonthCount').val()),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            },
            aspectRatio:4,
            responsive : true, 
            maintainAspectRatio : false
        }
    });
    userChart.canvas.parentNode.style.height = '450px';


    var ctx1 = document.getElementById('subscriptionChart').getContext('2d');
    ctx1.height = 500;
    var myChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: $('#subsMonthCount').attr('data-label'), 
                data: JSON.parse($('#subsMonthCount').val()),
                fill: true,
                borderColor: '#506fe4', 
                backgroundColor: '#506fe4', 
                borderWidth: 1 
            }]
        },
        options: {
            aspectRatio:4,
            responsive: true,
            maintainAspectRatio: false,
        }
    });
    myChart.canvas.parentNode.style.height = '450px';
});