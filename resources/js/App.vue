<template>
    <div class="">
        <b-navbar toggleable="lg" type="dark" variant="dark" sticky>
            <b-navbar-brand href="/">DaVinci</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <router-link to="/ragionisociali" class="nav-link"
                        >Ragioni Sociali</router-link
                    >
                    <router-link to="/voucherlist" class="nav-link"
                        >Voucher
                    </router-link>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <b-button
                        size="sm"
                        v-b-tooltip.hover title="Populate DB"
                        class="mx-2 my-sm-0"
                        type="button"
                        variant="warning"
                        @click="seed()"
                    >
                        <b-icon icon="cloud-upload" font-scale="1"></b-icon>
                        Populate DB</b-button
                    >
                    <b-button
                        size="sm"
                        v-b-tooltip.hover title="Aggiorna dati"
                        class="mx-2 my-sm-0"
                        type="button"
                        variant="warning"
                        @click="refresh()"
                    >
                        <b-icon icon="arrow-clockwise" font-scale="1"></b-icon>
                    </b-button>
                    <b-button
                        size="sm"
                        v-b-tooltip.hover title="Empty DB"
                        class="mx-2 my-sm-0"
                        type="button"
                        variant="danger"
                        @click="clean()"
                    >
                        <b-icon icon="trash" font-scale="1"></b-icon>
                    </b-button>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-active {
    opacity: 0;
}
</style>

<script>
export default {
    methods: {
        seed() {
            this.$store.dispatch("seedDB");
        },
        clean() {
            this.$store.dispatch("cleanDB");
        },
        refresh() {
            this.$store.dispatch("refresh");
        }
    }
};
</script>
