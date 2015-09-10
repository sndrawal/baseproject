// JavaScript Document
$(document).ready(function () {
    //getproduct/view/product_view.php
    $('.toggle_sku').click(function () {
        $(this).parent().parent().next().toggle('slow');
        $(this).find('i').toggleClass("fa-plus-circle fa-minus-circle"); 
    });
    
    //getproduct/view/edit_product.php  
    $('#ingredients').submit(function (e) {
        var _this = $(this);
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: site_url('getproduct/insert_ingredients'),
            data: _this.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data == 1) {
                    $('.data_ingredients').css('display', 'block').html('Data inserted successfully').fadeOut(4000);
                } else {
                    $('.data_ingredients').css('display', 'block').html('Data insert Failed').fadeOut(4000);
                }
            }

        });
    });
    
    $('#ratings').submit(function (e) {
//        alert(3);
        var _this = $(this);
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: site_url('getproduct/insert_ratings'),
            data: _this.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data == 1) {
                    $('.data_ratings').css('display', 'block').html('Data inserted successfully').fadeOut(4000);
                } else {
                    $('.data_ratings').css('display', 'block').html('Data insert Failed').fadeOut(4000);
                }
            }

        });
    });
    
    $('#pdata').submit(function (e) {
//        alert(3);
        var _this = $(this);
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: site_url('getproduct/insert_datas'),
            data: _this.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data == 1) {
                    $('.data_datas').css('display', 'block').html('Data inserted successfully').fadeOut(4000);
                } else {
                    $('.data_datas').css('display', 'block').html('Data insert Failed').fadeOut(4000);
                }
            }

        });
    });
    
    $('.add_pro_rows').click(function(){
        var inc =parseInt($(this).attr('data'))+1;
        var rel =($(this).attr('rel'));
        if(rel=='ingre'){
            var this_tr = '<tr><td><label style="padding-top: 10px;">'+inc+'.</label></td><td><select class="form-control chosen-select" name="tureFalse[]" id=""><option value="1">True</option> <option value="0">False</option></select></td><td><input type="text" name="ingredients[]" class="form-control" value=""></td></tr>';
        }else if(rel=='rate'){
            $('.add_rate_row_data table tbody').find('label.sn').text(inc);
            var this_tr = $('.add_rate_row_data table tbody').html();
        }else if(rel=='percent'){
            $('.add_percent_row_data table tbody').find('label.sn').text(inc);
            var this_tr = $('.add_percent_row_data table tbody').html();
        } 
        $(this).prev('table').find('tbody').append(this_tr);
        $(this).attr('data',inc);

    });
    
    
    
    $('.add_desc_tabs').click(function(){
        var inc =parseInt($(this).attr('data'));
        var this_tab_head = '<li class=""><a href="#subtabbed'+inc+'" data-toggle="tab"> <strong><input type="text" name="desc_title[]" class="form-control"></strong></a></li>';
        $('ul.subtab_head').append(this_tab_head);
        
        $('.add_tabbed_data').find('.tab-pane').attr('id','subtabbed'+inc);
        $('.add_tabbed_data').find('textarea').attr('id','subdescription'+inc);
        var this_tab_content = $('.add_tabbed_data').html();
        $('.subtab_content').append(this_tab_content);
        CKEDITOR.replace('subdescription'+inc);
        $(this).attr('data',inc+1);

    });
    
    /*
     *function for adding more page link for sitemap 
     **/
    $('.add_custom_page_link').click(function(){
        var inc =parseInt($(this).attr('data'))+1;
        var this_page_link = ' <tr><td>'+inc+'</td><td><div class="col-sm-6"><input type="text" id="title" name="title[]" class="form-control" value=""></div></td> <td><div class="col-sm-6"><input type="text" id="link" name="link[]" class="form-control" value=""></div></td></tr>';
        $('.add_rate_row_data table tbody').append(this_page_link);
          $(this).attr('data',inc);
    });
    
    
//    for hiding ajax loader layer
    $('.loader').click(function(){
        $(this).hide();
    });
    
    
    
});