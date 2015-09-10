$('document').ready(function() {
    $('#generate_redeem').click(function() {
        var length = '4';
        var url = $('#link').val();
        $.ajax({
            type: 'post',
            url: url + 'storeAdmin/voucherManagement/generatCode',
            data: 'length=' + length,
            async: false,
            success: function(res) {
                $('#redeam_code').val(res);
                $('#redeam_code').attr('readonly', 'true');
            }
        });
    });
    $('#generate_voucher').click(function() {
        var length = '8';
        var url = $('#link').val();
        $.ajax({
            type: 'post',
            url: url + 'storeAdmin/voucherManagement/generatCode',
            data: 'length=' + length,
            async: false,
            success: function(res) {
                $('#voucher_code').val(res);
                $('#voucher_code').attr('readonly', 'true');
            }
        });
    });
    $('#generate_qr').click(function() { 
        var length = '18';
        var url = $('#link').val();
        $.ajax({
            type: 'post',
            url: url + 'storeAdmin/voucherManagement/generatCode',
            data: 'length=' + length,
            async: false,
            success: function(res) {
                $('#qr_code').val(res);
                $('#qr_code').attr('readonly', 'true');
            }
        });
    });
});