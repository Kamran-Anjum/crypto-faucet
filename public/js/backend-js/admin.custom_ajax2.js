$(document).ready(function(){

  var max_fields      = 3; //maximum input boxes allowed
  var wrapper       = $(".input_fields_wrap"); //Fields wrappeD
  var add_button = $("#addsliderimage"); //Add button ID
  var x = 1; //initlal text box count

  //adding multile field
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
      if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div class="row"><div class="col-md-4 "><div class="form-group "><label class="control-label">Image <small style="color: red;">(Image size must be 350x600)</small></label><input type="file" id="image" name="image[]" class="form-control" ></div> </div><button type="button" style="margin-top: 27px; height: 35px;" id="deletefield" class=" btn btn-danger text-white "> <i class="fa fa-minus" ></i></button></div>'); 
      }
  });

  $(wrapper).on("click","#deletefield", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })

});

// client add images multiple
$(document).ready(function(){

  var max_fields = 5; //maximum input boxes allowed
  var wrapper = $(".image_fields_wrap"); //Fields wrappeD
  var add_button = $("#addimagefield"); //Add button ID
  var x = 1; //initlal text box count

  //adding multile field
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
      if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div class="row"><div class="col-lg-11 col-md-11 col-sm-12 col-xs-12"><div class="form-group "><label class="control-label">Image</label><input type="file" id="image" name="image[]" class="form-control" ></div> </div><button type="button" style="margin-top: 30px; height: 35px; width: 5%;" id="deleteImagefield" class=" btn btn-danger text-white "> <i class="fa fa-minus" ></i></button></div>'); 
      }
  });

  $(wrapper).on("click","#deleteImagefield", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })

});

// client add images multiple
$(document).ready(function(){

  var max_fields = 5; //maximum input boxes allowed
  var wrapper = $(".input_product_detail_wrap"); //Fields wrappeD
  var add_button = $("#add_detail_wrap"); //Add button ID
  var x = 1; //initlal text box count

  //adding multile field
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
      if(x < max_fields){ //max input box allowed
        x++; //text box increment
        let newTextareaClass = 'texteditor-' + x;

        $(wrapper).append(`<div class="full_wrapper">
                              <div class="row">
                                  <div class="col-md-3">
                                      <div class="form-group ">
                                          <label class="control-label">Detail Section `+x+`</label>
                                          <input type="text" id="section_no" readonly name="section_no[]" value="Section `+x+`" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group ">
                                          <label class="control-label">Detail Image `+x+`</label>
                                          <input type="file" id="image_detail" name="image_detail[]" class="form-control">
                                      </div>
                                  </div>
                                  <button type="button" style="margin-top: 27px; height: 35px;" id="delete_detail_wrap" class=" btn btn-danger text-white "> <i class="fa fa-minus" ></i></button>
                              </div>
                              <div class="row">                                        
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="control-label">Detail Description `+x+`</label>
                                          <textarea name="detail_description[]" class="form-control `+newTextareaClass+`"></textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>`); 
        initTinyMCE('textarea.' + newTextareaClass);
      }
  });

  $(wrapper).on("click","#delete_detail_wrap", function(e){ //user click on remove text
    e.preventDefault(); $(this).closest('.full_wrapper').remove(); x--;
  })

});
