jQuery(function($) {

    $(document).ready(function () {

            var mediaUploader;

            // we can now use a single class name to reference all upload buttons
            $('.wp-admin').on('click', '.upload-button', function(e) {

                e.preventDefault();                

                // store the element that was clicked for use later
                trigger = $(this);

                if( mediaUploader ){
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Upload', 
                    button: {
                        text: 'Upload'
                    },
                    multiple: false
                });

                mediaUploader.on('select', function() {

                    attachment = mediaUploader.state().get('selection').first().toJSON();

                    // we're replacing this line:
                    //$('#preview-fav, #preview-grav, #preview-thumb').val(attachment.url);

                    // assign the value of attachment to an input based on the data-target value
                    // of the button that was clicked to launch the media browser
                    $('#' + trigger.data('target') ).val(attachment.url);

                    $('.favicon-preview, .logo-preview').css('background','url(' + attachment.url + ')');
                });

                mediaUploader.open();

            });            

    });

});
