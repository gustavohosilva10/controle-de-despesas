import LoginPage from 'pages/LoginPage';
import ExpensesControl from 'pages/ExpensesControl';
import RegisterPage from 'pages/RegisterPage';
import Guard from './services/middleware';

const routes = [
  {
    path: '/',
    component: LoginPage,
  },
  {
    path: '/despesas',
    component: ExpensesControl,
    beforeEnter: Guard.auth, // a rota /despesas fica bloqueada de ser acessada caso o token nao seja valido
  },
  {
    path: '/cadastro',
    component: RegisterPage,
  },
];
  export default routes
  