<div class="container mt-4">

    <div class="card">
        <div class="card-header text-white" style="background:#ff6600;">
            <h4><?= isset($edit_faq) ? 'Edit FAQ' : 'Add FAQ'; ?></h4>
        </div>

        <div class="card-body">

            <?php if(isset($edit_faq)){ ?>
                <form method="post" action="<?= base_url('home/update_home_faq/'.$edit_faq->id) ?>">
            <?php } else { ?>
                <form method="post" action="<?= base_url('home/save_home_faq') ?>">
            <?php } ?>

                <div class="form-group">
                    <label>Question</label>
                    <input type="text"
                           name="question"
                           class="form-control"
                           value="<?= isset($edit_faq)?$edit_faq->question:''; ?>"
                           required>
                </div>

                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="answer"
                              class="form-control"
                              rows="4"
                              required><?= isset($edit_faq)?$edit_faq->answer:''; ?></textarea>
                </div>

                <button type="submit "
                        class="btn text-white mt-2 mb-2 btn-lg"
                        style="background:#ff6600;">
                    <?= isset($edit_faq)?'Update FAQ':'Save FAQ'; ?>
                </button>

            </form>

        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header text-white" style="background:#ff6600;">
            <h5>All FAQs</h5>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(!empty($faqs)){ ?>
                    <?php foreach($faqs as $faq){ ?>

                        <tr>
                            <td><?= $faq->id ?></td>
                            <td><?= $faq->question ?></td>
                            <td style="max-width:300px;">
                                <?= $faq->answer ?>
                            </td>
                            <td>
                                <a href="<?= base_url('home/edit_home_faq/'.$faq->id) ?>"
                                   class="btn btn-primary btn-sm">Edit</a>

                                <a href="<?= base_url('home/delete_home_faq/'.$faq->id) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure?')">
                                   Delete
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">No FAQs Found</td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>

</div>
