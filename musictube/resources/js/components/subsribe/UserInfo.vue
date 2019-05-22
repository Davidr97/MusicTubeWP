<template>
    <div class="col-4 mb-5">
        <div class="row">
            <div class="col-4">
                <img class="img-fluid rounded-circle"
                     v-bind:src="image"
                     alt="User picture">
            </div>
            <div class="col-8">
                <a v-bind:href="url">
                    {{name}} {{surname}}
                </a>
                <p>
                    <span class="text-muted">
                        {{email}}
                    </span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserInfo",
        props: ['url', 'image', 'name', 'surname', 'email']
    }
</script>

<style scoped>

</style>