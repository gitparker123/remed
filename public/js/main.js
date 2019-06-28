var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var start = moment().subtract(29, 'days');
var end = moment();
var iProcess;
var defaultOption = {
    processing: true,
    serverSide: true,
    bDestroy: true,
    searching: false,
    // lengthChange: false
};
loadData = function(type, option){
    var customOption;
    switch(type){
        case "doctor":
            customOption = {
                columns: [
                    {data: 'DT_RowIndex', name: 'id', visible:false},
                    {data: 'specialization', name: 'specialization'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'address', name: 'address'}
                ],
                ajax: "table.doctor?" + option
            };
            break;
        case "service":
            customOption = {
                columns: [
                    {data: 'DT_RowIndex', name: 'id', visible:false},
                    {data: 'doctor', name: 'doctor'},
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                    {data: 'note', name: 'note'}
                ],
                ajax: "table.service?" + option
            };
            break;
        case "appointment":
            customOption = {
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'doctor', name: 'doctor'},
                    {data: 'date_from', name: 'date_from'},
                    {data: 'date_to', name: 'date_to'},
                    {data: 'note', name: 'note'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                ajax: "table.appointment?" + option
            };
            break;
    }
    var tableOption = Object.assign(defaultOption, customOption);
    dataTable = $('#dataTable').DataTable(tableOption);
    loadAfter();
}, 
loadAfter = function(){

},
calendarInit = function(){
    $.fn.datetimepicker.defaults = {
        maskInput: true,           // disables the text input mask
        pickDate: true,            // disables the date picker
        pickTime: false,            // disables de time picker
        pick12HourFormat: false,   // enables the 12-hour format time picker
        pickSeconds: false,        // disables seconds in the time picker
        startDate: -Infinity,      // set a minimum date
        endDate: Infinity,          // set a maximum date
        language: 'en'
      };
    $('#date_from, #date_to').datetimepicker({
        pickTime: false,
    });
    $('#c_date_from, #c_date_to').datetimepicker({
        pickTime: true,
    });
},
callAfter = function(data){
    var option = data.option;
    var result = data.result;
    switch(option){
        case "doclist":
            if(result == "success"){
                if(data.type == "search"){
                    $("#doctor").html(data.options);
                } else {
                    $("#c_doctor").html(data.options);
                }
            }
            break;
        case "create_appointment":
        case "update_appointment":
        case "delete_appointment":
            if(result == "success"){
                $("#id").val('');
                loadData('appointment', $("#search_form").serialize());
            } else {
                alert("database error!");
            }
            $("#close").click();
            break;
    }
},
sendRequest = function(option,params){
    var token = {_token: CSRF_TOKEN};
    var data = Object.assign(token, params);
    $.ajax({
        url : option,
        type : "GET",
        data: params,
        dataType: 'json',
        error: function(err){
            console.log(err);
        },
        success: callAfter
    });
},
$(function(){
    var pageId = $("#page_id").val();
    var menuIndex = 0;
    switch(pageId){
        case "doctorinfo":
            menuIndex = 0;
            loadData("doctor","");
            break;
        case "service":
            menuIndex = 1;
            loadData("service","");
            break;
        case "appointment":
            menuIndex = 2;
            calendarInit();
            loadData("appointment","");
            break;
        case "aboutus":
            menuIndex = 3;
            break;
        case "contactus":
            menuIndex = 4;
            break;
    }
    console.log(menuIndex);
    var menu = document.getElementById('top_menu');
    var menu_items = menu.children;
    for(var i = 0; i < menu_items.length; i++) {
        menu_items[i].classList.remove('active');
    }
    menu_items[menuIndex].classList.add("active");

    $("#specialization, #c_specialization").change(function(e){
        var option = "doclist";
        var data = "spec_id="+e.target.value;
        data += (e.target.id == "specialization")? "&type=search":"&type=create";
        sendRequest(option, data);
    });
    $("#search").click(function(e){
        e.preventDefault();
        loadData('appointment', $("#search_form").serialize());
    });
    $("#specialization, #doctor, #from, #to").change(function(){
        loadData('appointment', $("#search_form").serialize());
    });
    $("#save").click(function(){
        var option = "table.appointment.create";
        if($("#id").val() != ''){
            option = "table.appointment.update";
        }
        var data = $("#create_form").serialize();
        sendRequest(option, data);
    });
    $("#create").click(function(){
        $("#id").val('');
        $("#modal_title").html("Create Appointment");
    });
    $(document).on('click',"button[name='update']", function(e){
        e.preventDefault();
        var id = $(this).parents('tr').children()[0].innerText;
        var doctor = $(this).parents('tr').children()[1].innerText;
        var from = $(this).parents('tr').children()[2].innerText;
        var to = $(this).parents('tr').children()[3].innerText;
        var note = $(this).parents('tr').children()[4].innerText;
        
        $("#modal_title").html("Update Appointment");
        $("#id").val(id);
        $("#c_doctor").val(doctor);
        $("#c_from").val(from);
        $("#c_to").val(to);
        $("#note").val(note);
    });
    $(document).on('click', "button[name='delete']", function(){
        var option = "table.appointment.delete";
        var data = "id="+$(this).parents('tr').children().first().text();
        sendRequest(option, data);
    });

});