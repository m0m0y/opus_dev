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

    var status_module = window.localStorage.getItem("stat");

    if (status_module == "success") {
        sucessAlert();
        localStorage.clear();
    }

})
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
        window.location.href="classical_music.php";          
    });
})


function updateLink(id, course, sort_by, status) {
    $('#staticBackdrop').addClass('updateModal').modal('show');
    $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> ' + course);

    $('#course_id').val(id);
    $('#course').val(course);
    $('#sort_by').val(sort_by);
    $('#status').val(status);
    

    $('.submit-btn').on('click', function() {
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
        window.location.href="classical_music.php";
    });
}

function addCourse(course, sort_by, status) {
    $.ajax({
        url: 'controller/controller.classical_music.php?mode=addCourse',
        method: 'POST',
        data: {
            course:course,
            sort_by:sort_by,
            status:status
        },
        success:function() {
            $('#preloader').show();
            window.localStorage.setItem("stat", "success");
            window.location.href="classical_music.php";
        }
    });
}

function updateCourse(course_id, course, sort_by, status) {
    $.ajax({
        url: 'controller/controller.classical_music.php?mode=updateCourse',
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
            window.location.href="classical_music.php";
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
                url: 'controller/controller.classical_music.php?mode=deleteCourse',
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
                            window.location.href="classical_music.php";
                        });
                    } else  {
                        Swal.fire(
                            'Error!',
                            'Opps! Something went wrong.',
                            'error'
                        ).then(function(){
                            $('#preloader').show();
                            window.location.href="classical_music.php";
                        });
                    }

                }
            })
        }
    })
}
// --------------------------------------------------------------------------------------------------------------------------
$('#addLearningOpportunities').on('click', function() {
    $('#staticBackdropp').addClass('addPositionModal').modal('show');
    $('#modalOpportunitiesTitle').html('<i class="fas fa-plus"></i> Add New Learning Opportunities');

    $('#opportunity_id').val('');
    $('#title').val('');
    $('#content').val('');
    $('#sort_by').val(0);
    $("select option:checked").val();

    $('.submit-btnOpportunities').on('click', function() {

       var title = $('#title').val();
       var content = $('#content').val();
       var sort_by = $('#sort_by').val();
       var status = $('#status').val();
      

       if(title == "" || title == null) {
            errorAlert();
       } else {
        addOpportunities(title, content, sort_by, status)
       }
    })

    $('.closeBtn').on('click', function() {
        window.location.href="classical_music.php";
       
    });
})

function updateOpportunitiesLink(id, title, content,sort_by, status){
    $('#staticBackdropp').addClass('updateModal').modal('show');
    $('#modalOpportunitiesTitle').html('<i class="fas fa-sm fa-edit"></i> ' + title);

    $('#opportunity_id').val(id);
    $('#title').val(title);
    $('#learning_content').val(content);
    $('#sort_by_content').val(sort_by);
    $('#status').val(status);

    $('.submit-btnOpportunities').on('click', function() {
        var opportunity_id = $('#opportunity_id').val();
        var title = $('#title').val();
        var content = $('#learning_content').val();
        var sort_by = $('#sort_by_content').val();
        var status = $('#status').val();
 
        if(title == "" || title == null){
             errorAlert();
        } 
        // if (content == "" || content == null) {
        //     errorAlert();
        // }
        else {
            updateOpportunities(opportunity_id, title, content, sort_by, status);
        }
     })
 
     $('.closeBtn').on('click', function() {
         window.location.href="classical_music.php";
     });

}
    

function addOpportunities(title, content,sort_by, status) {
    $.ajax({
        url: 'controller/controller.classical_music.php?mode=addOpportunities',
        method: 'POST',
        data: {
            title:title,
            content:content,
            sort_by:sort_by,
            status:status
        },
        success:function() {
            $('#preloader').show();
            window.localStorage.setItem("stat", "success");
            window.location.href="classical_music.php";
           
        }
    });
}

function updateOpportunities (opportunity_id, title, content,sort_by, status)  {
    $.ajax({
        url: 'controller/controller.classical_music.php?mode=updateOpportunities',
        method: 'POST',
        data: {
            opportunity_id:opportunity_id,
            title:title,
            content:content,
            sort_by:sort_by,
            status:status
        },
        success:function() {
            $('#preloader').show();
            window.localStorage.setItem("stat", "success");
            window.location.href="classical_music.php";
        }
    })
}
function deleteOpportunitiesLink(id) {
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
                url: 'controller/controller.classical_music.php?mode=deleteOpportunities',
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
                            window.location.href="classical_music.php";
                        });
                    } else  {
                        Swal.fire(
                            'Error!',
                            'Opps! Something went wrong.',
                            'error'
                        ).then(function(){
                            $('#preloader').show();
                            window.location.href="classical_music.php";
                        });
                    }

                }
            })
        }
    })
}

$('#myform').on('submit', function(e){
        e.preventDefault();
			var formData = new FormData(this);

            // var img = img.substring(img.lastIndexOf("\\") + 1, img.length);
			$.ajax({
				type: "POST",
                url: 'controller/controller.classical_music.php?mode=updateClassicalMusic',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
                    $('#preloader').show();
                    window.localStorage.setItem("stat", "success");
                    window.location.href="classical_music.php";
              
					findImage(data);
				}
			});
		});