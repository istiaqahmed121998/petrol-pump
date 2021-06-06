$(function () {
    
    function roundTwodigit(num){
        return Math.round(num * 100) / 100;
    }

    'use strict';
    $.ajax({
        url:'all_details/ajax_all_details.php',
        type:'post',
        data:{
            'graph':'1'
        },
        success : function (data) {
            var details=JSON.parse(data);
            var dataProfit=[];
            var dataEarn=[];
            var dataInvest=[];
            $.each(details.profit,function (k,v) {
                dataProfit.push(roundTwodigit(parseFloat(v.profit)));
            });
            $.each(details.earn,function (k,v) {
                dataEarn.push(roundTwodigit(parseFloat(v.earn)));
            });
            $.each(details.invest,function (k,v) {
                dataInvest.push(roundTwodigit(parseFloat(v.invest)));
            });
            var options = {
                series: [{
                    name: 'Invest',
                    data: dataInvest
                }, {
                    name: 'Earn',
                    data: dataEarn
                },{
                    name: 'Profit',
                    data: dataProfit
                }
                ],
                chart: {
                    type: 'bar',
                    foreColor:"#bac0c7",
                    height: 290,
                    toolbar: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '80%',
                        //endingShape: 'rounded',
                        
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                grid: {
                    show: true,
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                colors: ['#FF0000', '#00FF00','#304758'],
                xaxis: {
                    categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Oct','Nov','DEC']

                },
                yaxis: {

                },
                legend: {
                    show: false,
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return  val+" &#2547";
                        }
                    },
                    marker: {
                        show: false,
                    },
                }
            };
            var total_details = new ApexCharts(document.querySelector("#recent_trend"), options);
            total_details.render();
        }
    });
    

    var all_info;
    $.ajax({
        url: 'all_details/ajax_all_details.php',
        type: 'post',
        data: {
            'today': '1'
        },
        success:function (data) {

            all_info=JSON.parse(data);
            //$('#yes_diesel_sell').html(all_info.diesel[0].sell_quantity_diesel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            $('#today_diesel_sell').html(all_info.dieselSell.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            //$('#yes_octane_sell').html(all_info.octane[0].sell_quantity_octane.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            $('#today_octane_sell').html(all_info.OctaneSell.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            //$('#yes_mobil_sell').html(all_info.mobil[0].sell_quantity_mobil.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            $('#today_mobil_sell').html(all_info.mobilSell.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            // $('#octane_sell').html(all_info.octane.sell_quantity_octane+'LTR');
            // $('#mobil_sell').html(all_info.mobil.sell_quantity_mobil+'LTR');
            // $('#diesel_profit').html(all_info.diesel.profit_diesel+'৳');
            // $('#octane_profit').html(all_info.octane.profit_octane+'৳');
            // $('#mobil_profit').html(all_info.mobil.profit_mobil+'৳');
            //console.log(all_info.diesel[0].date);
        }
    });
    var all_info_yes;
    $.ajax({
        url: 'all_details/ajax_all_details.php',
        type: 'post',
        data: {
            'yesterday': '1'
        },
        success:function (data) {

            all_info_yes=JSON.parse(data);
            //console.log(all_info);
            $('#yes_diesel_sell').html(all_info_yes.dieselSell.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            //$('#today_diesel_sell').html(all_info_yes.dieselSell.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            $('#yes_octane_sell').html(all_info_yes.OctaneSell.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            //$('#today_octane_sell').html(all_info_yes.OctaneSell.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');
            $('#yes_mobil_sell').html(all_info_yes.mobilSell.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR');

        }
    });




}); // End of use strict
