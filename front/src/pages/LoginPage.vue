<template>
  <div
    class="window-height window-width row justify-center items-center background_color"
  >
    <div class="column q-pa-lg">
      <div class="row">
        <q-card square class="shadow-24 size_card border-radius" >
          <q-card-section class="bg-blue-10">
            <h4 class="text-h5 text-white q-my-md text-center">Login</h4>
          </q-card-section>
          <q-card-section>
            <img src="https://app.onfly.com.br/images/main-logo.png" class="img_login" alt="Logo">
            <q-form class="q-px-sm q-pt-xl" >
              <q-input square clearable v-model="email" type="email" label="Email">
                <template v-slot:prepend>
                  <q-icon name="email" />
                </template>
              </q-input>
              <q-input square clearable v-model="password" type="password" label="Senha">
                <template v-slot:prepend>
                  <q-icon name="lock" />
                </template>
              </q-input>
            </q-form>
          </q-card-section>
          <q-card-actions class="q-px-lg">
            <q-btn unelevated size="lg" color="blue-10"  icon="login" class="full-width text-white" @click="submit" label="Entrar" />
          </q-card-actions>
          <q-card-section class="text-center q-pa-sm">
            <router-link to="/cadastro">
              <q-btn color="grey-4" text-color="blue-10" glossy unelevated icon="account_circle" label="Criar Conta"  />
            </router-link>
          </q-card-section>
        </q-card>
      </div>
    </div>
  </div>
</template>
<script>
import Cookie from 'js-cookie';
export default {
  data() {
    return {
      email: '',
      password: '',
      error: '',
    };
  },
  created() {
    Cookie.remove('login_token');
  },
  methods: {
    submit() {
      const payload = {
        email: this.email,
        password: this.password,
      };

      fetch(`http://127.0.0.1:8000/api/login`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Access': 'application/json',
        },
        body: JSON.stringify(payload)
      }).then(response => response.json())
        .then(res => {
          console.log(res);
          Cookie.set('login_token', res.authorization.token);
          Cookie.set('user_name', res.user.name);
          Cookie.set('user_mail', res.user.email);
          Cookie.set('user_id', res.user.id);
          this.$router.push('/despesas'); // Redireciona para a rota '/despesas'
        })
        .catch(error => {
           alert('Login inválido. Por favor, verifique suas credenciais.');
        });
    },
  }
}
</script>

<style>
</style>