<template>
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST" action="/login">
                <input type="hidden" name="_token" :value="csrf" >
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" v-model="email" required autofocus>
                    </div>
                    <span class="invalid-feedback d-block text-center" role="alert">
                        <strong>{{ email_errors}}</strong>
                    </span>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                    <span class="invalid-feedback d-block text-center" role="alert">
                        <strong>{{ password_errors}}</strong>
                    </span>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "login",
        props:['email_props','email_errors','password_errors'],
        data:function () {
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                email:this.email_props
            }
        }
    }
</script>

<style scoped>

</style>