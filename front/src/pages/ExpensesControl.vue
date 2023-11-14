<template>
  <div class="window-height window-width q-pa-lg background_color">
    <div class="row justify-center">
      <div square class="shadow-24 size_expenses">
        <q-card-section class="bg-purple-10">
          <h4 class="text-h5 text-white q-my-md text-center">Controle de Despesas</h4>
        </q-card-section>
        <q-card class="bg-grey-4">
          <q-card-section>
            <div class="q-gutter-md">
              <q-input v-model="this.user" filled label="Usuário Logado" outlined readonly />
              <q-input v-model="description" filled label="Descrição" outlined />
              <q-select class="q-mt-md " v-model="category" filled label="Categoria" outlined :options="categoryOptions" />
              <q-input v-model="value" filled label="Valor" type="number" outlined />
              <q-input v-model="date" filled type="date" label="Data" />
            </div>
            <div class="q-gutter-md row items-end justify-end">
              <q-btn label="Adicionar Despesa" @click="addExpense" color="purple-10" class="q-mt-lg" />
            </div>
          </q-card-section>
          <q-table :rows="expenses" :columns="columns" :no-data-label="customNoDataLabel" row-key="id" class="q-mt-md" style="background-color: rgb(216, 213, 213);">
          <template v-slot:body-cell="props">
            <q-td v-if="props.col.name !== 'actions'">
              <!-- Formatação da data -->
              <span v-if="props.col.name === 'date'">{{ formatDate(props.value) }}</span>
              <!-- Formatação do valor -->
              <span v-else-if="props.col.name === 'value'">{{ formatValue(props.value) }}</span>
              <!-- Outros campos -->
              <span v-else>{{ props.value }}</span>
            </q-td>
            <q-td v-else>
              <q-btn flat dense icon="delete" color="purple" @click="deleteExpense(props.row.id)" />
            </q-td>
          </template>
        </q-table>
        </q-card>
      </div>
    </div>
  </div>
</template>
<script>
import Cookie from 'js-cookie';
import { format } from 'date-fns';

export default {
  data() {
    return {
      user_id:'',
      user:'',
      login_token:'',
      description:'',
      category: '',
      value: '',
      date: '',
      customNoDataLabel: 'Não há dados disponíveis para exibir',
      categoryOptions: ["Alimentação", "Lazer", "Transporte", "Outros"],
      expenses: [],
      columns: [
        {
          name: "description",
          required: true,
          label: "Descrição",
          align: "left",
          field: "description",
          sortable: true,
        },
        {
          name: "category",
          required: true,
          label: "Categoria",
          align: "left",
          field: "category",
          sortable: true,
        },
        {
          name: "value",
          required: true,
          label: "Valor",
          align: "left",
          field: "value",
          sortable: true,
        },
        {
          name: "date",
          required: true,
          label: "Data",
          align: "left",
          field: "date",
          sortable: true,
        },
        { name: "actions", label: "Ações", align: "center", field: "actions" },
      ],
    };
  },
  created(){
      this.user = Cookie.get('user_name');
      this.login_token = Cookie.get('login_token');
      this.user_id = Cookie.get('user_id');
      this.user_email = Cookie.get('user_mail');
    },
    mounted(){
      this.showExpense();
    },
    wacth(){
      this.showExpense();
    },
  methods: {
    async showExpense(){
      let resp =  await fetch(`http://127.0.0.1:8000/api/show_expenses`, {
        method: 'get',
        headers: {
          Authorization: 'Bearer ' + this.login_token,
          'Content-Type': 'application/json',
        },
      }).then(response => response.json())
      .then(resp => {
        console.log(resp);
        this.expenses = resp;
        console.log(this.expenses)
      })
    },
    deleteExpense(id) {
      const delete_expenses = {
        id: id ,
      };
      fetch(`http://127.0.0.1:8000/api/delete`, {
        method: 'POST',
        headers: {
          Authorization: 'Bearer ' + this.login_token,
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(delete_expenses)
      }).then(response => response.json())
        .then(res => {
          alert('Despesa deletada com sucesso !');
        })
        .catch(error => {
           alert('algo deu errado');
        });
        this.showExpense();
    },
    addExpense() {
      const register_expenses = {
        user_id: this.user_id ,
        user: this.user ,
        email: this.user_email,
        description: this.description ,
        category: this.category ,
        value: this.value ,
        date: this.date,
      };
      fetch(`http://127.0.0.1:8000/api/register_expenses`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Access': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify(register_expenses)
      }).then(response => response.json())
        .then(res => {
          alert('Despesa adicionada com sucesso !');
        })
        .catch(error => {
           alert('algo deu errado');
        });

        this.description = "";
        this.category = "";
        this.value = "";
        this.date = "";
        this.showExpense();
    },
    formatDate(date) {
      return format(new Date(date), 'dd/MM/yyyy');
    },
    formatValue(value) {
      return Number(value).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    },
  },
};
</script>
<style scoped>
</style>
