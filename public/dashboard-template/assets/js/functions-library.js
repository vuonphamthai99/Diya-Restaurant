function SearchTable(S_input,S_table){
    var value = $('#'+S_input).val().toLowerCase();
      $("#"+S_table+" tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });

}
