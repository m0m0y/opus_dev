$(function(){
    $('#page_content').summernote({
        height: 500,
        placeholder: 'Type Here...',
        disableDragAndDrop: true,
        blockqouteBreakingLevel: 2,
        fontSizeUnit: 'pt',
        lineHeight: 20,
        dialogsInBody: true,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear', 'fontname', 'fontsize', 'color']],
            ['para', ['paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen']],
        ],

        popover: {
            image: [
                ['custom', ['imageAttributes']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
        },
        lang: 'en-US',
        imageAttributes:{
            icon:'<i class="fas fa-sm fa-edit"/>',
            removeEmpty:false,
            disableUpload: false
        }
    });

    
    $('#card_content').summernote({
        height: 300,
        placeholder: 'Type Here...',
        disableDragAndDrop: true,
        blockqouteBreakingLevel: 2,
        fontSizeUnit: 'pt',
        lineHeight: 20,
        dialogsInBody: true,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear', 'fontname', 'fontsize', 'color']],
            ['para', ['paragraph']],
            ['view', ['fullscreen']],
        ],

        popover: {
            image: [
                ['custom', ['imageAttributes']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
        },
        lang: 'en-US',
        imageAttributes:{
            icon:'<i class="fas fa-sm fa-edit"/>',
            removeEmpty:false,
            disableUpload: false
        }
    });

    var status_module =  window.localStorage.getItem("stat");
    if(status_module == "success"){
        sucessAlert();
        localStorage.clear();
    } else if(status_module == "error") {
        errorAlert();
        localStorage.clear();
    } else if(status_module == "errorUpload") {
        errorUpload();
        localStorage.clear();
    } else if (status_module == "invalidFormat") {
        invalidFormat();
        localStorage.clear();
    }

    $('#btn-save').on('click', function(){
        var id = $('#admission_id').val();
        var title = $('#title').val();
        var content = $('#page_content').val();
        var status = $('#status').val();

        if(title == "" || content == "") {
            errorAlert();
        } else {
            submit(id, title, content, status);
        }
    });
});

function submit(id, title, content, status) {
    $.ajax({
        url: 'controller/controller.admission_counselling.php?mode=updateContent',
        method: 'POST',
        data: {
            id:id,
            title:title, 
            content:content, 
            status:status,
        },
        success:function(){
            $('#preloader').show();
            window.localStorage.setItem("stat", "success");
            window.location.href="admission_counselling.php";
        }
    });
}

function updateLink(card_id, card_title, img, content, link, card_status) {
    $('#staticBackdrop').modal('show');
    $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> ' + card_title);

    $('#card_id').val(card_id);
    $('#card_title').val(card_title);
    $('#card_content').summernote('code', content);
    $('#link').val(link);
    $('#status').val(card_status);

    if (img != "") {
        $('div #thumbnail-container').removeClass('img-thumbnail-container');
        $('#team-image').addClass('team-img');
        $('#team-image').attr('src', img);
    } else {
        $('div #thumbnail-container').addClass('img-thumbnail-container');
        $('#team-image').removeClass('team-img');
        $('#team-image').attr('src', img);
    }

    $('.resetBtn').on('click', function() {
        $('input[type=text], input[type=url]').val('');
        $('#status').val(0);
        $('#card_content').summernote('code', '');
    });
}