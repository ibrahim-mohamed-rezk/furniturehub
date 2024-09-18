<div>
    <script src="https://cdn.tiny.cloud/1/4hsatbqen06nciyexl8r8h7dw8b0y3n93695z1ojed7u3gvj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


    <!-- Place the following <script>
        and < textarea > tags your HTML 's <body> -->
          <script >
            tinymce.init({
                selector: 'textarea#myeditorinstance',
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                language_url: '/public/assets/web/ASSETS_En/js/langs/ar.js',
                // language: language, 
                // language_load: true, 

                content_css: 'tinymce-5-dark',
                statusbar: false,
                height: 600,

                mergetags_list: [{
                        value: 'First.Name',
                        title: 'First Name'
                    },
                    {
                        value: 'Email',
                        title: 'Email'
                    },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                    "See docs to implement AI Assistant")),
            });
            
    </script>
</div>
