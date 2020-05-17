<!-- footer -->
</div>
<!-- TUTUP <div id="main-wrapper"> -->

<!-- <footer class="footer text-right">
    All Rights Reserved by <a href="https://ultranesia.com" target="blank">ultranesia.com</a> Designed and Developed by
    <a href="https://wrappixel.com">WrapPixel</a>.
</footer> -->
<!-- <div class="chat-windows"></div> -->

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script> -->
<!-- All Jquery -->
<script src="<?= asset('website/nice/assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= asset('website/nice/assets/libs/popper.js/dist/umd/popper.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- apps -->
<script src="<?= asset('website/nice/dist/js/app.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/app.init.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/app-style-switcher.js'); ?>"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= asset('website/nice/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/extra-libs/sparkline/sparkline.js'); ?>"></script>
<!--Wave Effects -->
<script src="<?= asset('website/nice/dist/js/waves.js'); ?>"></script>
<!--Menu sidebar -->
<script src="<?= asset('website/nice/dist/js/sidebarmenu.js'); ?>"></script>
<!--Custom JavaScript -->
<script src="<?= asset('website/nice/dist/js/custom.js'); ?>"></script>
<!--This page JavaScript -->
<!--chartis chart-->


<script src="<?= asset('website/nice/assets/libs/chartist/dist/chartist.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js'); ?>"></script>
<!--c3 charts -->
<script src="<?= asset('website/nice/assets/extra-libs/c3/d3.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/extra-libs/c3/c3.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/dashboards/dashboard3.js'); ?>"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoliAneRffQDyA7Ul9cDk3tLe7vaU4yP8"></script>
<script src="<?= asset('website/nice/assets/libs/gmaps/gmaps.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/maps/map-google.init.js'); ?>"></script>

<script src="<?= asset('website/nice/assets/libs/moment/moment.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>

<!-- select2 -->
<script src="<?= asset('website/nice/assets/libs/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/select2/dist/js/select2.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/forms/select2/select2.init.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= asset('website/nice/dist/js/pages/datatable/datatable-basic.init.js'); ?>"></script>

<script src="<?= asset('website/nice/assets/libs/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= asset('website/nice/assets/libs/sweetalert2/sweet-alert.init.js'); ?>"></script>


<script>
    $(function() {
        $("#datepicker-autoclose11").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        local = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        $('#datepicker-autoclose11').datepicker()
            .on("change", function() {
                var today = new Date($('#datepicker-autoclose11').datepicker('getDate'));
                //alert(local[today.getDay()]);
                $('#hari_nikah').val(local[today.getDay()]);
            });

    });
</script>


<script>
    jQuery('#datepicker-autoclose,#datepicker-autoclose2,#datepicker-autoclose3,#datepicker-autoclose4,#datepicker-autoclose5,#datepicker-autoclose6,#datepicker-autoclose7,#datepicker-autoclose8,#datepicker-autoclose9,#datepicker-autoclose10,#datepicker-autoclose11,#datepicker-autoclose12').datepicker({
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'dd/mm/yy'
    });
    /*******************************************/
    // Basic Date Range Picker
    /*******************************************/
    $('.daterange').daterangepicker();
    /*******************************************/
    // Date & Time
    /*******************************************/
    $('.datetime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    /*******************************************/
    //Calendars are not linked
    /*******************************************/
    $('.timeseconds').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        timePicker24Hour: true,
        timePickerSeconds: true,
        locale: {
            format: 'MM-DD-YYYY h:mm:ss'
        }
    });

    /*******************************************/
    // Single Date Range Picker
    /*******************************************/
    $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    /*******************************************/
    // Auto Apply Date Range
    /*******************************************/
    $('.autoapply').daterangepicker({
        autoApply: true,
    });

    /*******************************************/
    // Calendars are not linked
    /*******************************************/
    $('.linkedCalendars').daterangepicker({
        linkedCalendars: false,
    });

    /*******************************************/
    // Date Limit
    /*******************************************/
    $('.dateLimit').daterangepicker({
        dateLimit: {
            days: 7
        },
    });

    /*******************************************/
    // Show Dropdowns
    /*******************************************/
    $('.showdropdowns').daterangepicker({
        showDropdowns: true,
    });

    /*******************************************/
    // Show Week Numbers
    /*******************************************/
    $('.showweeknumbers').daterangepicker({
        showWeekNumbers: true,
    });

    /*******************************************/
    // Date Ranges
    /*******************************************/
    $('.dateranges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    /*******************************************/
    // Always Show Calendar on Ranges
    /*******************************************/
    $('.shawCalRanges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });

    /*******************************************/
    // Top of the form-control open alignment
    /*******************************************/
    $('.drops').daterangepicker({
        drops: "up" // up/down
    });

    /*******************************************/
    // Custom button options
    /*******************************************/
    $('.buttonClass').daterangepicker({
        drops: "up",
        buttonClasses: "btn",
        applyClass: "btn-info",
        cancelClass: "btn-danger"
    });

    /*******************************************/
    // Language
    /*******************************************/
    $('.localeRange').daterangepicker({
        ranges: {
            "Aujourd'hui": [moment(), moment()],
            'Hier': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Les 7 derniers jours': [moment().subtract('days', 6), moment()],
            'Les 30 derniers jours': [moment().subtract('days', 29), moment()],
            'Ce mois-ci': [moment().startOf('month'), moment().endOf('month')],
            'le mois dernier': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        locale: {
            applyLabel: "Vers l'avant",
            cancelLabel: 'Annulation',
            startLabel: 'Date initiale',
            endLabel: 'Date limite',
            customRangeLabel: 'SÃ©lectionner une date',
            // daysOfWeek: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi'],
            daysOfWeek: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            monthNames: ['Janvier', 'fÃ©vrier', 'Mars', 'Avril', 'ÐœÐ°i', 'Juin', 'Juillet', 'AoÃ»t', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
            firstDay: 1
        }
    });
</script>

<script src="<?= asset('website/nice/assets/libs/jquery.repeater/jquery.repeater.min.js') ?>"></script>
<script src="<?= asset('website/nice/assets/extra-libs/jquery.repeater/repeater-init.js') ?>"></script>
<script src="<?= asset('website/nice/assets/extra-libs/jquery.repeater/dff.js') ?>"></script>
</body>

</html>