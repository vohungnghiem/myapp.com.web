$(document).ready(function() {
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {
                lfm({ type: 'image', prefix: '/laravel-filemanager' }, function(lfmItems, path) {
                    lfmItems.forEach(function(lfmItem) {
                        context.invoke('insertImage', lfmItem.url);
                    });
                });
            }
        });
        return button.render();
    };

    $('.summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'video']],
            ['popovers', ['lfm']],
            ['view', ['fullscreen', 'codeview', 'help']],

        ],
        buttons: {
            lfm: LFMButton
        }
    })

    // alone button
    $('.lfm').filemanager('image');
});