<?php include_once "../htmltemplates/header-top-body.php"?>


<div class="page-wrapper">
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sistema para TeleConsultas</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-12">
                <div id="meet" allow='camera; microphone'></div>
            </div>
        </div>
    </div>
</div>

<?php include_once "../htmltemplates/low-body-footer-scripts.php"?>
<!-- biblio de jitsi meet -->
<script src="../dist/js/meet-jit-si.js"></script>
<script type="text/javascript">
    var parentWidth = $('#meet').clientWidth;
    var parentHeight = 500;
    const domain = 'meet.jit.si';
    const options = {
        roomName: 'CMSJAndresVega',
        width: parentWidth,
        height: parentHeight,
        parentNode: document.querySelector('#meet'),
        /*,interfaceConfigOverwrite: { filmStripOnly: true }*/
    };
    const api = new JitsiMeetExternalAPI(domain, options);
</script>