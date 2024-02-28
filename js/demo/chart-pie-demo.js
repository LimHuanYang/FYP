
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function createPieChart(carbsintake, proteinintake, fatintake) {
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: ["Carbohydrate", "Protein", "Fat"],
      datasets: [
        {
          data: [carbsintake, proteinintake, fatintake],
          backgroundColor: ["#0d6efd", "#FF0000", "#f0ad4e"],
          hoverBackgroundColor: ["#0a58ca", "#cc0000", "#d49c32"],
          hoverBorderColor: ["#094080", "#8c0000", "#9b7c26"],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false,
      },
      cutoutPercentage: 80,
    },
  });
}