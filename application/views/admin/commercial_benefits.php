<h3 class="mb-4 fw-bold text-orange">
  Commercial Benefits Section
</h3>

<div class="card shadow-sm border-0">

  <div class="card-header bg-orange text-white fw-semibold">
    Manage Commercial Benefits
  </div>

  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th width="60">#</th>
            <th>Benefit Title</th>
            <th width="140" class="text-center">Action</th>
          </tr>
        </thead>

        <tbody>
        <?php if(!empty($benefits)){ foreach($benefits as $i=>$b){ ?>
          <tr>
            <td><?= $i+1 ?></td>

            <td>
              <form method="post"
                    action="<?= base_url('commercial/update_benefit/'.$b->id) ?>"
                    class="d-flex gap-2">

                <input type="text"
                       name="title"
                       value="<?= $b->title ?>"
                       class="form-control form-control-sm"
                       required>

                <button class="btn btn-sm btn-orange">
                  Update
                </button>
              </form>
            </td>

            <td class="text-center">
              <a href="<?= base_url('commercial/delete_benefit/'.$b->id) ?>"
                 class="btn btn-sm btn-danger"
                 onclick="return confirm('Delete this benefit?')">
                 Delete
              </a>
            </td>
          </tr>
        <?php }} else { ?>
          <tr>
            <td colspan="3" class="text-center text-muted">
              No data found
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- ADD -->
    <form method="post"
          action="<?= base_url('commercial/add_benefit') ?>"
          class="row g-2 mt-4">

      <div class="col-12 col-md-9">
        <input type="text"
               name="title"
               class="form-control"
               placeholder="Enter new benefit"
               required>
      </div>

      <div class="col-12 col-md-3 d-grid">
        <button class="btn btn-orange">
          Add Benefit
        </button>
      </div>

    </form>

  </div>
</div>

<style>
.bg-orange{background:#ff7a00!important;}
.text-orange{color:#ff7a00;}
.btn-orange{background:#ff7a00;color:#fff;border:none;}
.btn-orange:hover{background:#e56e00;color:#fff;}
</style>
