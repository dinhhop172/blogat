$(document).ready(function() {

// $.ajax({
//   url: '?c=admin&a=data',
//   method: 'get',
//   contentType: 'application/json',
//   success: function(response){
//     $json = JSON.parse(response);
//     $entries = {"data" : $json};
//     $json2 = JSON.stringify($entries);
//     console.log($json2);
    $('#example').DataTable({});
    // $('#myModal').modal({backdrop: 'static', keyboard: false})  
    //   $('#example').dataTable( {
    //       "ajax": $json2,
    //       "columns": [
    //           { "data": "name" },
    //           { "data": "email" },
    //           { "data": "role" },
    //           { "data": "created_at" }
    //       ]
    //   })
    // }
// })


// $.ajax({
//   url: "?c=admin&a=data",
//   method: "GET"
// }).done( function(data) {
//     $('#example').dataTable( {
//         "aaData": data,
//         "columns": [
//             { "data": "name" },
//             { "data": "email" },
//             { "data": "role" },
//             { "data": "created_at" }
//         ]
//     })
// })

$('#addtv').on('click', function(e){
    if($("#addtv-form")[0].checkValidity()){
        e.preventDefault();
        $.ajax({
            url: "?c=admin&a=store",
            method: "post",
            data: $("#addtv-form").serialize()+"&action=addmm",
            success: function(response){
            if(response == 'success'){
                window.location = '?c=admin';
            }else{
                $('.err_add_mm').html(response);
            }
            },
            error: function(err){
            console.log(err);
            }
        })
    }
});

$('#adddm_sub').on('click', function(e){
    if($("#adddm-form")[0].checkValidity()){
        e.preventDefault();
        $.ajax({
            url: "?c=category&a=store",
            method: "post",
            data: $("#adddm-form").serialize()+"&action=adddm",
            success: function(response){
            if(response == 'success'){
                window.location = '?c=category';
            }else{
                $('.err_add_dm').html(response);
            }
            },
            error: function(err){
            console.log(err);
            }
        })
    }
})

// $("#update_mm").click(function(e){
//   e.preventDefault();
//   $err = "<div id='alert-err' class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong id='str_err_pw' class='text-center'></strong></div>";
//   if($("#password").val() < 5){
//     $("#app_update").prepend($err);
//     $('#str_err_pw').text('Mật khẩu tối thiểu 5 ký tự');
//   }else{
//     $('#alert-err').remove();
//     return true;
//   }
//   return true;
// });
    $('#showImg').hide();
    $('#img').on('change', function(){
        var property = document.getElementById('img').files[0];
        $('#showImg').show();
        if (property) {
            $('#showImg').attr('src', URL.createObjectURL(property));
        }
    });

$("#addpost_sub").on('click', function(e){
    if($("#addpost-form")[0].checkValidity()){
        e.preventDefault();
        var property = document.getElementById('img').files[0];
        // var image_name = property.name;
        // var image_extension = image_name.split('.').pop().toLowerCase();

        // var form_data = new FormData();
        
        // form_data.append("file",property);
        var form_data = new FormData($('#addpost-form')[0]);
        $.ajax({
            url: '?c=post&a=store',
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            data: form_data,
            success: function(response){
            if(response == 'success'){
                window.location = '?c=post';
            }else{
                $('.err_add_post').html(response);
            }
            },
            error: function(e){
            console.log(e);
            }
        });
    }else{
        $('.err_add_post').html("<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong class='text-center'>Thiếu dữ liệu</strong></div>");
    }
});

// $('#update_post').submit(function(e){
//   if($("#update_post")[0].checkValidity()){
//     e.preventDefault();
//     var form_data = new FormData($(this)[0]);
//     var url = $(this).data('route');
//     $.ajax({
//       url: url,
//       method: 'post',
//       processData: false,
//       contentType: false,
//       cache: false,
//       data: form_data,
//       success: function(response){
//         if(response == 'success'){
//           window.location = '?c=post';
//         }else{
//           $('.err_update_post').html(response);
//         }
//       },
//       error: function(e){
//         console.log(e);
//       }
//     });
//   }else{
//     $('.err_update_post').html("<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong class='text-center'>Nhap du du lieu</strong></div>");
//   }
// });

    $('#update_post_img').on('change', function(e){
        $('#img_post_update').hide();
        var property = document.getElementById('update_post_img').files[0];
        if (property) {
        $('#img_post_update').attr('src', URL.createObjectURL(property));
        $('#img_post_update').show();
        }
    });
});

function example_image_upload_handler(blobInfo, success, failure, progress) {
    var xhr, formData;

    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', '?c=post&a=upload');

    xhr.upload.onprogress = function(e) {
        progress(e.loaded / e.total * 100);
    };

    xhr.onload = function() {
        var json;

        if (xhr.status === 403) {
        failure('HTTP Error: ' + xhr.status, {
            remove: true
        });
        return;
        }

        if (xhr.status < 200 || xhr.status >= 300) {
        failure('HTTP Error: ' + xhr.status);
        return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
        }

        success(json.location);
    };

    xhr.onerror = function() {
        failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };

    formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
};
    
tinymce.init({
    selector: 'textarea#mytextarea',
    // theme_advanced_resizing: true,
    // theme_advanced_resizing_use_cookie : false,
    min_height: 400,
    plugins: 'image code',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    images_upload_handler: example_image_upload_handler,
    setup: function (editor) {
        editor.on('change', function (e) {
        editor.save();
    });
    }
});