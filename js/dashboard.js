const ctxRevenue = document.getElementById('revenueCanvas').getContext('2d');
const revenueChart = new Chart(ctxRevenue, {
    type: 'bar',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [
            {
                label: 'Online Sales',
                data: [12000, 19000, 3000, 5000, 2000, 3000, 7000],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Offline Sales',
                data: [15000, 23000, 2000, 3000, 4000, 1000, 2000],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctxSatisfaction = document.getElementById('satisfactionCanvas').getContext('2d');
const satisfactionChart = new Chart(ctxSatisfaction, {
    type: 'line',
    data: {
        labels: ['Last Month', 'This Month'],
        datasets: [{
            label: 'Satisfaction',
            data: [3004, 4504],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
