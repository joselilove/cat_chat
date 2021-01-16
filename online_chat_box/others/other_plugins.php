        <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
        <script src="../assets/node_modules/popper/popper.min.js"></script>
        <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="dist/js/sweetalert2@8.js"></script>
        <script src="../assets/node_modules/dropify/dist/js/dropify.min.js"></script>

        <script src="dist/js/pages/chat.js"></script>


        <script src="../assets/node_modules/summernote/dist/summernote-bs4.min.js"></script>
        <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
        <!--Custom JavaScript -->
        <script type="text/javascript">
            $(function() {
                $(".preloader").fadeOut();
            });
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
            $('#to-recover').on("click", function() {
                $("#loginform").slideUp();
            });
        </script>


        <script>
            $(document).ready(function() {
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove: 'Supprimer',
                        error: 'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element) {
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element) {
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element) {
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e) {
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>



        <script>
            $(function() {

                $('.summernote').summernote({
                    height: 350,
                    // width: 770,
                    // minHeight: null,
                    // maxHeight: null,
                    focus: false
                });

                $('.inline-editor').summernote({
                    airMode: true
                });

            });
        </script>
        <script type="text/javascript">
            $('#slimtest1, #slimtest2, #slimtest3, #slimtest4').perfectScrollbar();
        </script>