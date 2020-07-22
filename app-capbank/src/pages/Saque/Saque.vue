<template>
  <card class="card" title="Efetuar Saque">
    <div>
      <form @submit.prevent>        
        <div class="row">
          <div class="col-md-6">
            <fg-input v-model="valor" type="text"
                      label="Valor"
                      placeholder="R$">
            </fg-input>
          </div> 
           <div class="col-md-6">
            <fg-input v-model="senha" type="password"
                      label="Senha"
                      placeholder="Senha">
            </fg-input>
          </div>                  
        </div>             
        <div class="text-center">
          <p-button type="info"
                    round
                    @click.native.prevent="enviarSaque">
            Enviar Saque
          </p-button>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>      
      <div v-if="isOpen">
        <div class="overlay" @click.self="isOpen = false;">
          <div class="modal">
            <h1><i :class="icon"></i></h1>
            <p>{{title}}</p>
          </div>
        </div>
      </div>    
  </card>
</template>
<script>
import { StatsCard } from "@/components/index";
const axios = require('axios');
export default {   
  data() {
    return {  
      isOpen: false,
      senha: '',
      valor: ''
    };
  },
  methods: {
    enviarSaque() {      ;
      axios.post('http://127.0.0.1:88/conta/store', {
      id: localStorage.id,
      valor: this.valor,
      tipoOperacao: "Saque",
      senha: this.senha
      })
      .then(response => {
        this.title = response.data.response.message;
        if(response.data.response.error){
          this.icon = "ti-close";
        }else{
          this.icon = "ti-check";
        } 
        this.isOpen = !this.isOpen;
        this.senha = "";
        this.valor = "";
      })
       .catch(error => {
        console.log(error)
        this.errored = true
      })  
    }
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
