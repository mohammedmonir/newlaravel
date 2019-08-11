$(document).ready(function () {
    
   
    $('.add-product-btn').on('click', function (e) {

        e.preventDefault();
      
            var name =$(this).data('name');
            var id =$(this).data('id');
            var price =$(this).data('price');
           
            var html =
                `<tr>
                    <td>${name}</td>
                    <td><input type="number" name="products[${id}][quantity]" data-price="${price}" class="form-control input-sm product-quantity" min="1" value="1"></td>
                    <td class="product-price">${price}</td>               
                    <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
                </tr>`;

        $('.order-list').append(html);//عرض حقل ال html في كلاس اوردرليست
    });

    

});//end of calculate total
