<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Version 1.0.3
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">giadinhit.com</a>.</strong>
    <!--
    <a href="javascript:void(0)" id="scrollTop">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>
    </a>
    -->
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/bootstrap/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/dist/js/app.min.js"></script>
<!-- iCheck -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/plugins/iCheck/icheck.min.js"></script>
 <script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/blue/plugins/ckeditor/ckeditor.js"></script>
 <script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/blue/plugins/ckfinder/ckfinder.js"></script>
 <!-- Select2 -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/plugins/select2/select2.full.min.js"></script>
<!-- Validate form -->
<script type="text/javascript" src="<?php echo BASE_URL;?>/templates/backend/blue/dist/js/jquery.validate.min.js"></script>
 <!-- PACE -->
<script src="<?php echo BASE_URL;?>/templates/backend/blue/plugins/pace/pace.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>templates/backend/blue/dist/js/validate_del.js"></script>     
<script>
  $(function () {
     //Initialize Select2 Elements
    $(".select2").select2();
    
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  });
</script>

<!-- page script -->
    <script>
      $(function () {
       // $("#list-blog").DataTable();
      });
    </script>
    <script>
      //  $(document).ready(listUser);
    </script>
    <script type="text/javascript">
         function BrowseServer() {
            var finder = new CKFinder();
            //finder.basePath = '../';
            finder.selectActionFunction = SetFileField;
            finder.popup();
        }
        function SetFileField(fileUrl) {
            document.getElementById('txtImage').value = fileUrl;
        }
    </script>
    <script type="text/javascript">
        $( document ).ready( function () {
             
        //Select all
        $('.check-all').on('click',function(){
           $(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked')); 
        });
			$( "#add-blog" ).validate( {
				rules: {
				    txtTitle: "required",
					txtShortContent: "required",
					txtTitle: {
						required: true,
						minlength: 10
					},
					txtShortContent: {
						required: true,
						minlength: 20
					}
				},
				messages: {
					txtTitle: "Vui lòng nhập tên bài viết",
					txtShortContent: "Vui lòng nhập mô tả bài viết",
					txtTitle: {
						required: "Vui lòng nhập tên bài viết",
						minlength: "Tên tiêu đề ít nhất phải có 10 ký tự"
					},
					txtShortContent: {
						required: "Vui lòng nhập mô tả bài viết",
						minlength: "Nội dung mô tả phải nhiều hơn 20 ký tự"
					},
				
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".form-group" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
    </script>
    <!-- page script -->
    <script type="text/javascript">
        //Check nổi bật
         $('.ckhHightLight').on('ifChanged', function (event) {
            var id = $(this).attr("data-id");
            var val = $(this).prop('checked');
            var type = "hightlight";
            $.post('<?php echo BASE_ADMIN.'/ajax/blog/'?>',
                    {id: id, value: val, type: type},
                    function (data) {
                        console.log(data);
                    }
            ) //End get ajax
        });
        // Ẩn tin tức
        $('.btn_an').click(function () {
            id = $(this).attr("data-id");

            $(this).attr("disabled", true);
            $(".btn_hien" + id).attr("disabled", false);
            var status = 0; // Gia tri status an
            var type = "status";
            
            $.post('<?php echo BASE_ADMIN.'/ajax/blog/'?>',
                    {id: id, status: status, type: type},
                    function (data) {
                        console.log(data);
                    }
            )
        })

        // Hiện tin tức
        $('.btn_hien').click(function () {
            id = $(this).attr("data-id");

            $(this).attr("disabled", true);
            $(".btn_an" + id).attr("disabled", false);
            var status = 1; //Gia tri status hien
            var type = "status";
            $.post('<?php echo BASE_ADMIN.'/ajax/blog/'?>',
                    {id: id, status: status , type: type},
                    function (data) {
                        console.log(data);
                    }
            )
        });
        
    	// To make Pace works on Ajax calls
    	$(document).ajaxStart(function() { Pace.restart(); });
        $('.ajax').click(function(){
            $.ajax({url: '#', success: function(result){
                $('.ajax-content').html('<hr>Load thành công !');
            }});
        });
       
    </script> 
</body>
</html>
