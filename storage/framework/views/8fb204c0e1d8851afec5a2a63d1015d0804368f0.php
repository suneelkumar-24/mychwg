



<!-- Modal -->

<div class="modal fade" id="markBookingComplete" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Completed Appointment Details</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

        <form method="post" action="<?php echo e(route('homeopath.bookings.complete')); ?>" enctype="multipart/form-data">

          

          <div class="modal-body">

            <?php echo csrf_field(); ?>

            <input type="hidden" name="booking_id" id="booking_id">

            <label>Prescription Detail</label>

            <textarea class="form-control" name="prescription" rows="6" placeholder="Prescription" required=""></textarea>





            <label>Any Attachement</label>

            <input type="file" name="attachement" class="form-control dropify">



          </div>

          <div class="modal-footer">

            <button type="submit" class="btn btn-dark">Continue</button>

          </div>



        </form>

      

    </div>

  </div>

</div>

    <?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/homeopath_modals.blade.php ENDPATH**/ ?>