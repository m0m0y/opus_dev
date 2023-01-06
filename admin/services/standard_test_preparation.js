$(function() {

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
            // ['insert', ['link', 'picture', 'video']],
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
    
    $(function(){
        Test = {
            UpdatePreview: function(obj){

              if(!window.FileReader){
  
              } else {
                 var reader = new FileReader();
                 var target = null;
                 
                 reader.onload = function(e) {
                  target =  e.target || e.srcElement;
                   $("img").prop("src", target.result);
                 };
                  reader.readAsDataURL(obj.files[0]);
              }
            }
        };
    });
    var status_module = window.localStorage.getItem("stat");

    if (status_module == "success") {
        sucessAlert();
        localStorage.clear();
    }

    $('#myform').on('submit', function(e){
        e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				type: "POST",
                url: 'controller/controller.standard_test_preparation.php?mode=updateContent',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
                    $('#preloader').show();
                    window.localStorage.setItem("stat", "success");
                    window.location.href="standard_test_preparation.php";
					// findImage(data);
				}
			});
		});
    });