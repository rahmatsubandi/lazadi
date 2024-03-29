 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; Lazadi 2020 - <?php echo date("Y"); ?></span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Kamu yakin ingin logout ?</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?php echo base_url('login/logout') ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>
 <!-- Untuk ckeditor -->
 <script>
     initSample();
 </script>

 <!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url() ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
 <script src="<?php echo base_url() ?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?php echo base_url() ?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Daterangepicker -->
 <script src="<?php echo base_url() ?>assets/sbadmin/vendor/daterangepicker/moment.min.js"></script>
 <script src="<?php echo base_url() ?>assets/sbadmin/vendor/daterangepicker/daterangepicker.js"></script>
 <!-- Datepicker -->
 <script src="<?php echo base_url() ?>assets/sbadmin/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?php echo base_url() ?>assets/sbadmin/js/sb-admin-2.min.js"></script>
 <!-- Page level plugins -->
 <script src="<?php echo base_url() ?>assets/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url() ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?php echo base_url() ?>assets/sbadmin/js/demo/datatables-demo.js"></script>

 <script>
     //  Datepicker
     $('.datepicker').daterangepicker({
         singleDatePicker: true,
         autoUpdateInput: false,
         //  format tanggal Indonesia
         locale: {
             format: 'DD-MM-YYYY'
         }
     });
     $('.datepicker').on('apply.daterangepicker', function(ev, picker) {
         $(this).val(picker.startDate.format('DD-MM-YYYY'));
     });

     $('.datepicker').on('cancel.daterangepicker', function(ev, picker) {
         $(this).val('');
     });

     // Alert
     window.setTimeout(function() {
         $(".alert").fadeTo(500, 0).slideUp(500, function() {
             $(this).remove();
         });
     }, 3000);

     $(function() {
         $('[data-toggle="tooltip"]').tooltip()
     })
 </script>

 </body>

 </html>