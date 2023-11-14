import Cookie from 'js-cookie';
import router from 'src/router/routes';

export default {
    auth(to, from, next) {
        const token = Cookie.get('login_token');
        
        if(!token){
            next('/'); // caso ñ tenha o token ele n deixa acessar a telaal de despesas.
        }
        next();
    },
}