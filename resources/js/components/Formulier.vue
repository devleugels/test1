<template>
  <div >
    <p class="text-2xl">Formulier vue</p>

    <form class="formclass" method="POST"
          @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <!-- voor- en familienaam -->
    
        <div class="formrijhalf">
            <div class="formelement">
                <label class="formlabel" for="voornaam">voornaam</label>
                <input type="text" id="voornaam" class="forminput"
                       v-model="form.voornaam" >
           
                <div class="formfout" v-if="form.errors.has('voornaam')"
                     v-text="form.errors.get('voornaam')"></div> 
            </div>
            <div class="formelement">
                <label class="formlabel" for="familienaam">familienaam</label>
                <input type="text" id="familienaam" class="forminput"
                       v-model="form.familienaam" >
                 <div class="formfout" v-if="form.errors.has('familienaam')"
                     v-text="form.errors.get('familienaam')"></div> 
            </div>
        </div>
    

        <!-- straat, huisnummer en bus -->
        <div class="formrij">
            <div class="form-8">
                <label class="formlabel" for="straat">straat</label>
                <input type="text" id="straat" class="forminput"
                       v-model="form.straat" >
                 <div class="formfout" v-if="form.errors.has('straat')"
                     v-text="form.errors.get('straat')"></div>
            </div>

            <div class="form-2">
                <label class="formlabel" for="huisnummer">huisnummer</label>
                <input type="text" id="huisnummer" class="forminput"
                       v-model="form.huisnummer" >
                <div class="formfout" v-if="form.errors.has('huisnummer')"
                     v-text="form.errors.get('huisnummer')"></div>   
            </div>

            <div class="form-2">
                <label class="formlabel" for="bus">bus</label>
                <input type="text" id="bus" class="forminput"
                       v-model="form.bus" >
                <div class="formfout" v-if="form.errors.has('bus')"
                     v-text="form.errors.get('bus')"></div>
            </div>
        </div>  

        <!-- postcode en gemeente -->
        <div class="formrijhalf">
            <div class="form-3">
                <label class="formlabel" for="postcode">postcode</label>
                <input type="text" id="postcode" class="forminput"
                        v-model="form.postcode" >
                 <div class="formfout" v-if="form.errors.has('postcode')"
                     v-text="form.errors.get('postcode')"></div> 
            </div>
            <div class="form-6">
                <label class="formlabel" for="gemeente">gemeente</label>
                <input type="text" id="gemeente" class="forminput"
                       v-model="form.gemeente" >
                <div class="formfout" v-if="form.errors.has('gemeente')"
                     v-text="form.errors.get('gemeente')"></div>
            </div>
        </div>

        <!-- telefoon en gsm -->   
        <div class="formrijhalf">
            <div class="form-6">
                <label class="formlabel" for="telefoon">telefoon</label>
                <input type="text" id="telefoon" class="forminput"
                        v-model="form.telefoon" >
                <div class="formfout" v-if="form.errors.has('telefoon')"
                     v-text="form.errors.get('telefoon')"></div>           
            </div>
            <div class="form-6">
                <label class="formlabel" for="gsm">gsm</label>
                <input type="text" id="gsm" class="forminput"
                        v-model="form.gsm" >
                <div class="formfout" v-if="form.errors.has('gsm')"
                     v-text="form.errors.get('gsm')"></div>              
            </div>
        </div>

        <!-- email adres -->   
        <div class="formrijhalf">
            <div class="formauto">
                <label class="formlabel" for="email">e-mail</label>
                <input type="text" id="email" class="forminput"
                       v-model="form.email" >
                <div class="formfout" v-if="form.errors.has('email')"
                     v-text="form.errors.get('email')"></div>                  
            </div>
        </div>
        <!-- knop spaar -->
        <div class="formrij">
            <button class="formknop">Spaar</button>
        </div>


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
		}
	},
		
	methods:{ 
		CalcForm(){ 
			return new Form(this.data);
		}, 
		
		onSubmit(){
            // alert("[Formulier.vue@onSubmit");
            if (this.form.id == 0){
                this.form.post('/persoon')
                    .then( response => {
                        // alert("[Formulier.vue@onSubmit] response = " + JSON.stringify(response));
                        //alert("[Formulier.vue@onSubmit] response.message = " + JSON.stringivy( response.message));
                        // blijkbaar is response niet zo belangrijk

                        var url = "https://" + window.location.hostname ;
                        alert("[@spring] url = " + url);
                        window.location = url;

                    })
                    .catch( error => {
                        alert("[Formulier.vue@onSubmit] error = " + JSON.stringify(error));
                    })
            } else {
                // alert("[Formulier.vue@onSubmit] patch ");
                this.form.put('/persoon/' + this.form.id)
                  .then( response => {
                      var url = "https://" + window.location.hostname;
                      // dd(url);
                      window.location = url;
                  })
                  .catch( error => {
                      alert("[Formulier.vue@onSubmit] - update  fout = " + JSON.stringify( error ));
                  })            
            }                         
		},
		
	},
}
</script>

