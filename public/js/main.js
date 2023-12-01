
$(document).on('click','.process',function (e) {
    e.preventDefault();
    let url=$('.form-process').attr('action')
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    loading();

    if($('#file').get(0).files.length>0){
        let file=$('#file')[0].files[0];
        let FileSend = new FormData();
        FileSend.append('file',file)
        FileSend.append('_token',CSRF_TOKEN);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url ,
            method: "POST",
            data: FileSend,
            contentType: false,
            processData: false,
        }).done(function (response) {
            removeLoader()
            $('.process-content').append(response);
        }).fail(function (response,xhr, textStatus, errorThrown) {
                removeLoader()

        });
    }else{
        $.ajax({
            url: url,
            datatype: "html",
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function (response) {
            $('.process-content').append(response);
            removeLoader()
        })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                removeLoader()
            });
    }

        function loading(){
            $('body').append('<div style="" id="loadingDiv"><div class="loader">Loading...</div></div>');
        }

    function removeLoader(){
        $( "#loadingDiv" ).fadeOut(500, function() {
            // fadeOut complete. Remove the loading div
            $( "#loadingDiv" ).remove(); //makes page more lightweight
        });
    }
 });




