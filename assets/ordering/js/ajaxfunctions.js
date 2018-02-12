$(document).ready(function () {

        $('.add_cart').click(function () {
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var product_img = $(this).data("productimg");
            var product_price = $(this).data("price");
            var product_quantity = $(this).data("productquantity");
            var minimum_quantity = 1;
            $.ajax({
                url: base_url + "home/add",
                method: "POST",
                data: {product_id: product_id, product_name: product_name, product_img: product_img, product_price: product_price, max_quantity: product_quantity, min_quantity: minimum_quantity},
                success: function (data)
                {
                    $('#CTI').load(base_url + "home/category #CTI");
                    $('#' + product_id).val('');

                    $.notify({
                        icon: 'ti-shopping-cart',
                        message: product_name +" has been added into cart"
                    },{
                        type: 'info',
                        timer: 2000,
                            placement: {
                            from: "top",
                            align: "left"
                        }
                    });
                }
            });
        });

        $(document).on('click', '.remove_inventory', function () {
            var row_id = $(this).data("rowid");;
                $.ajax({
                    url: base_url + "home/remove",
                    method: "POST",
                    data: {row_id: row_id},
                    success: function (data)
                    {
                        $('#all').load(base_url + "home/basket #all");
                        $('#CTI').load(base_url + "home/category #CTI");
                    
                        $.notify({
                        icon: 'ti-shopping-cart',
                        message: "Your cart has been updated"
                        },{
                        type: 'info',
                        timer: 2000,
                            placement: {
                            from: "top",
                            align: "left"
                        }
                    });
                    }
                });
        });
        
        $(document).on('change','#update',function () {
            var row_id = $(this).data("rowid");
            var product_quantity = $(this).val();
            $.ajax({
                url: base_url + "home/update",
                method: "POST",
                data: {row_id: row_id, product_quantity: product_quantity},
                success: function (data)
                {   
                    $('#all').load(base_url + "home/basket #all");
                    $('#CTI').load(base_url + "home/category #CTI");

                    $.notify({
                        icon: 'ti-shopping-cart',
                        message: "Your cart has been updated"
                        },{
                        type: 'info',
                        timer: 2000,
                            placement: {
                            from: "top",
                            align: "left"
                        }
                    });
                }
            });
        });

        $('input[name=search]').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:base_url + "home/auto", 
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#productlist').fadeIn();  
                          $('#productlist').html(data);  
                     }  
                });  
           }  
        });  

        $(document).on('click', '#link', function(){
            $('input[name=search]').val($(this).text());  
            $('#productlist').fadeOut();  
        });  

        $(document).on('focusout', 'input[name=search]', function(){
            $('#productlist').fadeOut();  
        });  
        
        $(document).on('click','#post',function () {
            var product_id = $(this).data("productid");
            var rating = $('input[name=rating]:checked').val(); 
            var feedback = $('#comment').val();
            var product_name = $(this).data("productname");
            
            $.ajax({
                url: base_url + "home/post",
                method: "POST",
                data: {product_id: product_id, product_name: product_name, feedback: feedback, rating: rating},
                success: function (data)
                {
                    location.reload();
                }
            });
        });
        
        NProgress.configure({ showSpinner: false });
        NProgress.start();
        var interval = setInterval(function() { NProgress.inc(); }, 1000);        

        $(window).load(function () {
            clearInterval(interval);
            NProgress.done();
        });

        $(window).unload(function () {
            NProgress.start();
        });
        
    });