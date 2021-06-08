var account_scope = document.getElementById('account_scope').innerHTML;
get_data(account_scope, 'id', '>=', '0');
get_data_dropdown_regencies('regencies', 'id', '>=', '0', '.regencies_dropdown', 'Kabupaten', 'select_regencies');

function get_data(based_by, where_clause, where_condition, where_value){
    var string = btoa(based_by+'/'+where_clause+'/'+where_condition+'/'+where_value);
    $.ajax({
        url: base_url+"api/get_data_sum/"+string,
        type: "get",
        success: function(result){
            // console.log('data : '+result);
            var data = JSON.parse(result);
            var r = data['data']['regencies'];
            var d = data['data']['districts'];
            var s = data['data']['sub_districts'];
            $.each(r, function( index, value ) {
                root_view =  '<div class="col-lg-3 col-6">'+
                                '<div class="small-box bg-primary">'+
                                '<div class="inner">'+
                                    '<h3>'+value.count_by_regency+'</h3>'+
                                    '<p>'+value.name+'</p>'+
                                '</div>'+
                                '<div class="icon">'+
                                    '<i class="ion ion-pie-graph"></i>'+
                                '</div>'+
                                '<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>'+
                                '</div>'+
                            '</div>';
                $('.count_load').append(root_view);
            });
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('error', 'Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }
        }
    });
} 

function get_data_dropdown_regencies(table, where_clause, where_condition, where_value, class_view, area, select_dropdown){
    $('.regencies_reload').remove();
    var param = btoa(table+"/"+where_clause+"/"+where_condition+"/"+where_value);
    $.ajax({
        url: base_url+"api/get_data_where/"+param,
        type: "get",
        success: function(result){
            // console.log('data : '+result);
            var data = JSON.parse(result);
            var r = data['data'];
            var v;
            var id = new Array();
            $.each(r, function( index, value ) {
                v = v+'<option value="'+value.id+'">'+value.name+'</option>';
                id.push(value.id);
            });
            root_view =  '<div class="form-group regencies_reload">'+
                                '<label>'+area+'</label>'+
                                '<select class="form-control select2 '+select_dropdown+'" style="width: 100%;">'+
                                '<option value="not selected yet">- Pilih '+area+' -</option>'+
                                v+
                                '</select>'+
                            '</div>';
            $(class_view).append(root_view);
            $('.'+select_dropdown).on('change', function () {
                var selectVal = $(".select_regencies option:selected").val();
                // console.log(selectVal);
                get_data_dropdown_districts('districts_reload', 'districts', 'regency_id', '=', selectVal, '.districts_dropdown', 'Kecamatan', 'select_districts');
            });
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('error', 'Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }
        }
    });
} 

function get_data_dropdown_districts(reload, table, where_clause, where_condition, where_value, class_view, area, select_dropdown){
    $('.'+reload).remove();
    $('.sub_districts_reload').remove();
    var param = btoa(table+"/"+where_clause+"/"+where_condition+"/"+where_value);
    $.ajax({
        url: base_url+"api/get_data_where/"+param,
        type: "get",
        success: function(result){
            // console.log('data : '+result);
            var data = JSON.parse(result);
            var r = data['data'];
            var v;
            var id = new Array();
            $.each(r, function( index, value ) {
                v = v+'<option value="'+value.id+'">'+value.name+'</option>';
                id.push(value.id);
            });
            root_view =  '<div class="form-group '+reload+'">'+
                                '<label>'+area+'</label>'+
                                '<select class="form-control select2 '+select_dropdown+'" style="width: 100%;">'+
                                '<option value="not selected yet">- Pilih '+area+' -</option>'+
                                v+
                                '</select>'+
                            '</div>';
            $(class_view).append(root_view);
            $('.'+select_dropdown).on('change', function () {
                var selectVal = $(".select_districts option:selected").val();
                console.log(selectVal);
                get_data_dropdown_sub_districts('sub_districts', 'distric_id', '=', selectVal);
            });
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('error', 'Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }
        }
    });
} 

function get_data_dropdown_sub_districts(table, where_clause, where_condition, where_value){
    $('.sub_districts_reload').remove();
    var param = btoa(table+"/"+where_clause+"/"+where_condition+"/"+where_value);
    $.ajax({
        url: base_url+"api/get_data_where/"+param,
        type: "get",
        success: function(result){
            console.log('data : '+result);
            var data = JSON.parse(result);
            var r = data['data'];
            var v;
            $.each(r, function( index, value ) {
                v = v+'<option value="'+value.id+'">'+value.name+'</option>';
            });
            root_view =  '<div class="form-group sub_districts_reload">'+
                                '<label>Kelurahan/Desa</label>'+
                                '<select class="form-control select2 select_sub_districts" style="width: 100%;">'+
                                '<option value="not selected yet">- Pilih Kelurahan/Desa -</option>'+
                                v+
                                '</select>'+
                            '</div>';
            $('.sub_districts_dropdown').append(root_view);
            // $('.'+select_dropdown).on('change', function () {
            //     var selectVal = $(".select_regencies option:selected").val();
            //     // console.log(selectVal);
            //     get_data_dropdown('districts_reload', 'districts', 'regency_id', '=', selectVal, '.districts_dropdown', 'Kecamatan', 'select_districts');
            // });
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('error', 'Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }
        }
    });
} 