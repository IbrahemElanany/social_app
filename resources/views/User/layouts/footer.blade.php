<!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ url('front/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ url('js/toastr.min.js') }}"></script>

	<script type="text/javascript">
	    toastr.options = {
	        "progressBar": true,
	        "positionClass": "toast-bottom-right",
	    };
	</script>
	<script type="text/javascript">
	    @if(session()->has("message"))
	        toastr.success("{{session()->get('message')}}");
	    @elseif(session()->has("error"))  
	    	toastr.danger("{{session()->get('error')}}");  
	    @endif
	</script>

</body>

</html>
