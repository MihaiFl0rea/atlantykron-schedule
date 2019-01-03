/**
 * Created by Mihai on 7/15/2018.
 */

jQuery(document).on('ready', function(){

    /**
     * On-click handler to dynamically delete data from db and also remove it from DOM
     */
    $('button.delete-year').on('click', function(){
        var id = $(this).attr('id');

        $.post('delete-year', {id: id}, function(){
            $("#year-record-"+id).fadeOut("slow", function() {
                // remove element
                $(this).remove();
            });
        });
    });

    /**
     * On-click handler to dynamically delete data from db and also remove it from DOM
     */
    $('button.delete-location').on('click', function(){
        var id = $(this).attr('id');

        $.post('delete-location', {id: id}, function(){
            $("#location-record-"+id).fadeOut("slow", function() {
                // remove element
                $(this).remove();
            });
        });
    });

    /**
     * On-click handler to dynamically delete data from db and also remove it from DOM
     */
    $('button.delete-teacher').on('click', function(){
        var id = $(this).attr('id');

        $.post('delete-teacher', {id: id}, function(){
            $("#teacher-record-"+id).fadeOut("slow", function() {
                // remove element
                $(this).remove();
            });
        });
    });

    /**
     * On-click handler to dynamically delete data from db and also remove it from DOM
     */
    $('button.delete-day').on('click', function(){
        var id = $(this).attr('id');

        $.post('delete-day', {id: id}, function(){
            $("#day-record-"+id).fadeOut("slow", function() {
                // remove element
                $(this).remove();
            });
        });
    });

    /**
     * Initiate datepicker
     */
    $(function(){
        $('#timestamp').datepicker();
    });

    /**
     * On-click handler to dynamically delete data from db and also remove it from DOM
     */
    $('button.delete-class').on('click', function(){
        var id = $(this).attr('id');

        $.post('delete-class', {id: id}, function(){
            $("#class-record-"+id).fadeOut("slow", function() {
                // remove element
                $(this).remove();
            });
        });
    });

    /**
     * On-click handler to dynamically delete data from db and also remove it from DOM
     */
    $('.main-panel').on('click', '.delete-class-schedule', function(){
        var id = $(this).attr('id');

        $.post('delete-class-schedule', {id: id}, function(){
            $("#class-schedule-record-"+id).fadeOut("slow", function() {
                // remove element
                $(this).remove();
            });
        });
    });

    /**
     * Initiate timepicker
     */
    $(function(){
        $('#start_hour, #end_hour').timepicker({ 'timeFormat': 'H:i:s' });
    });

    /**
     * Initiate datatable
     */
    $(function(){
        $('#class_schedules_table, #classes_table, #teachers_table, #locations_table, #days_table, #years_table, #daily_class_schedules_table').DataTable();
    });

    /**
     * Initiate select2
     */
    $(function(){
        $('#id_day, #id_location, #id_class, #id_year').select2();
    });

    /**
     * Initiate custom select2
     */
    $(function(){
        $('#id_teacher').select2({closeOnSelect:false});
    });
});