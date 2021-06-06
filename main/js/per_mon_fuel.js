$(function () {
    jQuery.extend( jQuery.fn.dataTableExt.oSort, {
        "date-range-pre": function ( a ) {
            var monthArr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            return monthArr.indexOf(a);
        },
        "date-range-asc": function ( a, b ) {
            return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },
        "date-range-desc": function ( a, b ) {
            return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
    } );

    function numberWithCommas(num) {
        x=(Math.round(num * 100) / 100).toFixed(2)
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
    
    var tablemon=$('#sell_month').DataTable({
        dom: 'lBfrtip',
        pageLength: 12,
        lengthChange: false,
        buttons: [
            { extend: 'copyHtml5', footer: true,
                filename: function(){
                    var d = new Date();
                    var n = d.getTime();
                    return 'mobil' +'-'+d+'-'+ n;
                },
            },
            { extend: 'excelHtml5', footer: true,
                text : 'Export to EXCEL',
                orientation: 'landscape',
                filename: function(){
                    var d = new Date();
                    var n = d.getTime();
                    return 'per_day_transaction' +'-'+d+'-'+ n;
                },
            }

        ],
        ajax: {
            url:"all_details/ajax_per_month_fuel.php"
        },
        columnDefs: [
            { type: 'date-range', targets: 0 }
        ]
        ,
        columns: [
            { "data": "Month",
                render: function ( data, type, row ) {
                    var month = new Array();
                    month[0] = "January";
                    month[1] = "February";
                    month[2] = "March";
                    month[3] = "April";
                    month[4] = "May";
                    month[5] = "June";
                    month[6] = "July";
                    month[7] = "August";
                    month[8] = "September";
                    month[9] = "October";
                    month[10] = "November";
                    month[11] = "December";
                    return month[parseInt(data)-1];
                }
            },
            { "data": "Diesel-Sell-Quantity" ,
                render: function ( data, type, row ) {
                    return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR';
                }
            },
            { "data": "Diesel-Invest",
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Diesel-Earn" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Diesel-Profit" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Octane-Sell-Quantity" ,
                render: function ( data, type, row ) {
                    return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR';
                }
            },
            { "data": "Octane-Invest",
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Octane-Earn" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Octane-Profit" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Mobil-Sell-Quantity" ,
                render: function ( data, type, row ) {
                    return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR';
                }
            },
            { "data": "Mobil-Invest",
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Mobil-Earn" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Mobil-Profit" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Fuel-Invest" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Fuel-Earn" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Fuel-Profit" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Expense",
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            },
            { "data": "Total-Profit" ,
                render: function ( data, type, row ) {
                    return numberWithCommas(data)+' ৳';
                }
            }

        ],
        footerCallback: function( tfoot, data, start, end, display ) {
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            var api = this.api();
            $(api.column(1).footer()).html(
                api.column(1).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR'

            );
            $(api.column(2).footer()).html(
                numberWithCommas(api.column(2).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(3).footer()).html(
                numberWithCommas(api.column(3).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(4).footer()).html(
                numberWithCommas(api.column(4).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(5).footer()).html(
                api.column(5).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR'

            );
            $(api.column(6).footer()).html(
                numberWithCommas(api.column(6).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(7).footer()).html(
                numberWithCommas(api.column(7).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(8).footer()).html(
                numberWithCommas(api.column(8).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(9).footer()).html(
                api.column(9).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR'

            );
            $(api.column(10).footer()).html(
                numberWithCommas(api.column(10).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(11).footer()).html(
                numberWithCommas(api.column(11).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(12).footer()).html(
                numberWithCommas(api.column(12).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(13).footer()).html(
                numberWithCommas(api.column(13).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(14).footer()).html(
                numberWithCommas(api.column(14).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(15).footer()).html(
                numberWithCommas(api.column(15).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(16).footer()).html(
                numberWithCommas(api.column(16).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );
            $(api.column(17).footer()).html(
                numberWithCommas(api.column(17).data().reduce(function ( a, b ) {
                    return intVal(a) + intVal(b);
                }, 0))+' ৳'

            );

        }
    });
});