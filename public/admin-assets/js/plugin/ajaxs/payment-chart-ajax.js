fetch("/admin/payments-data")
    .then((response) => response.json())
    .then((data) => {
        var ctx = document.getElementById("payments").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: data.labels.map((item) => item),
                datasets: [
                    {
                        label: "پرادخت موفق",
                        data: data.data.map((item) => item),
                        borderColor: "rgba(75, 192, 192, 1)",
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                    },
                    {
                        label: "پرداخت نا موفق",
                        data: data.data2.map((item) => item),
                        borderColor: "rgba(255, 99, 132, 1)",
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: "وضعیت پرداختی ها در 6 ماه اخیر",
                        font: {
                            family: "IRANSans",
                            size: 20,
                        },
                    },
                },
            },
        });
    });
