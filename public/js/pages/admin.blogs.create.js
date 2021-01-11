if(ClassicEditor) {
    ClassicEditor
        .create(document.querySelector('#content-editor'))
        .then(function (editor) {
            window.editor = editor;
        })
        .catch(function (err) {

        })
}

$(document).ready(function () {
    var jQFeatureImage = $('#feature-image');
    var jQImageInput = jQFeatureImage.siblings('input');

    jQFeatureImage.click(function () {
        jQImageInput.click();
    })

    jQImageInput.on('change', function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                jQFeatureImage.attr('src', fr.result);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    });

    $('#blog-form').submit(function () {
        var jQInput = $('#content-editor').siblings('input');
        jQInput.val(editor.getData());
        return true;
    });
})