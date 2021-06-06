$(function () {
    $('#stock_submit').click(function (e) {
        e.preventDefault();
        console.log("submit");
        $.ajax({
            url: 'management/today_stock.php',
            type: 'post',
            data: {
                'diesel_stock': $.trim($('#diesel_stock').val()),
                'octane_stock': $.trim($('#octane_stock').val()),
                'mobil_stock': $.trim($('#mobil_stock').val()),
            },
            success: function () {
                location.reload();
            }
        });
    });
});