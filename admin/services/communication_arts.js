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
              // if IE < 10 doesn't support FileReader
              if(!window.FileReader){
                 // don't know how to proceed to assign src to image tag
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


    $('#addPosition').on('click', function() {
        $('#staticBackdrop').addClass('addPositionModal').modal('show');
        $('#modalTitle').html('<i class="fas fa-plus"></i> Add New Position');

        $('#course_id').val('');
        $('#course').val('');
        $('#sort_by').val(0);
        $("select option:checked").val();

        $('.submit-btn').on('click', function() {
           var course = $('#course').val();
           var sort_by = $('#sort_by').val();
           var status = $('#status').val();

           if(course == "" || course == null) {
                errorAlert();
           } else {
                addCourse(course, sort_by, status);
           }
        })

        $('.closeBtn').on('click', function() {
            window.location.href="communication_arts.php";
        });
    })

    var status_module = window.localStorage.getItem("stat");
    if (status_module == "success") {
        sucessAlert();
        localStorage.clear();
    }

})

$('#myform').on('submit', function(e){
        e.preventDefault();
			var formData = new FormData(this);

            // var img = img.substring(img.lastIndexOf("\\") + 1, img.length);
			$.ajax({
				type: "POST",
                url: 'controller/controller.communication_arts.php?mode=updateContent',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
                    $('#preloader').show();
                    window.localStorage.setItem("stat", "success");
                    window.location.href="communication_arts.php";
              
					findImage(data);
               
				}
			});
		});

function updateLink(id, course, sort_by, status) {
    $('#staticBackdrop').addClass('updateModal').modal('show');
    $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> ' + course);

    $('#course_id').val(id);
    $('#course').val(course);
    $('#sort_by').val(sort_by);
    $('#status').val(status);

    $('.submit-btnn').on('click', function() {
       var course_id = $('#course_id').val();
       var course = $('#course').val();
       var sort_by = $('#sort_by').val();
       var status = $('#status').val();

       if(course == "" || course == null) {
            errorAlert();
       } else {
            updateCourse(course_id, course, sort_by, status);
       }
    })

    $('.closeBtn').on('click', function() {
        window.location.href="communication_arts.php";
    });
}

function addCourse(course, sort_by, status) {
    $.ajax({
        url: 'controller/controller.communication_arts.php?mode=addCourse',
        method: 'POST',
        data: {
            course:course,
            sort_by:sort_by,
            status:status
        },
        success:function() {
            $('#preloader').show();
            window.localStorage.setItem("stat", "success");
            window.location.href="communication_arts.php";
        }
    });
}

function updateCourse(course_id, course, sort_by, status) {
    $.ajax({
        url: 'controller/controller.communication_arts.php?mode=updateCourse',
        method: 'POST',
        data: {
            course_id:course_id,
            course:course,
            sort_by:sort_by,
            status:status
        },
        success:function() {
            $('#preloader').show();
            window.localStorage.setItem("stat", "success");
            window.location.href="communication_arts.php";
        }
    })
}

function deleteLink(id) {
    Swal.fire({
    title: 'Please confirm to Delete',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'controller/controller.communication_arts.php?mode=deleteCourse',
                method: 'POST',
                data: {
                    id:id
                },
                success: function(response) {
                    var resValue = jQuery.parseJSON( response );

                    if(resValue['message'] == "Delete Success") {
                        Swal.fire(
                            'Deleted Successfully!',
                            '',
                            'success'
                        ).then(function(){
                            $('#preloader').show();
                            window.location.href = "communication_arts.php";
                        });
                    } else  {
                        Swal.fire(
                            'Error!',
                            'Opps! Something went wrong.',
                            'error'
                        ).then(function(){
                            $('#preloader').show();
                            window.location.href = "communication_arts.php";
                        });
                    }

                }
            })
        }
    })
}