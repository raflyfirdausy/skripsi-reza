$(function() {
    'use strict';

    // Default
    $('.repeater-default').repeater();

    // Custom Show / Hide Configurations
    $('.file-repeater, .email-repeater').repeater({
        show: function() {
            $(this).slideDown();
            $('.select2-container').remove();
            $('.select-mantap').select2({
                placeholder: "Pilih Barang",
                allowClear: true
            });
            $('.select2-container').css('width', '100%');
        },
        hide: function(remove) {
            if (confirm('Hapus barang ini ?')) {
                $(this).slideUp(remove);
            }
        }
    });


});