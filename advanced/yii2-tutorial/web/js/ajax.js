$('document').ready(() => {
    console.log('my js');
    
    $('#w1').on('beforeSubmit', function() {
        
        let form = $(this);
        let data = form.serialize();
        
        console.log(data);
        
        form.remove();

        $.ajax({
            url: '/subscribe',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                $('#w0').after(`<p>${response.message}</p>`);
            },
            error: function(error) {
            }
        });
        return false;
    });
});
