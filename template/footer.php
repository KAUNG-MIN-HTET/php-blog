<script src="<?php echo "$url"; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo "$url"; ?>assets/vendor/jquery/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo "$url"; ?>assets/vendor/datatables.js"></script>
  <script src="<?php echo "$url"; ?>assets/vendor/waypoint/jquery.waypoints.min.js"></script>
  <script src="<?php echo "$url"; ?>assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?php echo "$url"; ?>assets/vendor/chartjs/chart.min.js"></script>
<script src="<?php echo "$url"; ?>assets/vendor/summernote/summernote-lite.js"></script>
  <script src="<?php echo "$url"; ?>assets/js/app.js"></script>
  <script>

        $(".full-screen-btn").click(function() {
            $(this).closest(".card").toggleClass("full-screen");
            let current = $(this).closest(".card");
            if(current.hasClass("full-screen")) {
                $(this).html(`<i class="fad fa-compress-alt"></i>`);
            }else{
                $(this).html(`<i class="fas fa-expand-alt"></i>`);
            }
        });



        let dateArr = ['dec 25','dec 26','dec 27','dec 28','dec 29','dec 30','dec 31','jan 1','jan 2','jan 3','jan 4'];
        let transitionCountArr = <?php echo json_encode($transitionRate); ?>;
        let viewerCountArr = <?php echo json_encode($visitorRate); ?>;


        const ctx = document.getElementById('ov').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: transitionCountArr,
                datasets: [{
                    label: 'Transition Count',
                    data: transitionCountArr,
                    fill: true,
                    backgroundColor: [
                        '#dc354520'
                    ],
                    borderColor: [
                        '#dc3545'
                    ],
                    borderWidth: 1,
                    tension: 0.2
                },
                {
                    label: 'Viewer Count',
                    data: viewerCountArr,
                    fill: true,
                    backgroundColor: [
                        '#19875420'
                    ],
                    borderColor: [
                        '#198754'
                    ],
                    borderWidth: 1,
                    tension: 0.2
                }]
            },
            options: {
                scales: {
                    yAxes: {
                        display: true
                    },
                    xAxes: {
                        display: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'rgb(0, 0, 0)'
                        },
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    }
                }
            }
        });



        let countArr = <?php echo json_encode($countTotalByCategory) ?>;
        let catArr = <?php echo json_encode($catName) ?>;


        let op = document.getElementById('opChart').getContext('2d');
        let myop = new Chart(op, {
            type: 'doughnut',
            data: {
                labels: catArr,
                datasets: [{
                    label: 'Places',
                    data: countArr,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.3)',
                        'rgba(54, 162, 235, 0.3)',
                        'rgba(255, 206, 86, 0.3)',
                        'rgba(75, 192, 192, 0.3)',
                        'rgba(153, 102, 255, 0.3)',
                        'rgba(255, 159, 64, 0.3)'
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
                    xAxes: {
                        display: false
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    }
                }
            }
        });

        let category = ["Phone","TV","Computer"];
        let subCategory = [
            {name: "iphone",categoryId: 0},
            {name: "mi",categoryId: 0},
            {name: "sony",categoryId: 1},
            {name: "hp",categoryId: 1},
            {name: "dell",categoryId: 2},
            {name: "mac",categoryId: 2}
        ];

        category.map(function(el,index) {
            $("#main").append(`<option value="${index}">${el}</option>`);
        });

        subCategory.map(function(el,index) {
            $("#sub").append(`<option value="${index}" data-category="${el.categoryId}">${el.name}</option>`);
        });

        $("#main").on("change",function() {
            let currentCategoryId = $(this).val();
            $("#sub option").hide();
            $(`[data-category=${currentCategoryId}]`).show();
        });

    </script>

</body>
</html>