<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Twitter Application</title>

<link href="{{ asset('moldavite/css/style.default.css') }}" rel="stylesheet">
<!--link href="{{ asset('moldavite/css/morris.css') }}" rel="stylesheet"-->
<!-- <link href="{{ asset('moldavite/css/select2.css') }}" rel="stylesheet" />	 -->	
<link href="{{ asset('moldavite/css/select2.min.css') }}" rel="stylesheet" />	
	<!--link href="{{ asset('moldavite/js/css3clock/css/style.css') }}" rel="stylesheet"-->
	<!--link href="{{ asset('moldavite/css/style.calendar.css') }}" rel="stylesheet"-->
	
<link href="{{ asset('moldavite/css/style.datatables.css') }}" rel="stylesheet">
<link href="{{ asset('moldavite/cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css') }}" rel="stylesheet">
<link href="{{ asset('moldavite/css/jquery.gritter.css') }}" rel="stylesheet">
<link href="{{ asset('moldavite/css/dropzone.css') }}" rel="stylesheet" />
<link href="{{ asset('moldavite/css/lightbox.css') }}" rel="stylesheet" />
<script type="text/javascript">
	var SITE_URL = "{{ url('') }}/";
	var SEGMENT = "{{ Request::segment(3) }}";
</script>