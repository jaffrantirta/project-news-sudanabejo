// $(document).ready(function() {
//     $("#but_upload").click(function() {
//         var fd = new FormData();
//         var files = $('#file')[0].files[0];
//         fd.append('file', files);
//         var category = $("#select_news_category").val();
//         var title = $('#news_title').val();
//         var content = $('#news_content').val();
//         var string = JSON.stringify(fd);
//         console.log('hehe : '+fd);

//         $.ajax({
//             url: 'upload.php',
//             type: 'post',
//             data: fd,
//             contentType: false,
//             processData: false,
//             success: function(response){
//                 if(response != 0){
//                    alert('file uploaded');
//                 }
//                 else{
//                     alert('file not uploaded');
//                 }
//             },
//         });
//     });
// });
function create_news(){
    var category = $("#select_news_category").val();
    var title = $('#news_title').val();
    var content = $('#news_content').val();
    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file', files);
    var string = JSON.stringify(fd);
    console.log('hehe : '+string);
    // if(category != 'not select yet'){
    //     if(title != ''){
    //         if(content != ''){
    //             if(fd != '{}'){
    //                 create_news_process(title, content, category, fd);
    //             }else{
    //                 $('#msg_photo').attr('hidden', false);
    //             }
    //         }else{
    //             $('#msg_content').attr('hidden', false);
    //         }
    //     }else{
    //         $('#msg_title').attr('hidden', false);
    //     }
    // }else{
    //     $('#msg_category').attr('hidden', false);
    // }
}

function create_news_process(title, content, category, fd){
    $.ajax({
        url: base_url+"api/insert_news",
        type: "post",
        data: {'title':title, 'content':content, 'category':category},
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
            error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('error', 'Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }
        }
    });
}
function delete_news(id){
    Swal.fire({
        title: 'Yakin Hapus ?',
    }).then((result) => {
        if (result.isConfirmed) {
            delete_data_news(id);
        }
    });
}
function delete_data_news(id){
    // console.log(id);
    $.ajax({
        url: base_url+"api/delete_news",
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
            error_message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            if(result.response.status == false){
                var string = JSON.stringify(result.responseText);
                var msg = JSON.parse(result.responseText);
                error_message('error', 'Oops! sepertinya ada kesalahan', msg.message['indonesia']);
            }
        }
    });
}