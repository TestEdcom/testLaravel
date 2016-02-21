
    jQuery(document).ready(function(){

        console.log("ASd"); 

        // add area checkbox function
        var $checkboxes = $(".cities_pool .city_checkbox");
        $checkboxes.on('change',function(){
           var ids = $checkboxes.filter(':checked').map(function(){
              return this.value; 
           }).get().join(',');
           $('.selected_cities').val(ids);
        });


        // edit area checkbox function
        var $edit_checkboxes = $(".cities_pool .edit_city_checkbox");
        $edit_checkboxes.on('change',function(){

            var selected_cities =   $('.selected_cities')[0].value.split(',');
 
            var ids = $edit_checkboxes.filter(':checked').map(function(){
              return this.value; 
           }).get().join(',');
           $('.selected_cities').val(ids);
           console.log($('.selected_cities').val()); 
        });

         


    });
