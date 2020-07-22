import SaldoLayout from "@/layout/saldo/SaldoLayout.vue";
// GeneralViews
import NotFound from "@/pages/NotFoundPage.vue";

// Admin pages
import Saldo from "@/pages/Saldo.vue";
import Deposito from "@/pages/Deposito/Deposito.vue";
import Saque from "@/pages/Saque/Saque.vue";

const routes = [
  {
    path: "/",
    component: SaldoLayout,
    redirect: "/saldo",
    children: [
      {
        path: "saldo",
        name: "saldo",
        component: Saldo
      },    
      {
        path: "deposito",
        name: "deposito",
        component: Deposito
      },
      {
        path: "saque",
        name: "saque",
        component: Saque
      }
    ]
  },
  { path: "*", component: NotFound }
];

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes;
