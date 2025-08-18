$(document).ready(function(){

    // admin panel delete function popups
    $(document).on('click', '.sa-confirm-delete', function() {
        var id = $(this).attr('param-id');
        var deleteFunction = $(this).attr('param-route');
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {

            if (result.value) {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            }
        })
    }); 

    // admin EMP
    // meeting points 

    var max_fields = 5; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col-md-9 mb-0"><div class="form-group"><label  for="">Meeting Point</label><input type="text" name="meeting_point[]" required="" class="form-control" ></div></div><button style="margin-top: 27px; height: 35px;" class="mdi mdi-minus remove_field btn btn-danger"></button></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });

    
    $('#employement_status').on('change', function() { 
       var status_id = $(this).val();
       //alert(status_id);
       if(status_id == "Left")
       {
        $("#left").removeClass("hidden");
       }
       else{
        $("#left").addClass("hidden");
       }
    });

    // search attandance by year, month, employee
    $('#search_by_year').on('change', function() { 
       var year = $(this).val();
       
        $("#search_by_month").prop("disabled", false);
        $("#search_by_employee").prop("disabled", false);

        $('#search_by_month').on('change', function() { 
            var month = $(this).val();

            console.log(year);
            console.log(month);

            $('#search_data').empty();
            
            $.ajax({
                url: '/admin/view-attendance/'+year+'/'+month,
                success: data => {
                    var citydd = $("#search_data").html('');
                    $('#search_data').append(data);
                    $('#search_data').prop("disabled", false);
                    console.log(data);

                    $("#exp_att_by_month").removeClass("hide");
                    $("#exp_att_by_emp").addClass("hide");

                    var repxlsx = '/admin/export-attendance/xlsx/'+year+'/'+month+'/0';
                    $('#exp_att_month_xlsx').attr('href', repxlsx);
                }

            });
           
            $('#search_by_employee').on('change', function() { 
                var employee_id = $(this).val();

                console.log(year);
                console.log(month);
                console.log(employee_id);

                $('#search_data').empty();
            
                $.ajax({
                    url: '/admin/view-attendance/'+year+'/'+month+'/'+employee_id,
                    success: data => {
                        var citydd = $("#search_data").html('');
                        $('#search_data').append(data);
                        $('#search_data').prop("disabled", false);
                        console.log(data);

                        $("#exp_att_by_month").addClass("hide");
                        $("#exp_att_by_emp").removeClass("hide");

                        var repxlsx = '/admin/export-attendance/xlsx/'+year+'/'+month+'/'+employee_id;
                        $('#exp_att_emp_xlsx').attr('href', repxlsx);
                    }

                });
               
               
            });
           
        });
       
    }); 

    // employee add daily report with assets

    var max_file_fields = 5; //maximum input boxes allowed
    var file_wrapper = $(".file_fields_wrap"); //Fields wrapper
    var file_add_button = $(".add_file_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $(file_add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_file_fields){ //max input box allowed
            x++; //text box increment
            $(file_wrapper).append('<div class="row"><div class="col-md-6"><div class="form-group"><label>Report Assets</label><input type="file" id="image" required="" name="dr_asset[]" class="form-control"></div></div><button style="margin-top: 27px; height: 35px;" class="mdi mdi-minus remove_file_field btn btn-danger"></button></div>'); //add input box
        }
    });

    $(file_wrapper).on("click",".remove_file_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });

    // search leave by year, month, employee
    $('#search_by_year').on('change', function() { 
        var year = $(this).val();
       
        $("#search_by_month").prop("disabled", false);
        $("#search_by_employee").prop("disabled", false);

        // select year employee
        $('#search_by_employee').on('change', function() { 
            var employee_id = $(this).val();

            $('#search_data_leave').empty();
        
            $.ajax({
                url: '/admin/view-leave-filter/'+year+'/0/'+employee_id,
                success: data => {
                    var citydd = $("#search_data").html('');
                    $('#search_data_leave').append(data);
                    $('#search_data_leave').prop("disabled", false);
                    // console.log(data);

                    $("#exp_leave_by_year").removeClass("hide");
                    $("#exp_leave_by_month").addClass("hide");
                    $("#exp_leave_by_emp").addClass("hide");

                    var repxlsx = '/admin/export-leave/xlsx/'+year+'/0/'+employee_id;
                    $('#exp_leave_year_xlsx').attr('href', repxlsx);
                }

            });
           
        });

        // select year month
        $('#search_by_month').on('change', function() { 
            var month = $(this).val();

            $('#search_data_leave').empty();
            
            $.ajax({
                url: '/admin/view-leave-filter/'+year+'/'+month+'/0',
                success: data => {
                    var citydd = $("#search_data_leave").html('');
                    $('#search_data_leave').append(data);
                    $('#search_data_leave').prop("disabled", false);
                    // console.log(data);

                    $("#exp_leave_by_year").addClass("hide");
                    $("#exp_leave_by_month").removeClass("hide");
                    $("#exp_leave_by_emp").addClass("hide");


                    $("#search_by_employee_month").removeClass("hide");
                    $("#search_by_employee_d").addClass("hide");

                    var repxlsx = '/admin/export-leave/xlsx/'+year+'/'+month+'/0';
                    $('#exp_leave_month_xlsx').attr('href', repxlsx);
                }

            });
           // select year month employee
            $('#search_by_year_month_employee').on('change', function() { 
                var employee_id = $(this).val();

                $('#search_data_leave').empty();
            
                $.ajax({
                    url: '/admin/view-leave-filter/'+year+'/'+month+'/'+employee_id,
                    success: data => {
                        var citydd = $("#search_data").html('');
                        $('#search_data_leave').append(data);
                        $('#search_data_leave').prop("disabled", false);
                        // console.log(data);

                        $("#exp_leave_by_year").addClass("hide");
                        $("#exp_leave_by_month").addClass("hide");
                        $("#exp_leave_by_emp").removeClass("hide");

                        var repxlsx = '/admin/export-leave/xlsx/'+year+'/'+month+'/'+employee_id;
                        $('#exp_leave_emp_xlsx').attr('href', repxlsx);
                    }

                });
               
               
            });
           
        });
       
    }); 

    // search daily report by year, month, employee
    $('#search_by_year').on('change', function() { 
       var year = $(this).val();
       
        $("#search_by_month").prop("disabled", false);
        $("#search_by_employee").prop("disabled", false);

        $('#search_by_month').on('change', function() { 
            var month = $(this).val();

            $('#search_daily_report').empty();
            
            $.ajax({
                url: '/admin/view-daily-report-filter/'+year+'/'+month+'/0',
                success: data => {
                    var citydd = $("#search_daily_report").html('');
                    $('#search_daily_report').append(data);
                    $('#search_daily_report').prop("disabled", false);
                    // console.log(data);

                    $("#exp_daily_report_by_month").removeClass("hide");
                    $("#exp_daily_report_by_emp").addClass("hide");

                    var repxlsx = '/admin/export-daily-report/xlsx/'+year+'/'+month+'/0';
                    $('#exp_daily_report_month_xlsx').attr('href', repxlsx);
                }

            });
           
            $('#search_by_employee').on('change', function() { 
                var employee_id = $(this).val();

                $('#search_daily_report').empty();
            
                $.ajax({
                    url: '/admin/view-daily-report-filter/'+year+'/'+month+'/'+employee_id,
                    success: data => {
                        var citydd = $("#search_daily_report").html('');
                        $('#search_daily_report').append(data);
                        $('#search_daily_report').prop("disabled", false);
                        // console.log(data);

                        $("#exp_daily_report_by_month").addClass("hide");
                        $("#exp_daily_report_by_emp").removeClass("hide");

                        var repxlsx = '/admin/export-daily-report/xlsx/'+year+'/'+month+'/'+employee_id;
                        $('#exp_daily_report_emp_xlsx').attr('href', repxlsx);
                    }

                });
               
               
            });
           
        });
       
    }); 

});