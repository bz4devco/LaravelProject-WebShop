fetch("/admin/sold-products-data")
    .then((response) => response.json())
    .then((data) => {
        var ctx = document.getElementById("sold-products").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: data.labels.map((item) => item),
                datasets: [
                    {
                        label: "تعداد محصولات فروخته شده در ماه",
                        data: data.data.map((item) => item),
                        borderColor: "rgba(75, 192, 192, 1)",
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
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
                        text: "محصولات فروخته شده در 6 ماه اخیر",
                        font: {
                            family: "IRANSans",
                            size: 18,
                        },
                    },
                },
            },
        });
    });
