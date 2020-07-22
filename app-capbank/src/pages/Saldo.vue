<template>
  <div>  
    <div class="row">
      <div class="col-md-12 col-xl-4" v-for="stats in statsCards" :key="stats.title">
        <stats-card>
          <div class="icon-big text-center" :class="`icon-${stats.type}`" slot="header">
            <i :class="stats.icon"></i>
          </div>
          <div class="numbers" slot="content">
            <p>{{stats.title}}</p>
            {{stats.value}}
          </div>
          <div class="stats" slot="footer">
            <i :class="stats.footerIcon"></i> 
            <a style="cursor:pointer;" @click="isOpen = !isOpen;">{{stats.footerText}}</a>
          </div>
        </stats-card>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <card :title="table1.title" :subTitle="table1.subTitle">
          <div slot="raw-content" class="table-responsive">
            <paper-table :data="table1.data" :columns="table1.columns">
            </paper-table>
          </div>
        </card>
      </div>
    </div>  
    <div v-if="isOpen">
        <div class="overlay" @click.self="isOpen = false;">
          <div class="modal">
            <h1>Senha</h1>
            <p>{{senha}}</p>
          </div>
        </div>
      </div> 
  </div>  
</template>
<script>
import { StatsCard } from "@/components/index";
import { PaperTable } from "@/components";
const axios = require('axios');
const tableColumns = ["Data", "Operação", "Saldo"];
const tableData = [ 
];
export default {
  components: {
    StatsCard,
    PaperTable
  },  
  created() {
    tableData.splice(0, tableData.length);         
    axios
      .get('http://127.0.0.1:88/conta')
      .then(response => {
        this.statsCards[0].value = "R$"+response.data.conta[0].saldo;
        localStorage.id = response.data.conta[0].id;  
        this.senha = response.data.conta[0].senha;
        for(var i = 0; i < response.data.extrato.length; i++){         
          tableData.push({
							data: response.data.extrato[i].data,
							operação: response.data.extrato[i].acao,
              saldo: "R$"+response.data.extrato[i].saldo
						});         
        }                               
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })      
  },
  data() {
    return {
      isOpen: false,
      senha: '',
      statsCards: [        
        {
          type: "success",
          icon: "ti-money",
          title: "Saldo Disponivel",
          value: ""
        },  
        {
          type: "success",
          icon: "ti-user",
          title: "Correntista",
          value: "Alexandre",
          footerText: "Ver Senha",
          footerIcon: "ti-eye"
        },       
      ], 
      table1: {
        title: "Extrato",
        subTitle: "Acompanhamento do Saldo",
        columns: [...tableColumns],
        data: [tableData]
      },          
    };
  }
};
</script>
<style scoped>
.modal {
  text-align: center;
  width: 500px;
  height: 200px;
  margin-top: 50px;
  margin-left: 33%;
  padding: 20px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px 3px;
  transition: all 0.2s ease-in;
  font-family: Helvetica, Arial, sans-serif;
  display: block;
}
.fadeIn-enter {
  opacity: 0;
}

.fadeIn-leave-active {
  opacity: 0;
  transition: all 0.2s step-end;
}

.fadeIn-enter .modal,
.fadeIn-leave-active.modal {
  transform: scale(1.1);
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  display: block;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  background: #00000094;
  z-index: 999;
  transition: opacity 0.2s ease;
}
</style>

