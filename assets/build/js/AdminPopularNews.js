function add_popular_news(){
    $.ajax({
        url: base_url+"api/get_data_news/news",
        type: "get",
        success: function(result){
            var v = "'add_popular_news'";
            // console.log('data 222 : '+result);
            var data = JSON.parse(result);
            var size = data.data.length;
            var i = 0;
            var txt;
            var d;
            for(i=0;i<size;i++){
                d = data.data[i];
                txt = txt+'<option value="'+d.id+'" >'+d.title+'</option>';
            }
            Swal.fire({
                html:
                '<div class="form-group">'+
                    '<label>Tambah Berita Populer</label><br>'+
                    '<small id="msg_select" hidden style="color: red">pilih judul berita terlebih dahulu</small>'+
                    '<select title="pilih judul berita" id="select" class="form-control select2" style="width: 100%;">'+
                        '<option value="not selected yet">Pilih Judul Berita</option>'+
                        txt+
                    '</select>'+
                '</div>'+
                '<div class="form-group">'+
                    '<button class="btn btn-primary btn-sm" onClick="action_check('+v+')">tambah</button>'+
                '</div>',
                showConfirmButton: false
            });
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }else{
                error_message('Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            }
        }
    });
}

function add_popular_news_process(news_id){
    $.ajax({
        url: base_url+"api/insert_popular_news",
        type: "post",
        data: {'news_id':news_id},
        success: function(result){
            // console.log('data : '+result);
            var data = JSON.parse(result);
            Swal.fire({
                allowOutsideClick: false,
                text: data.response.message['indonesia'],
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload(true);
                }
              });
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }else{
                error_message('Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            }
        }
    });
}
function edit_popular_news(id){
    $.ajax({
        url: base_url+"api/edit_popular_news_view/"+id,
        type: "get",
        success: function(result){
            var v = "'update_popular_news'";
            // console.log('data : '+result);
            var data = JSON.parse(result);
            var size = data.data.districts.length;
            var i = 0;
            var txt;
            var d;
            for(i=0;i<size;i++){
                d = data.data.districts[i];
                txt = txt+'<option value="'+d.id+'" >'+d.name+'</option>';
            }
            Swal.fire({
                html:
                '<div class="form-group">'+
                    '<label>Edit Kelurahan/Desa</label><br>'+
                    '<small id="msg_select" hidden style="color: red">pilih kecamatan terlebih dahulu</small>'+
                    '<input id="id" type="hidden" value="'+data.data.popular_news[0]['id']+'">'+
                    '<select title="pilih kecamatan" id="select" class="form-control select2" style="width: 100%;">'+
                        '<option value="'+data.data.popular_news[0]['distric_id']+'">'+data.data.popular_news['districts'][0]['name']+' (dipilih)</option>'+
                        txt+
                    '</select>'+
                '</div>'+
                '<div class="form-group">'+
                    '<small id="msg_districts" hidden style="color: red">nama kecamatan harus diisi</small>'+
                    '<input title="nama ke  lurahan/desa" id="name_to_be_add" class="form-control" type="text" placeholder="Nama Kelurahan/Desa" value="'+data.data.popular_news[0]['name']+'">'+
                '</div>'+
                '<div class="form-group">'+
                    '<button class="btn btn-primary btn-sm" onClick="action_check('+v+')">edit</button>'+
                '</div>',
                showConfirmButton: false
            });
            
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('success', 'Oops! sepertinya ada kesalahan', msg.response.message['indonesia']);
            }else{
                error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            }
        }
    });
}
function delete_popular_news(id){
    Swal.fire({
        title: 'Yakin Hapus ?',
    }).then((result) => {
        if (result.isConfirmed) {
            delete_data_popular_news(id);
        }
    });
}
function delete_data_popular_news(id){
    // console.log(id);
    $.ajax({
        url: base_url+"api/delete_popular_news",
        type: "post",
        data: {"id":id},
        success: function(result){
            // console.log('data : '+result);
            var data = JSON.parse(result);
            Swal.fire({
                title: data.response.message['indonesia'],
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload(true);
                }
              });
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('success', 'Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }else{
                error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            }
        }
    });
}
function update_popular_news_process(popular_news_name, districts_id, id){
    // console.log('update_popular_news_process : '+districts_id);
    $.ajax({
        url: base_url+"api/update_popular_news",
        type: "post",
        data: {'popular_news_name':popular_news_name, 'distric_id':districts_id, 'id':id},
        success: function(result){
            // console.log('data : '+result);
            var data = JSON.parse(result);
            Swal.fire({
                allowOutsideClick: false,
                text: data.response.message['indonesia']
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload(true);
                }
            });
        },
        error: function (result, ajaxOptions, thrownError) {
            // console.log('data : '+result.responseText);
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('success', 'Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }else{
                error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            }
        }
    });
}