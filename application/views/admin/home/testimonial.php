<form action="<?= base_url('home/save_testimonial') ?>" 
      method="post" 
      enctype="multipart/form-data">

    <input type="hidden" name="id" 
           value="<?= isset($testimonial->id) ? $testimonial->id : '' ?>">

    <div class="mb-3">
        <label>Customer Name</label>
        <input type="text" name="name" class="form-control"
        value="<?= isset($testimonial->name) ? $testimonial->name : '' ?>" required>
    </div>

    <div class="mb-3">
        <label>Role</label>
        <input type="text" name="role" class="form-control"
        value="<?= isset($testimonial->role) ? $testimonial->role : '' ?>" required>
    </div>

    <div class="mb-3">
        <label>Message</label>
        <textarea name="message" class="form-control" required><?= isset($testimonial->message) ? $testimonial->message : '' ?></textarea>
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn text-white"
        style="background:#ff7a00;">
        <?= isset($testimonial) ? 'Update Testimonial' : 'Add Testimonial' ?>
    </button>

</form>



<hr class="my-5">

<h4 class="mb-3 fw-bold" style="color:#ff7a00;">All Testimonials</h4>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($testimonials as $row): ?>
        <tr>
            <td><?= $row->id ?></td>
            <td><?= $row->name ?></td>
            <td><?= $row->role ?></td>
            <td>
                <?php if($row->image): ?>
                    <img src="<?= base_url('uploads/testimonials/'.$row->image) ?>" width="60">
                <?php endif; ?>
            </td>
            <td>
           <a href="<?= base_url('home/testimonial/'.$row->id) ?>" 
              class="btn btn-sm btn-warning text-white">
              Edit
           </a>

                <a href="<?= base_url('home/delete_testimonial/'.$row->id) ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

