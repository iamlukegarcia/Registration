<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets_Admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_Admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_Admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('TailwindCharts/flowbite.min.css') }}">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets_Admin/vendors/jquery-bar-rating/css-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_Admin/vendors/font-awesome/css/font-awesome.min.css') }}">


    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets_Admin/css/demo_1/style.css') }}">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets_Admin/images/favicon.png') }}">

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        {{-- @include('layouts.partial.sidebar') --}}
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('layouts.partial.settings')
            <!-- partial -->
            <!-- partial:partials/_navbar.html -->
            @include('layouts.partial.navbar')
            <!-- partial -->
            @include('layouts.dashboard')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets_Admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets_Admin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('assets_Admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets_Admin/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets_Admin/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets_Admin/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets_Admin/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets_Admin/vendors/flot/jquery.flot.stack.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets_Admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets_Admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets_Admin/js/misc.js') }}"></script>
    <script src="{{ asset('assets_Admin/js/settings.js') }}"></script>
    <script src="{{ asset('assets_Admin/js/todolist.js') }}"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets_Admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('TailwindCharts/flowbite.min.js') }}"></script>
    <script src="{{ asset('TailwindCharts/apexcharts.js') }}"></script>

    <!-- End custom js for this page -->
</body>


<script>
    const getChartOptions = () => {
        return {
            series: [{{$confirmed/265 *100}} ,{{265 - $confirmed/265 *100}}  ],
            colors: ["#681200", "#9f9f9f"],
            chart: {
                height: 420,
                width: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            labels: ["Present", "Not yet"],
            dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return value + "%"
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function(value) {
                        return value + "%"
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }

    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
        chart.render();
    }
    // end pie chart

 
</script>

</html>
