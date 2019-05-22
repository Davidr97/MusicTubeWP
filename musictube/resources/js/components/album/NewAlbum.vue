<template>
    <div class="card">
        <div class="card-header">Add New Album</div>

        <div class="card-body">
            <form method="POST" v-bind:action="url">
                <input type="hidden" name="_token" :value="csrf" >

                <div class="row mb-4">
                    <div class="col-12 text-center" >
                        <img v-bind:src="photo_url" class="img-fluid rounded" style="width: 100px; height:100px;" alt="Album photo">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" v-model="name" required >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="year" class="col-md-4 col-form-label text-md-right font-weight-bold ">Year</label>

                    <div class="col-md-6">
                        <input id="year" type="text" class="form-control" name="year" v-model="year">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="photo_url" class="col-md-4 col-form-label text-md-right font-weight-bold">Cover Photo URL</label>

                    <div class="col-md-6">
                        <input id="photo_url" type="text" class="form-control" name="photo_url" v-model="photo_url">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="artist" class="col-md-4 col-form-label text-md-right font-weight-bold">Artist</label>

                    <div class="col-md-6">
                        <select id="artist" class="form-control" name="artist" v-model="artist_id">
                            <option v-for="artist in all"
                                    v-bind:value="artist.id">
                                {{artist.name}}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-2 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                             Add
                        </button>
                    </div>
                    <div class="col-md-2">
                        <a v-on:click="back" class="btn btn-primary text-white">
                            Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['artists', 'url'],
        data(){
            return {
                photo_url: '',
                artist_id: 1,
                year: '',
                name: '',
                all: JSON.parse(this.artists),
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        name: "new-album",
        methods: {
            back() {
                location.href = this.url;
            }
        }
    }
</script>

<style scoped>

</style>