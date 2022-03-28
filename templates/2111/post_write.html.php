<section class="padding-eleven-lr xl-padding-two-lr lg-no-padding-lr">
    <div class="container">
	    <div class="row">
	    	            <div class="col-12 blog-details-text last-paragraph-no-margin text-light-gray">
            	<h6 class="text-light-gray alt-font font-weight-600"><?=$board_metadata->board_name?></h6>
            </div>
	      <div class="col-12 blog-content sm-no-padding-lr">
	      	<h5 class="alt-font font-weight-500 text-white margin-2-half-rem-bottom"> <?=$post->subject?> </h5>
			  <form action="" method="POST">
				<div class="col-12 margin-20px-bottom">
					<input required type="hidden" name="board_id" value="<?=$_GET['board_id']?>">
					<input required type="text" name="post[subject]" value="<?=$post->subject ?? '' ?>" placeholder="제목">
					<input required type="hidden" name="post[id]" value="<?=$post->id?>">
					<textarea required id="summernote" name="post[content]"> <?=$post->content?> </textarea>
				</div>
				<div class="row align-items-center">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<label class="margin-15px-bottom">메인 이미지 <span class="required-error text-radical-red">*</span></label>
						<input type="file" name="main_image" class="small-input bg-white margin-20px-bottom required">현재 등록된 메인 이미지: <?=$post->main_image?>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<label class="margin-15px-bottom">첨부 파일</label>
						<input type="file" name="attached_file" class="small-input bg-white margin-20px-bottom" value="/attached_files/<?=$post->attached_file?>">현재 등록된 파일: <?=$post->attached_file?>
					</div>
				</div>
			    <div class="row">
			      <div class="col-12 col-md-5 sm-margin-20px-bottom">
			          <span class="alt-font font-weight-600 text-copper-red text-extra-medium text-uppercase d-block letter-spacing-1px"></span>
			      </div>
			      <div class="col-12 col-md-7 text-md-right">
			          <input class="btn btn-link thin btn-extra-large text-medium-gray" type="submit" value="저장하기">
			      </div>
			    </div>
			  </form>
	      </div>
	    </div>
	</div>
</section>


<!-- include summernote css/js -->
<link href="/summernote/summernote.min.css" rel="stylesheet">
<script src="/summernote/summernote.min.js"></script>

<style>
  .filter-switch label {
    cursor: pointer;
  }

  .filter-switch-item input:checked+label {
    color: inherit;
  }

  .filter-switch-item input:not(:checked)+label {
    --bg-opacity: 0;
    box-shadow: none;
  }
  .note-editable { background-color: white !important; color: black !important; }
  .note-toolbar { background-color: white !important; color: black !important; }
</style>

<script>
  $(document).ready(function () {
    $('#summernote').summernote({
      placeholder: '게시글을 작성해주세요',
      height: 400,
      minHeight: 400,
      maxHeight: 720,
      focus: true,
      lang : 'ko-KR',
      callbacks:{
        onImageUpload: function(files, editor, welEditable) {
          that = $(this);
          sendFile(files[0], that);
		    },
        onMediaDelete : function(target) {
          alert(target[0].src) 
          deleteFile(target[0].src);
        },
      }
    });

    function sendFile(file, that) {
      var form_data = new FormData();
      form_data.append('file', file);
      $.ajax({
        url: "/ajax/saveimage",
        type: "POST",
        data: form_data,
        cache: false,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        success: function(url) {
          var image = $('<img>').attr('src', url);
          $(that).summernote('insertNode', image[0]);
        },
        error: function(req, status, err){
          alert("code"+req.status+" "+ err);
        }
      });
    }

    function deleteFile(src) {
      $.ajax({
          data: {src : src},
          type: "POST",
          url: "/ajax/deleteimage", // replace with your url
          cache: false,
          success: function(resp) {
              console.log(resp);
          }
      });
    }
  });
</script>