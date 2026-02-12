<div class="container mt-4">

    <div class="card">
        <div class="card-header text-white" style="background:#ff6600;">
            <h4>Leading Solar Section</h4>
        </div>

        <div class="card-body">

    <form method="post"
      action="<?= base_url('home/save_home_leading') ?>"
      enctype="multipart/form-data">
                <!-- Main Heading -->
                <div class="form-group mb-2 mt-2">
                    <label>Main Heading</label>
                    <input type="text" name="main_heading"
                           class="form-control"
                           value="<?php echo !empty($leading->main_heading) ? $leading->main_heading : ''; ?>"
                           required>
                </div>

                <!-- Sub Heading -->
                <div class="form-group mb-2 mt-2">
                    <label>Sub Heading</label>
                    <input type="text" name="sub_heading"
                           class="form-control"
                           value="<?php echo !empty($leading->sub_heading) ? $leading->sub_heading : ''; ?>">
                </div>

            <!-- Button Text -->
                <div class="form-group mb-2 mt-2">
                    <label>Button Text</label>
                    <input type="text" name="button_text"
                           class="form-control"
                           value="<?php echo !empty($leading->button_text) ? $leading->button_text : ''; ?>">
                </div>

                <!-- Image -->
                <div class="form-group mb-2 mt-2">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">

                    <?php if(!empty($leading->image)){ ?>
                        <br>
                        <img src="<?php echo base_url('uploads/'.$leading->image); ?>" width="120">
                    <?php } ?>
                </div>

                <button type="submit" class="btn text-white btn-lg mt-2 mb-2" style="background:#ff6600;">
                    <?php echo !empty($leading) ? 'Update Section' : 'Save Section'; ?>
                </button>

            </form>

        </div>
    </div>

</div>
