<div class="container mt-4">
    <div class="card shadow">

        <div class="card-header text-white" style="background:#ff7a00;">
            <h5 class="mb-0">Services Section</h5>
        </div>

        <div class="card-body">

            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>

            <form action="<?= base_url('home/save_home_services') ?>" 
                  method="post" 
                  enctype="multipart/form-data">

                <!-- Title -->
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="<?= !empty($service) ? $service->title : '' ?>"
                           required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4"
                              required><?= !empty($service) ? $service->description : '' ?></textarea>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">

                    <?php if (!empty($service->image)) { ?>
                        <div class="mt-2">
                            <img src="<?= base_url($service->image) ?>" 
                                 width="150" 
                                 class="img-thumbnail">
                        </div>
                    <?php } ?>
                </div>

                <!-- Button -->
                <div class="mb-3">
                    <label>Button Text</label>
                    <input type="text"
                           name="button_text"
                           class="form-control"
                           value="<?= !empty($service) ? $service->button_text : '' ?>">
                </div>

                <button type="submit"
                        class="btn text-white"
                        style="background:#ff7a00;">
                    <?= empty($service) ? 'Save Section' : 'Update Section' ?>
                </button>

            </form>

        </div>
    </div>
</div>
