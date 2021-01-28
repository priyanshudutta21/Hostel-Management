// search student

$(document).ready(function(){
    $('#search').keyup(function(){
        search_table($(this).val());
    });


    function search_table(value){
        $('#student_table tr').each(function(){
            var found = 'false';
            $(this).each(function(){
                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                {
                    found = 'true';

                }
            });
            if(found == 'true')
            {
                $(this).show();
            }
            else{
                $(this).hide();
            }
        });
    }
})

// datatable students
$(document).ready(function() {
    $('.myTable').DataTable({
        "scrollY": 200,
        "scrollY": true
    });
} );

// hostal tables
$(document).ready(function() {
    $('.hostalTable').DataTable({
        "scrollY": 200,
        "scrollY": true
    });
} );
// Room tables
$(document).ready(function() {
    $('.roomTable').DataTable({
        "scrollY": 200,
        "scrollY": true
    });
} );
// Course tables
$(document).ready(function() {
    $('.courseTable').DataTable({
        "scrollY": 200,
        "scrollY": true
    });
} );
// dashboard tables
$(document).ready(function() {
    $('.roomdetail').DataTable({
        "scrollY": 200,
        "scrollY": true,
        lengthMenu:[[4],[4]]
    });
} );

// calculate total room in hostel
$(function(){
    $('#Sroom, #Droom').keyup(function(){
       var value1 = parseFloat($('#Sroom').val()) || 0;
       var value2 = parseFloat($('#Droom').val()) || 0;
       $('#Troom').val(value1 + value2);
    }).ready(function(){
        var value1 = parseFloat($('#Sroom').val()) || 0;
        var value2 = parseFloat($('#Droom').val()) || 0;
        $('#Troom').val(value1 + value2);
     });

    $('#Sroom, #Droom').keyup(function(){
        var s1 = parseFloat($('#Sroom').val()) || 0;
        var s2 = parseFloat($('#Droom').val()) || 0;
        $('#capacity').val(s1+(s2*2))
    }).ready(function(){
        var s1 = parseFloat($('#Sroom').val()) || 0;
        var s2 = parseFloat($('#Droom').val()) || 0;
        $('#capacity').val(s1+(s2*2))
    });
 });

 $(function(){
    $('#tfee, #rfee').keyup(function(){
       var value1 = parseFloat($('#tfee').val()) || 0;
       var value2 = parseFloat($('#rfee').val()) || 0;
       $('#pfee').val(value1 - value2);
    }).ready(function(){
        var value1 = parseFloat($('#tfee').val()) || 0;
        var value2 = parseFloat($('#rfee').val()) || 0;
        $('#pfee').val(value1 - value2);
     });

 });
