  <!-- plugins:js -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" ></script>  
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->

<!-- plugins:js -->
<script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/popper.min.js') }}" ></script>
  <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/data-table.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/select2.min.js') }}"></script>
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
  <script>
	$(document).ready(function() {
		$('.select2').select2();
		});
  </script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    } );
  </script>


 <script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/popper.min.js') }}" ></script>
  <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
  
