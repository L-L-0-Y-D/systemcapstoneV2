$(document).ready(function () {

    /* This is a jQuery function that is used to delete a product. */
    $(document).on('click','.delete_product_btn', function (e){

        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'product_id':id,
                        'delete_product_btn':true
                    },
                    success: function (response) {
                        if(response == 200)
                        {
                            swal("");
                            swal("Success!", "Product Deleted Successfully", "success");
                            $("#products_table").load(location.href + " #products_table");
                        }
                        else if(response == 500)
                        {
                            swal("Error!", "Something went wrong", "error");
                        }
                }
              });
            }
          });

    });

    
    /* This is a jQuery function that is used to delete a category. */
    $(document).on('click','.delete_municipality_btn', function (e){
        
        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'municipalityid':id,
                        'delete_municipality_btn':true
                    },
                    success: function (response) {
                        if(response == 200)
                        {
                            swal("");
                            swal("Success!", "municipality Deleted Successfully", "success");
                            $("#municipality_table").load(location.href + " #municipality_table");
                        }
                        else if(response == 500)
                        {
                            swal("Error!", "Something went wrong", "error");
                        }
                }
              });
            }
          });

    });
});