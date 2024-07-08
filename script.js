// script.js
const ctx = document.getElementById('graph-1').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Aula 1', 'Aula 2', 'Aula 3', 'Aula 4', 'Aula 5'],
        datasets: [{
            label: 'Conteúdo',
            data: [10, 20, 30, 40, 50],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
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

// script.js
fetch('data.json')
   .then(response => response.json())
   .then(data => {
        const lessons = data.lessons;
        const chartData = lessons.map(lesson => lesson.content);
        const chartLabels = lessons.map(lesson => lesson.name);

        chart.data.labels = chartLabels;
        chart.data.datasets[0].data = chartData;
        chart.update();

        const tableBody = document.querySelector('tbody');
        lessons.forEach(lesson => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${lesson.name}</td>
                <td>${lesson.date}</td>
                <td>${lesson.content}</td>
            `;
            tableBody.appendChild(row);
        });
    });
