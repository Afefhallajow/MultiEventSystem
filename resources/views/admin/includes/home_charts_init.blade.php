<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        //------------ invitation_type ------------
        var invitation_type = {!! json_encode($invitation_type) !!},
            options_type = {
                chart: {
                    height: 250,
                    type: "pie"
                },
                series: invitation_type,
                labels: [invitation_type[0]+" دعوة",
                    invitation_type[1]+" تسجيل"],
                colors: [                'rgb(54,235,114)',
                    'rgb(22,44,110)',
                ],
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "center",
                    verticalAlign: "middle",
                    floating: !1,
                    fontSize: "14px",
                    offsetX: 0,
                    offsetY: 0
                } ,tooltip: {
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return ''
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            height: 240
                        },
                        legend: {
                            show: !1
                        }
                    }
                }]
            },
            type_chart = new ApexCharts(document.querySelector("#invitation_type"), options_type);
        type_chart.render();

        ////////////////////////
        var registrations = {!! json_encode($registrations) !!},
            options_registrations = {
                chart: {
                    height: 250,
                    type: "pie"
                },
                series: registrations,
                labels: ["حضر", "لم يحضر"],
                colors: ["#51a767", "#dc3912"],
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "center",
                    verticalAlign: "middle",
                    floating: !1,
                    fontSize: "14px",
                    offsetX: 0,
                    offsetY: 0
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            height: 240
                        },
                        legend: {
                            show: !1
                        }
                    }
                }]
            },
            registrations_chart = new ApexCharts(document.querySelector("#registrations"), options_registrations);
        registrations_chart.render();

//////////////////////
        var invite = {!! json_encode($sendInvitations) !!},
            options_invite = {
                chart: {
                    height: 250,
                    type: "pie"
                },
                series: invite,
                labels: [invite[0]+"حضر",invite[1]+ "لم يحضر"],
                colors: ["#51a767", "#dc3912"],
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "center",
                    verticalAlign: "middle",
                    floating: !1,
                    fontSize: "14px",
                    offsetX: 0,
                    offsetY: 0
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            height: 240
                        },
                        legend: {
                            show: !1
                        }
                    }
                }]
            },
            invite_chart = new ApexCharts(document.querySelector("#invite"), options_invite);
        invite_chart.render();


    });

</script>











