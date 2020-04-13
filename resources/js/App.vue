<template>
    <!-- <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link to="/ragionisociali" class="nav-link">Ragioni Sociali</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/voucherlist" class="nav-link">Voucher </router-link>
        </li>
        <li class="nav-item navbar-right">
          <button>Populate Db</button>
        </li>

      </ul>
    </nav><br />
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div> -->

    <div class="container">
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-brand href="#">Davinci </b-navbar-brand>

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
import http from "./http-common";

export default {
   
};
</script>
