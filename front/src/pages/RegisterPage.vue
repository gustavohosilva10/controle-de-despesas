<template>
  <div
  class="window-height window-width row justify-center items-center background_color"
  >
      <div class="column q-pa-lg">
        <div class="row">
          <q-card square class="shadow-24 size_card"> 
            <q-card-section class="bg-purple-7">
              <h4 class="text-h5 text-white q-my-md text-center">Cadastrar</h4>
            </q-card-section>
            <q-card-section>
              <q-form class="q-px-sm q-pt-xl q-pb-lg">
                <q-input square clearable v-model="name" type="text" label="Nome Completo">
                  <template v-slot:prepend>
                    <q-icon name="person" />
                  </template>
                </q-input>
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
              <q-btn unelevated size="lg" color="purple-7" class="full-width text-white" @click="register" label="Cadastrar" />
            </q-card-actions>
            <q-card-section class="text-center q-pa-sm">
              <router-link to="/">
              <q-btn color="grey-4" text-color="purple-7" glossy unelevated icon="arrow_back" label="Voltar para o login"  />
            </router-link>
            </q-card-section>
          </q-card>
        </div>
      </div>
    </div>
</template>
  <script>
  export default {
    data () {
      return {
        user:'',
        name:'',
        email: '',
        password: ''
      }
    },
    methods: {
    register() {
      const register = {
        name: this.name,
        email: this.email,
        password: this.password,
      };

      fetch(`http://127.0.0.1:8000/api/register`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Access': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify(register)
      }).then(response => response.json())
        .then(res => {
          alert('Cadastrado com sucesso !');
        })
        .catch(error => {
           alert('algo deu errado');
        });
    },
  }
  }
  </script>
  <style>
  </style>