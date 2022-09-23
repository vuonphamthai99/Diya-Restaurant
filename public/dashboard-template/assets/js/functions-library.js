function SearchByInputTable(S_input,S_table){
    var value = $('#'+S_input).val().toLowerCase();
      $("#"+S_table+" tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
}

function SearchByString(S_input,S_table){
    var value = S_input.toLowerCase();
    $("#"+S_table+" tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
}


