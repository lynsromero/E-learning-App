<!-- Bootstrap JS -->
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/chartjs/js/chart.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<!--notification js -->
<script src="{{ asset('backend/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/index3.js') }}"></script>
<!--Password show & hide js -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  $(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
      event.preventDefault();
      if ($('#show_hide_password input').attr("type") == "text") {
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass("bx-hide");
        $('#show_hide_password i').removeClass("bx-show");
      } else if ($('#show_hide_password input').attr("type") == "password") {
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass("bx-hide");
        $('#show_hide_password i').addClass("bx-show");
      }
    });
  });
</script>


<script>
  $(document).ready(function () {
    $('#photo').on('change', function (event) {
      const [file] = event.target.files;

      if (file) {
        $('#photoPreview')
          .attr('src', URL.createObjectURL(file))
          .css('display', 'block');
      }
    });
  });
</script>


<!--app JS-->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>


<script>
  @if (session('success'))
  Swal.fire({
    toast:true,
    position:'top-end',
    icon: 'success',
    title: '{{ session('success') }}',
    showConfirmButton: false,
    timer: 3000,
    background: '#fff',
  });
  @elseif (session('error'))
  Swal.fire({
    toast:true,
    position:'top-end',
    icon: 'error',
    title: '{{ session('error') }}',
    showConfirmButton: false,
    timer: 3000,
    background: '#fff',
  });    
  @endif
</script>