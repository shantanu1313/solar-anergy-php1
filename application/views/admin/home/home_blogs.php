<div class="container mt-4">

    <div class="card">
        <div class="card-header text-white" style="background:#ff6600;">
            <h4><?php echo isset($edit_blog) ? 'Edit Blog' : 'Add Blog'; ?></h4>
        </div>

        <div class="card-body">

        <?php if(isset($edit_blog)){ ?>
            <form method="post" action="<?php echo base_url('home/update_home_blog/'.$edit_blog->id); ?>" enctype="multipart/form-data">
        <?php } else { ?>
            <form method="post" action="<?php echo base_url('home/save_home_blog'); ?>" enctype="multipart/form-data">
        <?php } ?>

                <!-- TITLE -->
                <div class="form-group mb-2">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control"
                    value="<?php echo isset($edit_blog)?$edit_blog->title:''; ?>" required>
                </div>

                <!-- DESCRIPTION ONE -->
                <div class="form-group mb-2">
                    <label>Description One</label>
                    <textarea name="description_one" class="form-control" rows="3" required><?php echo isset($edit_blog)?$edit_blog->description_one:''; ?></textarea>
                </div>

                <!-- DESCRIPTION TWO -->
                <div class="form-group mb-2">
                    <label>Description Two</label>
                    <textarea name="description_two" class="form-control" rows="3" required><?php echo isset($edit_blog)?$edit_blog->description_two:''; ?></textarea>
                </div>

                <!-- BUTTON TEXT -->
                <div class="form-group mb-2">
                    <label>Button Text</label>
                    <input type="text" name="button_text" class="form-control"
                    value="<?php echo isset($edit_blog)?$edit_blog->button_text:'Read Blogs'; ?>">
                </div>

                <!-- IMAGE -->
                <div class="form-group mb-2">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">

                    <?php if(isset($edit_blog) && !empty($edit_blog->image)){ ?>
                        <br>
                        <img src="<?php echo base_url('uploads/'.$edit_blog->image); ?>" width="100">
                    <?php } ?>
                </div>

                <button type="submit" class="btn text-white btn-lg mb-2 mt-2" style="background:#ff6600;">
                    <?php echo isset($edit_blog)?'Update Blog':'Save Blog'; ?>
                </button>

            </form>

        </div>
    </div>


    <!-- ===================== -->
    <!-- BLOG LIST TABLE -->
    <!-- ===================== -->
    <div class="card mt-4">
        <div class="card-header text-white" style="background:#ff6600;">
            <h5>All Blogs</h5>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description One</th>
                        <th>Description Two</th>
                        <th>Button Text</th>
                        <th>Image</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(!empty($blogs)){ ?>
                    <?php foreach($blogs as $blog){ ?>

                        <tr>
                            <td><?php echo $blog->id; ?></td>
                            <td><?php echo $blog->title; ?></td>
                            <td><?php echo $blog->description_one; ?></td>
                            <td><?php echo $blog->description_two; ?></td>
                            <td><?php echo $blog->button_text; ?></td>

                            <td>
                                <?php if(!empty($blog->image)){ ?>
                                    <img src="<?php echo base_url('uploads/'.$blog->image); ?>" width="60">
                                <?php } ?>
                            </td>


                            <td>
                                <a href="<?php echo base_url('home/edit_home_blog/'.$blog->id); ?>"
                                   class="btn btn-primary btn-sm">Edit</a>

                                <a href="<?php echo base_url('home/delete_home_blog/'.$blog->id); ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure?')">
                                   Delete
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="8" class="text-center">No Blogs Found</td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>

</div>
