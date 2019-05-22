<template>
    <form method="POST" action="/add_track">
        <div class="form-group row ">
            <label for="file" class="col-sm-4 col-form-label text-md-right">Track Upload</label>
            <div class="col-md-6">
                <div id="file" class="dropzone"></div>
            </div>
        </div>
        <track-form :album_props="album_props"
                    :album="-1"
                    :uploaded_file_props="uploaded_file"
                    button_text="Add"></track-form>
    </form>
</template>

<script>
    export default {
        name: "add-track-form",
        props:['album_props'],
        data:function () {
            return{
                uploaded_file:false
            }
        },
        methods:{
          uploadedFile:function(val){
              this.uploaded_file=val;
          }
        },
        mounted(){
            let uploaded=this.uploadedFile;
            let drop = new Dropzone('#file', {
                dictDefaultMessage: "Drag and drop a track here or click on me to choose from file system",
                addRemoveLinks: true,
                url: "upload",
                maxFiles: 1,
                acceptedFiles:'audio/*',
                init:function() {
                    this.on("success", function (file, response) {
                        uploaded(true);
                    });

                    this.on("error", function (file, error, xhr) {
                        uploaded(false);
                    });

                    this.on('removedfile', function (file) {
                        $.ajax({
                            type: "POST",
                            url: '/delete_upload',
                            data: {
                                name: file.name,
                                _token: document.head.querySelector('meta[name="csrf-token"]').content
                            },
                            success: function (data) {
                                uploaded(false);
                            },
                            error: function (data, textStatus, errorThrown) {
                                uploaded(true);
                            }
                        })
                    })
                },
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                }
            });
        }
    }
    //window.onload = function() {
    //
    //};
</script>

<style scoped>

</style>