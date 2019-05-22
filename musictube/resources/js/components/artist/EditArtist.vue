<template>
    <div class="card">
        <div class="card-header">Edit Artist</div>

        <div class="card-body">
            <form method="POST" v-bind:action="url">
                <input type="hidden" name="_token" :value="csrf" >
                <input type="hidden" name="_method" value="put" />

                <div class="row mb-4">
                    <div class="col-12 text-center" >
                        <img v-bind:src="photo_url" class="img-fluid rounded" style="width: 100px; height:100px;" alt="Band photo">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" v-model="name" required >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right font-weight-bold">Country</label>

                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control" name="country" v-model="country" required >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="year" class="col-md-4 col-form-label text-md-right font-weight-bold">Year</label>

                    <div class="col-md-6">
                        <input id="year" type="text" class="form-control" name="year" v-model="year">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="photo_url" class="col-md-4 col-form-label text-md-right font-weight-bold">Band Photo URL</label>

                    <div class="col-md-6">
                        <input id="photo_url" type="text" class="form-control" name="photo_url" v-model="photo_url">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right font-weight-bold">Description</label>

                    <div class="col-md-6">
                        <textarea id="description" class="form-control" name="description" >{{description}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_band" class="col-md-4 col-form-label text-md-right font-weight-bold">Band</label>

                    <div class="col-md-6">
                        <input id="is_band" type="checkbox" class="checkbox-inline mt-2" name="is_band" value="yes" v-model="band">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-2 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Edit
                        </button>
                    </div>
                    <div class="col-md-2 btn btn-primary ">
                        <a v-on:click="back" class="text-white">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "edit-artist",
        props: ['url', 'country', 'name', 'year', 'photo_url', 'description', 'band'],
        data() {
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        methods: {
            back() {
                location.href = this.url;
            }
        }
    }
</script>

<style scoped>

</style>