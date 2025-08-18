$(document).ready(function(){

	$('#select-class').select2();
	$('#service_id').select2();
	$('#project_id').select2();

	$('#employement_status').select2();
	$('#user_employee_id').select2();
	$('#meeting_user_employee_id').select2();
	$('#search_by_year').select2();
	$('#search_by_month').select2();
	$('#search_by_employee').select2();
	$('#search_by_year_month_employee').select2();
	$('#work_type').select2();
	$('#section_condition').select2();

	// home section
    $(document).on("change", "#section_condition", function() {

        var section_condition = $("#section_condition").val();    

        if (section_condition == 1) {

            $('#title_f').removeClass('hide'); 
            $('#title_sec').removeClass('hide'); 
            $('#dec_f').removeClass('hide'); 
            $('#img_f').addClass('hide'); 

            $('#dec_sec').addClass('hide'); 
            $('#img_sec').addClass('hide'); 

        } else if (section_condition == 2) {

            $('#title_f').addClass('hide'); 
            $('#dec_f').addClass('hide'); 
            $('#img_f').removeClass('hide'); 

            $('#title_sec').addClass('hide'); 
            $('#dec_sec').addClass('hide'); 
            $('#img_sec').addClass('hide'); 
            
        }  else if (section_condition == 3 || section_condition == 4) {

            $('#title_f').removeClass('hide'); 
            $('#title_sec').removeClass('hide'); 
            $('#dec_f').removeClass('hide'); 
            $('#img_f').removeClass('hide'); 

            $('#dec_sec').addClass('hide'); 
            $('#img_sec').addClass('hide'); 
            
        }  else if (section_condition == 5) {

            $('#title_f').removeClass('hide'); 
            $('#title_sec').removeClass('hide'); 
            $('#dec_f').removeClass('hide'); 
            $('#img_f').addClass('hide'); 

            $('#dec_sec').removeClass('hide'); 
            $('#img_sec').addClass('hide'); 
            
        }  else if (section_condition == 6) {

            $('#title_f').addClass('hide'); 
            $('#dec_f').addClass('hide'); 
            $('#img_f').removeClass('hide'); 

            $('#title_sec').addClass('hide'); 
            $('#dec_sec').addClass('hide'); 
            $('#img_sec').removeClass('hide'); 
            
        }  else {

            $('#title_f').addClass('hide'); 
            $('#dec_f').addClass('hide'); 
            $('#img_f').addClass('hide'); 

            $('#title_sec').addClass('hide'); 
            $('#dec_sec').addClass('hide'); 
            $('#img_sec').addClass('hide'); 
            
        } 
        
    });


});

$(window).on('load', function() {

    var section_condition = $("#section_condition").val();    

    if (section_condition == 1) {

        $('#title_f').removeClass('hide'); 
        $('#title_sec').removeClass('hide'); 
        $('#dec_f').removeClass('hide'); 
        $('#img_f').addClass('hide'); 

        $('#dec_sec').addClass('hide'); 
        $('#img_sec').addClass('hide'); 

    } else if (section_condition == 2) {

        $('#title_f').addClass('hide'); 
        $('#dec_f').addClass('hide'); 
        $('#img_f').removeClass('hide'); 

        $('#title_sec').addClass('hide'); 
        $('#dec_sec').addClass('hide'); 
        $('#img_sec').addClass('hide'); 
        
    }  else if (section_condition == 3 || section_condition == 4) {

        $('#title_f').removeClass('hide'); 
        $('#title_sec').removeClass('hide'); 
        $('#dec_f').removeClass('hide'); 
        $('#img_f').removeClass('hide'); 

        $('#dec_sec').addClass('hide'); 
        $('#img_sec').addClass('hide'); 
        
    }  else if (section_condition == 5) {

        $('#title_f').removeClass('hide'); 
        $('#title_sec').removeClass('hide'); 
        $('#dec_f').removeClass('hide'); 
        $('#img_f').addClass('hide'); 

        $('#dec_sec').removeClass('hide'); 
        $('#img_sec').addClass('hide'); 
        
    }  else if (section_condition == 6) {

        $('#title_f').addClass('hide'); 
        $('#dec_f').addClass('hide'); 
        $('#img_f').removeClass('hide'); 

        $('#title_sec').addClass('hide'); 
        $('#dec_sec').addClass('hide'); 
        $('#img_sec').removeClass('hide'); 
        
    }  else {

        $('#title_f').addClass('hide'); 
        $('#dec_f').addClass('hide'); 
        $('#img_f').addClass('hide'); 

        $('#title_sec').addClass('hide'); 
        $('#dec_sec').addClass('hide'); 
        $('#img_sec').addClass('hide'); 
        
    } 
    
});