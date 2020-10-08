import Home from './pages/Home';
import Login from './pages/Login';
import Cliente from './pages/Cliente';
import ClienteCrear from './pages/ClienteCrear';
import ClienteEditar from './pages/ClienteEditar';

export default [
    {
        path : '/',
        component: Home,
        name: 'home'
    },
    {
        path : '/login',
        component: Login,
        name: 'login'
    },
    {
        path : '/clientes',
        component: Cliente,
        name: 'clientes'
    },
    {
        path : '/crear-cliente',
        component: ClienteCrear,
        name: 'crear-cliente'
    },
    {
        path : '/editar-cliente/:id',
        component: ClienteEditar,
        name: 'editar-cliente'
    },
]
