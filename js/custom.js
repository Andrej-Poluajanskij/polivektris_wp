
jQuery(document).ready(function($) {

    // mobile navigation toggle
    var $hamburger = $(".hamburger");
    $hamburger.on('click', function (e) {
        $hamburger.toggleClass("is-active");
        $('.top-nav').slideToggle();
    });


   //
   //Contacts chekbox
   $('label').change(function(){
    $(this).find('.checkbox_inner').toggleClass('checked');
  });

  //
  //Form validation
    $("#form").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            company: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            inquiry: {
                required: true,
                minlength: 9
            },
            gdpr: {
                required: true
            }
        }
    });

    //
    //Send form function
      // document.querySelector('.loader').style.display = 'none'
    $(document).on('submit', '#form', function(e){
        console.log('submit');
        e.preventDefault();
        // $('.loader-holder').fadeIn();
          $('.loader').toggleClass("display-none");
        var formData = new FormData(this);
        formData.append('action', 'send_contact_form_message');
        
        $.ajax({
            url: variables.ajax_url,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                console.log(data);
                if(data == 'error'){
                    console.log('neveikia');
                    
                }
                console.log('veikia');
                $('.loader').toggleClass("display-none");

            var inputValue = document.querySelectorAll('input');
            for(var i = 0; i < inputValue.length; i++){
                inputValue[i].value = '';
            }
            document.querySelector('#inquiry').value = '';
            $('.checkbox_inner').toggleClass('checked');
            $('input:checkbox').removeAttr('checked');
          }
      });
    });

 
});


