<div class="container mt-4">

  <!-- ================= PRODUCTS FORM ================= -->
  <div class="card shadow">
    <div class="card-header text-white fw-bold" style="background:#ff7a00;">
      Products Section
    </div>

    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

        <!-- HEADING -->
        <div class="mb-3">
          <label class="form-label">Main Heading</label>
          <input type="text"
                 name="heading"
                 class="form-control"
                 placeholder="Products"
                 value="<?= isset($products) ? $products->heading : '' ?>"
                 required>
        </div>

        <!-- TITLE -->
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text"
                 name="title"
                 class="form-control"
                 placeholder="Our Solar Products"
                 value="<?= isset($products) ? $products->title : '' ?>"
                 required>
        </div>

        <!-- DESCRIPTION -->
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description"
                    class="form-control"
                    rows="4"
                    placeholder="Enter products description here..."
                    required><?= isset($products) ? $products->description : '' ?></textarea>
        </div>

        <!-- IMAGE -->
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" name="image" class="form-control">

          <?php if(isset($products) && !empty($products->image)){ ?>
            <div class="mt-2">
              <img src="<?= base_url('uploads/products/'.$products->image) ?>"
                   width="150"
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
                 placeholder="View Products"
                 value="<?= isset($products) ? $products->button_text : '' ?>">
        </div>

        <!-- SUBMIT BUTTON -->
        <button type="submit"
                class="btn btn-lg text-white"
                style="background:#ff7a00;">
          <?= isset($products) ? 'Update Products Section' : 'Save Products Section' ?>
        </button>

      </form>
    </div>
  </div>

</div>
