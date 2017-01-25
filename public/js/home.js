
function on_save(){

    data = $('#form-status').serializeArray();
    console.log(data);

    if (form == true) {
        $.ajax({
            url: SITE_URL + 'home/save',
            type: 'POST',
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'JSON',
            beforeSend: function(){
               // $('#btn-save-arisan').attr('disabled', 'disabled');
               // $('#btn-save-arisan').html('<i class="fa fa-spinner fa-pulse"></i> Memuat ...');
            },
            success: function(data){

               // refresh_form_arisan();
                //show_gritter(data.type, data.title, data.message);
                //reload_table_arisan();

            },
            error: function(xhr, status, error) {

               // refresh_form_arisan();
                //reload_table_arisan();
               // show_gritter('error', 'Galat', error);

            },
        });
    }

}


function get_arisan(id){

    var request = $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'GET',
        dataType:'json',
        async: false,
        url: SITE_URL + 'arisan/get/'+id,
    });

    return request.responseJSON;
}

function on_edit_arisan(){
    if ($('.children-arisan:checked').length == 0) {
        show_gritter('info', 'Informasi', 'Silahkan pilih data!');
    }
    else if ($('.children-arisan:checked').length > 1) {
        show_gritter('warning', 'Peringatan', 'Hanya satu data!');
    }
    else {

        var id = $('.children-arisan:checked').val();
        var data_arisan = get_arisan(id);
        edit_form_arisan(data_arisan);
    }
}

function edit_form_arisan(data_arisan) {
    //console.log(data_arisan);
    $('#modal-arisan').modal('show');
    $('#flag').val('1');
    $('#arisan-id').val(data_arisan.id);
    $('#arisan-nama').val(data_arisan.nama);
    $('#arisan-alamat').val(data_arisan.alamat);
    $('#form-arisan-title').text('Ubah Data Anggota');
    $('#btn-save-arisan').text('Simpan Perubahan');
}


$('.parent-arisan').click(function(even){
    if(this.checked) {
        // Iterate each checkbox
        $('.children-arisan').each(function() {
            this.checked = true;                        
        });
    }
    else
    {
        $('.children-arisan').each(function() {
            this.checked = false;                        
        });
    }
});

function on_drop_arisan() {

    if ($('.children-arisan:checked').length == 0) {
        show_gritter('info', 'Informasi', 'Silahkan pilih data!');
    }

    else {

        $('#modal-arisan-question').modal('show');
    }  

}

function on_confirm_delete_arisan() {

    var id = [];

    $('.children-arisan:checked').each(function(){
        id.push($(this).val());
    });

    $.ajax({

        url: SITE_URL + 'arisan/drop',
        dataType: 'JSON',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id: id,
        },

        beforeSend: function(){
                $('#btn-yes-arisan').attr('disabled', 'disabled');
                $('#btn-yes-arisan').html('<i class="fa fa-spinner fa-pulse"></i> Memuat ...');
        },
        success: function(data){

            refresh_form_arisan();
            show_gritter(data.type, data.title, data.message);
            reload_table_arisan();

        },
        error: function(xhr, status, error) {

            refresh_form_arisan();
            reload_table_arisan();
            show_gritter('error', 'Galat', error);

        },

    });

}

function on_bayar_arisan() {

    if ($('.children-arisan:checked').length == 0) {
        show_gritter('info', 'Informasi', 'Silahkan pilih data!');
    }

    else {

        $('#modal-arisan-bayar').modal('show');
    }  

}

function on_confirm_bayar_arisan() {

    var id = [];

    $('.children-arisan:checked').each(function(){
        id.push($(this).val());
    });

    $.ajax({

        url: SITE_URL + 'arisan/bayar',
        dataType: 'JSON',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id: id,
        },

        beforeSend: function(){
                $('#btn-yes-arisan').attr('disabled', 'disabled');
                $('#btn-yes-arisan').html('<i class="fa fa-spinner fa-pulse"></i> Memuat ...');
        },
        success: function(data){

            refresh_form_arisan();
            show_gritter(data.type, data.title, data.message);
            reload_table_arisan();

        },
        error: function(xhr, status, error) {

            refresh_form_arisan();
            reload_table_arisan();
            show_gritter('error', 'Galat', error);

        },

    });

}


function on_kocok_arisan() {
    $('#modal-arisan-kocok').modal('show');
}

function on_confirm_kocok_arisan() {

    $.ajax({

        url: SITE_URL + 'arisan/kocok',
        dataType: 'JSON',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
           // id: id,
        },

        beforeSend: function(){
                $('#btn-yes-arisan').attr('disabled', 'disabled');
                $('#btn-yes-arisan').html('<i class="fa fa-spinner fa-pulse"></i> Memuat ...');
        },
        success: function(data){

            refresh_form_arisan();
            show_gritter(data.type, data.title, data.message);
            reload_table_arisan();

        },
        error: function(xhr, status, error) {

            refresh_form_arisan();
            reload_table_arisan();
            show_gritter('error', 'Galat', error);

        },

    });

}


