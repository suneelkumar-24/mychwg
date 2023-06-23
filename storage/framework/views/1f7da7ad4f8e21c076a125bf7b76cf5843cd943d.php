<?php $__env->startSection('title','Discounts Statistics'); ?>
<?php $__env->startSection('heading','Discounts Statistics'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
<style>
  .custom-control-input:checked~.custom-control-label::before {
    background-color: #007bff;
    border-color: #007bff;
  }

  /* Change the size of the toggle (optional) */
  .custom-switch .custom-control-label::before {
    width: 40px;
    height: 22px;
  }

  .custom-switch .custom-control-label::after {
    width: 18px;
    height: 18px;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7fn8PndxM4t+1mLlrDEvITar4Pz4lP/Lf6cJXC6yS/io" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('.datepicker').datepicker({
      language: "es",
      autoclose: true,
      format: "dd/mm/yyyy",
      startDate: new Date()

    });
  });
</script>
<script>
  $(document).ready(function() {
    // Get the CSRF token from the meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Attach an event handler to the toggle checkbox
    $('#toggleCheckbox').on('change', function() {
      // Get the current state of the checkbox
      const isChecked = $(this).is(':checked');
      const checkboxId = $(this).data('id');

      // Perform the AJAX call
      $.ajax({
        url: "<?php echo e(route('admin.discount-toggle')); ?>", // Replace with your desired URL
        type: 'POST',
        data: {
          isChecked: isChecked,
          _token: csrfToken,
          checkboxId: checkboxId
        },
        success: function(response) {
          location.reload(true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Handle any errors during the AJAX call
          console.error(textStatus, errorThrown);
        }
      });
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard">

            <form method="POST" action="<?php echo e(route('admin.discount-code-store')); ?>">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="col-md-12">
                  <h4>Create Discount Code</h4>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Code</label>
                  <input type="text" class="form-control" name="code" required>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Validity</label>
                  <input type="text" class="datepicker form-control" name="validity" required>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Type</label>
                  <select class="form-control" name="type">
                    <option class="Fixed">Fixed</option>
                    <option class="Percentage">Percentage</option>
                  </select>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Value</label>
                  <input type="number" name="value" class="form-control" required>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="status">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <br/>
                  <br/>
                  <input type="submit" class="btn btn-primary" name="Save" style="float:right;">
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 p-0">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="table datatable p-0">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Validity</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($cod->code); ?></td>
                    <td><?php echo e($cod->validity); ?></td>
                    <td><?php echo e($cod->type); ?></td>
                    <td><?php echo e($cod->value); ?></td>
                    <td>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" data-id="<?php echo e($cod->id); ?>" <?php echo e($cod->status == 1 ? 'checked' : ''); ?> id="toggleCheckbox">
                        <label class="custom-control-label" for="toggleCheckbox"></label>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/discount/index.blade.php ENDPATH**/ ?>