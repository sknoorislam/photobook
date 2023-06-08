<template>
  <teleport to="header">
    <HeaderPart />
  </teleport>
  <router-view/>
  <teleport to="footer">
    <FooterPart />
  </teleport>
</template>

<style>
#app {
  margin-top: 60px !important;
}

/* nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
} */

</style>

<script>
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import HeaderPart from './theme/HeaderPart.vue';
import FooterPart from "./theme/FooterPart.vue";

export default{
  components:{
    HeaderPart,
    FooterPart
  }
}
</script>