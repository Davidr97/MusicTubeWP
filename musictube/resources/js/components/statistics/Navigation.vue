<template>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single-about-content">
                <router-link to="mostListened" class="tran3s" @click.native="handleClick" data-active="1">
                    <div class="icon round-border tran3s" :class="{activeIcon: isFirstActive}" data-active="1">
                        <i class="fa fa-music" aria-hidden="true" :class="{activeFontIcon: isFirstActive}" data-active="1"></i>
                    </div>
                </router-link>
                <h5><router-link to="mostListened" class="tran3s" @click.native="handleClick" data-active="1">Most listened tracks</router-link></h5>
            </div> <!-- /.single-about-content -->
        </div> <!-- /.col -->

        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single-about-content">
                <router-link to="mostLiked" class="tran3s" @click.native="handleClick" data-active="2">
                    <div class="icon round-border tran3s" :class="{activeIcon: isSecondActive}" data-active="2">
                        <i class="fa fa-thumbs-up" aria-hidden="true" :class="{activeFontIcon: isSecondActive}" data-active="2"></i>
                    </div>
                </router-link>
                <h5><router-link to="mostLiked" class="tran3s" @click.native="handleClick" data-active="2">Most liked tracks</router-link></h5>
            </div> <!-- /.single-about-content -->
        </div> <!-- /.col -->

        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single-about-content">
                <router-link to="mostDisliked" class="tran3s" @click.native="handleClick" data-active="3">
                    <div class="icon round-border tran3s" :class="{activeIcon: isThirdActive}" data-active="3">
                        <i class="fa fa-thumbs-down" aria-hidden="true" :class="{activeFontIcon: isThirdActive}" data-active="3"></i>
                    </div>
                </router-link>
                <h5><router-link to="mostDisliked" class="tran3s" @click.native="handleClick" data-active="3">Most disliked tracks</router-link></h5>
            </div> <!-- /.single-about-content -->
        </div> <!-- /.col -->

        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single-about-content">
                <router-link to="mostRecent" class="tran3s" @click.native="handleClick" data-active="4">
                    <div class="icon round-border tran3s" :class="{activeIcon: isFourthActive}" data-active="4">
                        <i class="fa fa-line-chart" aria-hidden="true" :class="{activeFontIcon: isFourthActive}" data-active="4"></i>
                    </div>
                </router-link>
                <h5> <router-link to="mostRecent" class="tran3s" @click.native="handleClick" data-active="4">Most recent tracks</router-link></h5>
            </div> <!-- /.single-about-content -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</template>

<script>
    export default {
        name: "Navigation",

        data(){
            return {
                isActive: 1
            }
        },

        computed: {
            isFirstActive(){
                return this.isActive === 1;
            },
            isSecondActive(){
                return this.isActive === 2;
            },
            isThirdActive(){
                return this.isActive === 3;
            },
            isFourthActive(){
                return this.isActive === 4;
            }
        },

        methods: {
            handleClick(event){
                this.isActive = parseInt(event.target.dataset.active);
            }
        }
    }
</script>

<style scoped>

</style>