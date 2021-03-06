const vueRoutes = [
  { path: '/', name: 'home', component: HomeComponent },
  { path: '/services', name: 'services', component: JobComponent, props: route => ({ categorias: route.query.categorias, homeurl: route.query.homeurl }) },
  { path: '/services/show', name: 'services_show', component: servicoShow, props: route => ({ servico: route.query.servico, categorias: route.query.categorias }) },
  { path: '/services/close/:id', name: 'services_close', component: servicoClose, props: route => ({ servicos: route.params.id, homeurl: route.query.homeurl }) },
  { path: '/messages', name: 'messages', component: MessagesComponent, props: route => ({ homeurl: route.query.homeurl }) },
  { path: '/configuration', component: ConfigComponent },
  { path: '/rating', name:'rating', component: AvaliacoesComponent, props: route => ({ homeurl: route.query.homeurl }) },
];


const router = new VueRouter({
  routes: vueRoutes
});