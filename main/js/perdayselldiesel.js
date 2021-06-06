$(function () {
    $.fn.dataTable.moment('D/M/YYYY');
    //var request;
     $('#date_submit').click(function (){
         searchdate({
             'startDate':$('#reservation').val().split('-')[0].trim().replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2"),
             'endDate':$('#reservation').val().split('-')[1].trim().replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2"),
         });

     });
    function afterTwo(num){
        return (Math.round(num * 100) / 100).toFixed(2);
    }

    function dateformatChange(data){
        var date= data;
        var d=new Date(date.split("/").reverse().join("-"));
        var dd=d.getDate();
        var mm=d.getMonth()+1;
        var yy=d.getFullYear();
        var newdate=dd+"/"+mm+"/"+yy;
        return newdate;
    }
    fetch('no');
    function searchdate(data){
        $('#dieselTable').DataTable().destroy();
        setTimeout(() => {
            fetch('Yes',data);
        }, 1);

    }
    function fetch(yesno,data){
        $('#dieselTable').DataTable({
            dom: 'lBfrtip',
            order: [[ 0, "desc" ]],
            buttons: [
                { extend: 'copyHtml5', footer: true,
                    filename: function(){
                        var d = new Date();
                        var n = d.getTime();
                        return 'diesel' +'-'+d+'-'+ n;
                    },
                },
                { extend: 'excelHtml5', footer: true,
                    orientation: 'landscape',
                    filename: function(){
                        var d = new Date();
                        var n = d.getTime();
                        return 'diesel' +'-'+d+'-'+ n;
                    },
                },
                { extend: 'pdfHtml5', footer: true,

                    text : 'Export to PDF',
                    filename: function(){
                        var d = new Date();
                        var n = d.getTime();
                        return 'diesel' +'-'+d+'-'+ n;
                    },
                    customize: function ( doc ) {
                        doc.watermark = {
                            text: 'Sadek Filling Station', color: 'blue', opacity: 0.1
                        };
                        doc.content.splice( 1, 0, {
                            margin: [ 0, 0, 0, 12 ],
                            alignment: 'center',
                            image: 'data:image/png;base64,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'  } );

                    },
                    exportData: {decodeEntities:true},
                },
                {
                    extend: 'print',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            .prepend(
                                '<img src="../../images/image_print.png" style="position:absolute; top:350; left:0;" />'
                            );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    },
                    footer:true,
                }

            ],
            // bProcessing: true,
            // bserverSide: true,
            ajax: {
                url:"diesel/ajaxperdaydieselsell.php",
                type:'POST',
                data:data,
            },
            columns: [
                { "data": "Date",
                    render: function ( data, type, row ) {
                        return dateformatChange(data);
                    }
                },
                { "data": "Sell-Quantity" ,
                    render: function ( data, type, row ) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'LTR';
                    }
                },
                { "data": "Buying-Rate",
                    render: function ( data, type, row ) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' ৳';
                    }
                },
                { "data": "Investment" ,
                    render: function ( data, type, row ) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' ৳';
                    }
                },
                { "data": "Sell-Rate" ,
                    render: function ( data, type, row ) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' ৳';
                    }
                },
                { "data": "Earn" ,
                    render: function ( data, type, row ) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' ৳';
                    }
                },
                { "data": "Profit",
                    render: function ( data, type, row ) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' ৳';
                    }
                },
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
                $(api.column(3).footer()).html(
                   afterTwo(api.column(3).data().reduce(function ( a, b ) {
                        return intVal(a) + intVal(b);
                    }, 0)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' ৳'

                );
                $(api.column(5).footer()).html(
                    afterTwo(api.column(5).data().reduce(function ( a, b ) {
                        return intVal(a) + intVal(b);
                    }, 0).toString()).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' ৳'

                );
                $(api.column(6).footer()).html(
                    afterTwo(api.column(6).data().reduce(function ( a, b ) {
                        return intVal(a) + intVal(b);
                    }, 0).toString()).replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' ৳'

                );
            }
        });
    }



    $('#reservation').daterangepicker();
});