$(document).ready(function () {

    $.extend(true, $.fn.dataTable.defaults, {
        processing: true,
        serverSide: true,
        autoWidth: false,
        pagingType: "full_numbers",
        // dom: 'tr<"bottom"pli><"clear">',
        // dom 	   : "rt <'row' <'col-md-1'l><'col-md-1'i><'col-md-10'p> >",
        // edited by Yulianto
        dom: "<'row'<'col-xs-12 mb10'tr>>" +
                "<'row'<'col-md-5'l><'col-md-7 pull-right'p>>" +
                "<'row'<'col-xs-12'i>>",
        pageLength: 10,
        lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, 'All']],
        language: {
            thousands: ".",
            processing: "Memuat data. Silahkan tunggu...",
            emptyTable: "Tidak ada data.",
            lengthMenu: "_MENU_",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 baris",
            info: "Menampilkan _START_ - _END_ dari _TOTAL_ baris",
            loadingRecords: "Silahkan tunggu",
            paginate: {
                first: "<<",
                last: ">>",
                next: ">",
                previous: "<"
            },
            infoFiltered: '',
        },
    });


    jQuery('.numbersOnly').keyup(function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });


       
});


$.extend($.fn.autoNumeric.defaults, {
  aSep: ',' ,
  mDec : 0,
});

// message jQuery Validator (Yulianto)

$.extend(jQuery.validator.messages, {
    required: "Tidak boleh kosong.",
    email: "Masukan alamat email yang benar.",
    url: "Format URL salah.",
    date: "Format Tanggal salah.",
    number: "Masukan angka.",
    maxlength: jQuery.validator.format("Tidak boleh lebih dari {0} karakter."),
    minlength: jQuery.validator.format("Tidak boleh kurang dari {0} karakter."),
    max: jQuery.validator.format("Nilai tidak boleh lebih dari {0}."),
    min: jQuery.validator.format("Nilai tidak boleh kurang dari {0}."),
    minNumeric: jQuery.validator.format("Nilai tidak boleh kurang dari {0}."),
});


// Inisiation of jQuery Validator (Yulianto)

$.validator.setDefaults({
    errorElement: "em",
    errorPlacement: function (error, element) {
        if (element.parent('.form-group').length) { 
            error.insertAfter(element.parent());      // radio/checkbox?

        } else if (element.hasClass('select2')) {     
            error.insertAfter(element.next('span'));  // select2

        } else if (element.hasClass('spinner')) {     
           error.insertAfter(element.parent().closest('div'));  // spinner
        }

        else {                                      
            error.insertBefore(element);               // default
        }
        
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).parent('.form-group').removeClass("has-error");
        $(element).closest('.form-group').removeClass("has-error");
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    // onkeyup: function(element){$(element).valid()},
    onchange: function(element){$(element).valid()},
});

// Public function for gritter (Yulianto)

function show_gritter(type, title, message) {

    if (type == 'warning') {

        $.gritter.add({
          title: title,
          text: message,
          class_name: 'growl-warning',
          icon: 'exclamation-circle',
        });
    }

    else if (type == 'error') {

        $.gritter.add({
          title: title,
          text: message,
          class_name: 'growl-danger',
          icon: 'times-circle',
        });
    }

    else if (type == 'info') {

        $.gritter.add({
          title: title,
          text: message,
          class_name: 'growl-info',
          icon: 'info-circle',
        });
    }

     else if (type == 'success') {

        $.gritter.add({
          title: title,
          text: message,
          class_name: 'growl-success',
          icon: 'check-circle',
        });
    }
}

// $(".number").keypress(function (e) {
//      //if the letter is not digit then display error and don't type anything
//      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//         //display error message
//         $("#errmsg").html("Digits Only").show().fadeOut("slow");
//                return false;
//     }
// });
$('.number').autoNumeric({
  aSep: ',' ,
  mDec : 0,
});

        
$('.select-2').select2();

// handle bootstrap modal for select2

$.fn.modal.Constructor.prototype.enforceFocus =function(){};

// tooltip

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// ckeditor
$('.ckeditor').ckeditor();

// dragdrop effect

$('.small-drag-drop').on('dragover', function(){
    $(this).css('border', '2px dashed #1E8BC3');
});

$('.small-drag-drop').on('dragleave', function(){
    $(this).css('border', '2px dashed #ccc');
});

// spinner

$('.spinner').spinner({
   min: 1
});

// datepicker

$('.datepicker').datepicker({
   dateFormat: "yy-mm-dd"
});
