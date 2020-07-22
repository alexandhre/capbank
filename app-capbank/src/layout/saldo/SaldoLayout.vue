<template>
  <div class="wrapper">
    <side-bar>
      <template slot="links">
        <sidebar-link to="/saldo" name="Saldo" icon="ti-pulse"/>
        <sidebar-link to="/saque" name="Saque" icon="ti-hand-drag"/>
        <sidebar-link to="/deposito" name="Depósito" icon="ti-folder"/>    
      </template>
      <mobile-menu>        
        <drop-down class="nav-item"
                   title="Configurações"
                   title-classes="nav-link"
                   icon="ti-settings">
          <a class="dropdown-item" to="/stats">Perfil</a>
          <a class="dropdown-item">Log Out</a>
        </drop-down>      
        <li class="divider"></li>
      </mobile-menu>
    </side-bar>
    <div class="main-panel">
      <top-navbar></top-navbar>

      <dashboard-content @click.native="toggleSidebar">

      </dashboard-content>

      <content-footer></content-footer>
    </div>
  </div>
</template>
<style lang="scss">
</style>
<script>
import TopNavbar from "./TopNavbar.vue";
import ContentFooter from "./ContentFooter.vue";
import DashboardContent from "./Content.vue";
import MobileMenu from "./MobileMenu";
export default {
  components: {
    TopNavbar,
    ContentFooter,
    DashboardContent,
    MobileMenu
  },
  methods: {
    toggleSidebar() {
      if (this.$sidebar.showSidebar) {
        this.$sidebar.displaySidebar(false);
      }
    }
  }
};
</script>
