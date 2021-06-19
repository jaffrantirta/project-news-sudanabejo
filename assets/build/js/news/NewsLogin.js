var base_url = $('#base_url').text();
function login_page(){
    Swal.fire({
        title: 'Login',
        html:
        '<div class="justify-content-center">'+
            '<div class="col-12">'+
                '<div class="form-group">'+
                    '<input id="email_user" type="email" class="form-control" placeholder="Masukan email">'+
                '</div>'+
                '<div class="form-group">'+
                    '<input id="password_user" type="password" class="form-control" placeholder="Masukan password">'+
                '</div>'+
                '<div class="form-group">'+
                    '<button onclick="login_process()" class="btn btn-primary">Login</button>'+
                '</div>'+
            '</div>'+
        '</div>',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false
    });
}

function message($icon, $title, $message){
    Swal.fire({
        icon: $icon,
        html:
        '<div class="col-12">'+
        '<center>'+
        '<strong>'+$title+'</strong><br>'+
        '<small>'+$message+'</small>'+
        '</center>'+
        '</div>',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: true
    });
}

function login_process(){
    var email = $('#email_user').val();
    var password = $('#password_user').val();
    $.ajax({
        url: base_url+"api/login_user",
        type: 'post',
        data: {'email':email, 'password':password},
        success: function(result){
            console.log('login : '+result);
            var data = JSON.parse(result);
            var d = data.data[0];
            set_session(d.id, d.role_id, d.name, d.nik, d.sub_district_id, d.community_unit, d.email, d.date_of_birth, d.sex, d.occupation_id, d.profile_photo, d.ktp_photo, d.whatsapp_number);
        },
        error: function(error, x, y){
            console.log('error : '+error);
            message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            var msg = JSON.parse(error.responseText);
            if(msg.response.status != false){
                message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            }
        }
    })
}
function profile(){
    Swal.fire({
        html:
        '<button onclick="logout()" class="btn btn-danger">Logout</button>',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false
    })
}
function logout(){
    Swal.fire({
        title: 'Yakin logout ?',
        confirmButtonText:'Ya, logout'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url+'api/logout',
                type: 'get',
                success: function(result){
                    message('success', 'Logout berhasil', '');
                    location.reload();
                },
                error: function(error, x, y){
                    message('error', 'Logout gagal', '');
                }
            })
        }
      });
}
function set_session(id, role_id, user_name, nik, sub_district_id, community_unit, email, date_of_birth, sex, occupation_id, profile_photo, ktp_photo, whatsapp_number){
    $.ajax({
        url: base_url+"api/set_session",
        type: "post",
        data: 
        {
            'id':id, 
            'role_id':role_id, 
            'name':user_name,
            'nik':nik,
            'sub_district_id':sub_district_id,
            'community_unit':community_unit,
            'email':email,
            'date_of_birth':date_of_birth,
            'sex':sex,
            'occupation_id':occupation_id,
            'profile_photo':profile_photo,
            'ktp_photo':ktp_photo,
            'whatsapp_number':whatsapp_number,
            'user_auth':'authenticated_user'
        },
        success: function(result){
            message('success', 'Login berhasil', '');
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            // console.log('data : '+xhr.responseText);
            message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            var msg = JSON.parse(xhr.responseText);
            if(msg.response.status != false){
                message('error', 'Oops! sepertinya ada kesalahan', 'kesalahan tidak diketahui');
            }
        }
    });
}