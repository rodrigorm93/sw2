<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>MUMEFLET</title>


<link rel="stylesheet" href="{{ asset('katniss/css/style.default2.css') }}">
<link rel="stylesheet" href="{{ asset('katniss/prettify/prettify.css') }}">
<link rel="stylesheet" href="{{ asset('katniss/css/bootstrap-fileupload.min.css') }}">
<link rel="stylesheet" href="{{ asset('katniss/css/bootstrap-timepicker.min.css') }}">

<!--Estilos y JS de la plantilla katniss -->
<script type="text/javascript" src="{!! asset('katniss/prettify/prettify.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery-1.9.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery-migrate-1.1.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery-ui-1.9.2.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/bootstrap.min.js') !!}"></script>   
<script type="text/javascript" src="{!! asset('katniss/js/bootstrap-fileupload.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/bootstrap-timepicker.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery.uniform.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery.validate.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery.tagsinput.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery.autogrow-textarea.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/charCount.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/ui.spinner.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/chosen.jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery.cookie.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/custom.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/forms.js') !!}"></script>
<script type="text/javascript" src="{!! asset('katniss/js/jquery.smartWizard.min.js') !!}"></script>

</head>


<body>
<div class="mainwrapper">

    @yield('contenido')
       
    
</div><!--mainwrapper-->

<script type="text/javascript">
    jQuery(document).ready(function(){
        // Smart Wizard     
        jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
        jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
        jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});
        jQuery('#wizard4').smartWizard({onFinish: onFinishCallback});
        
        function onFinishCallback(){
            alert('Finish Clicked');
        } 
        
        jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
        
        jQuery('select, input:checkbox').uniform();
    });
</script>

</body>
</html>
