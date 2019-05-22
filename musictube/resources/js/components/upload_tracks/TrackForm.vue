<template>
    <div>
        <input type="hidden" name="_token" :value="csrf" >
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" v-model="name" required autofocus />
            </div>
        </div>
        <div class="form-group row">
            <label for="lyrics" class="col-sm-4 col-form-label text-md-right">Lyrics</label>
            <div class="col-md-6">
                <textarea id="lyrics" class="form-control" name="lyrics" v-model="lyrics" autofocus></textarea>

            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label text-md-right">Description</label>
            <div class="col-md-6">
                <textarea id="description" class="form-control" name="description" v-model="description" autofocus ></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="album" class="col-sm-4 col-form-label text-md-right">Album</label>
            <div class="col-md-6">
                <select id="album" name="album" class="form-control" v-model="album" required>
                    <option value="-1" disabled>Select album</option>
                    <option v-for="a in albums"
                            v-bind:value="a.id">
                        {{a.name}}
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-2 offset-md-4">
                <button id="upload_submit" type="submit" class="btn btn-primary" :disabled="(name_entered && album_entered && uploaded_file_props)===false?'true':false">{{button_text}}</button>
            </div>
            <div class="col-md-1">
                <a href="/tracks"  class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "track-form",
        data(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                albums:JSON.parse(this.album_props),
                name_entered:this.button_text!=='Add',
                album_entered:this.button_text!=='Add',
            }
        },
        props:['name','lyrics','description','album','album_props','button_text','uploaded_file_props'],
        watch:{
            name:function (val) {
                if(val!==undefined && val!=='')
                    this.name_entered=true;
                else
                    this.name_entered=false;
            },
            album:function (val) {
                if(val!==undefined && val!=='-1')
                    this.album_entered=true;
                else
                    this.album_entered=false;
            }
        }
    }
</script>

<style scoped>

</style>