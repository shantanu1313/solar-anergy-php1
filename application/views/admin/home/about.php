<div class="container mt-4">

  <!-- ================= ABOUT FORM ================= -->
  <div class="card shadow">
    <div class="card-header text-white fw-bold" style="background:#ff7a00;">
      About Section
    </div>

    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

        <!-- TITLE -->
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text"
                 name="title"
                 class="form-control"
                 value="<?= isset($about) ? $about->title : '' ?>"
                 required>
        </div>

        <!-- DESCRIPTION 1 -->
        <div class="mb-3">
          <label class="form-label">Description 1</label>
          <textarea name="description_1"
                    class="form-control"
                    rows="3"
                    required><?= isset($about) ? $about->description_1 : '' ?></textarea>
        </div>

        <!-- DESCRIPTION 2 -->
        <div class="mb-3">
          <label class="form-label">Description 2</label>
          <textarea name="description_2"
                    class="form-control"
                    rows="3"><?= isset($about) ? $about->description_2 : '' ?></textarea>
        </div>

        <!-- IMAGE -->
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" name="image" class="form-control">

          <?php if(isset($about) && !empty($about->image)){ ?>
            <div class="mt-2">
              <img src="<?= base_url('uploads/about/'.$about->image) ?>"
                   width="120"
                   class="img-thumbnail">
            </div>
          <?php } ?>
        </div>

        <!-- BUTTON TEXT -->
        <div class="mb-3">
          <label class="form-label">Button Text</label>
          <input type="text"
                 name="button_text"
                 class="form-control"
                 value="<?= isset($about) ? $about->button_text : '' ?>">
        </div>

        <!-- SUBMIT BUTTON -->
        <button type="submit"
                class="btn btn-lg text-white"
                style="background:#ff7a00;">
          <?= isset($about) ? 'Update About Section' : 'Save About Section' ?>
        </button>

      </form>
    </div>
  </div>

</div>
