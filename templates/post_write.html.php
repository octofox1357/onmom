<section class="extra-big-section">
<div class="container">
  <form action="" method="POST">
    <input required type="hidden" name="board_id" value="<?=$_GET['board_id']?>">
    <input required type="text" name="post[subject]" value="<?=$post->subject ?? '' ?>" placeholder="제목">
    <input required type="hidden" name="post[id]" value="<?=$post->id?>">
    <textarea required id="summernote" name="post[content]"> <?=$post->content?> </textarea>
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
      height: 300,                // set editor height
      minHeight: 300,             // set minimum height of editor
      maxHeight: 720,             // set maximum height of editor
      focus: true
    });
  });
</script>