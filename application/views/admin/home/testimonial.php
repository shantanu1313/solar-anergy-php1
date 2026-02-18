<style>
.card-box{
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}
.section-title{
    font-weight:700;
    color:#ff7a00;
    margin-bottom:20px;
}
</style>

<div class="card-box mb-5">

<h4 class="section-title">
<?= isset($testimonial->id) ? 'Update Testimonial' : 'Add Testimonial' ?>
</h4>

<form action="<?= base_url('home/save_testimonial') ?>" 
      method="post" 
      enctype="multipart/form-data">

    <input type="hidden" name="id" 
           value="<?= isset($testimonial->id) ? $testimonial->id : '' ?>">

    <div class="row">

        <div class="col-md-6 mb-3">
            <label class="fw-bold">Customer Name</label>
            <input type="text" name="name" class="form-control"
            value="<?= isset($testimonial->name) ? $testimonial->name : '' ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="fw-bold">Role</label>
            <input type="text" name="role" class="form-control"
            value="<?= isset($testimonial->role) ? $testimonial->role : '' ?>" required>
        </div>

       <div class="col-12 mb-3">
    <label class="fw-bold">Message (Max 6 Words)</label>

    <textarea name="message" 
              id="message"
              class="form-control"
              rows="3"
              required><?= isset($testimonial->message) ? $testimonial->message : '' ?></textarea>

    <small id="wordCount" class="text-muted">
        0 / 6 words
    </small>
</div>


        <!-- ⭐ Rating Select -->
        <div class="col-md-6 mb-3">
            <label class="fw-bold">Rating</label>
            <select name="rating" class="form-control" required>
                <option value="4"
                <?= (isset($testimonial->rating) && $testimonial->rating == 4) ? 'selected' : '' ?>>
                    ⭐⭐⭐⭐ (4 Star)
                </option>

                <option value="5"
                <?= (isset($testimonial->rating) && $testimonial->rating == 5) ? 'selected' : '' ?>>
                    ⭐⭐⭐⭐⭐ (5 Star)
                </option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="fw-bold">Image</label>
            <input type="file" name="image" class="form-control">

            <?php if(isset($testimonial->image) && $testimonial->image): ?>
                <img src="<?= base_url('uploads/testimonials/'.$testimonial->image) ?>"
                     width="70" class="mt-2 rounded">
            <?php endif; ?>
        </div>

    </div>

    <button type="submit" class="btn text-white px-4"
        style="background:#ff7a00;">
        <?= isset($testimonial->id) ? 'Update' : 'Add' ?>
    </button>

</form>
</div>

<hr class="my-5">

<h4 class="mb-4 fw-bold" style="color:#ff7a00;">All Testimonials</h4>

<div class="card-box">

<table class="table table-bordered table-hover align-middle">
    <thead style="background:#f8f9fa;">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Role</th>
            <th>Rating</th>
            <th width="150">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($testimonials as $row): ?>
        <tr>
            <td><?= $row->id ?></td>

            <td>
                <?php if($row->image): ?>
                    <img src="<?= base_url('uploads/testimonials/'.$row->image) ?>"
                         width="60"
                         class="rounded shadow-sm">
                <?php else: ?>
                    <span class="text-muted">No Image</span>
                <?php endif; ?>
            </td>

            <td class="fw-bold"><?= $row->name ?></td>
            <td><?= $row->role ?></td>

            <td>
                <?php
                $rating = $row->rating ?? 5;
                for($i=1; $i<=5; $i++){
                    if($i <= $rating){
                        echo "<span style='color:#ff7a00;font-size:18px;'>★</span>";
                    }else{
                        echo "<span style='color:#ccc;font-size:18px;'>★</span>";
                    }
                }
                ?>
            </td>

            <td>
                <a href="<?= base_url('home/testimonial/'.$row->id) ?>" 
                   class="btn btn-sm btn-warning text-white">
                   Edit
                </a>

                <a href="<?= base_url('home/delete_testimonial/'.$row->id) ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const textarea = document.getElementById("message");
    const wordCount = document.getElementById("wordCount");
    const maxWords = 6;

    function updateWordCount(){
        let words = textarea.value.trim().split(/\s+/).filter(Boolean);

        if(words.length > maxWords){
            textarea.value = words.slice(0, maxWords).join(" ");
            words = words.slice(0, maxWords);
        }

        wordCount.innerText = words.length + " / " + maxWords + " words";
    }

    textarea.addEventListener("input", updateWordCount);
    updateWordCount();

});
</script>


