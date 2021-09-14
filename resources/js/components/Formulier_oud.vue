<template>
  <div >
    <p class="text-2xl">Formulier vue</p>

    <form class="container mx-auto px-2" method="POST"  
	      @submit.prevent="onSubmit"
	      @keydown="form.errors.clear($event.target.name)">

        <forminput label="voornaam" veldnaam="voornaam" v-model="form.voornaam"/>
        <forminput label="familienaam" veldnaam="familienaam" v-model="searchText" />
 
    </form>
  </div>
</template>


<script> 
import Form from '../utilities/Form.js'

export default{
	props:['data', 'extra'],  
	
	data(){
		return {
			form : this.CalcForm(), 	
            searchText : "",
		}
	},
		
	methods:{ 
		CalcForm(){ 
			return new Form(this.data);
		}, 
		
		onSubmit(){

		},
		
	},
}
</script>

<style scoped>
.invalid-feedback{
   display: block;
}
</style>
