<template>

	<div>
		   <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#staticBackdrop">
  Ajouter
    </button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form>

        	<div class="form-group">

        		<label for="nom"><strong>Nom:</strong></label>
        		<input type="text" placeholder="Tap nom..." name="nomClient" v-model="nomClient" class="form-control">

        	</div>

        	<div class="form-group">

        		<label for="prenom"><strong>Prenom:</strong></label>
        		<input type="text" placeholder="Tap prenom..." name="prenomClient" v-model="prenomClient" class="form-control">
        		
        	</div>

        	<div class="form-group">
        		
        		<label for="nationalite"><strong>Nationalité:</strong></label>

        		<select name="nationaliteClient" v-model="nationaliteClient" class="form-control">

        			<option value="congolaise">Congolaise</option>
        			<option value="burundaise">Burundaise</option>
        			<option value="francaise">Française</option>
        			<option value="americaine">Américaine</option>
        			<option value="angolaise">Angolaise</option>
        			<option value="rwandaise">Rwandaise</option>
        			<option value="ougandaise">Ougandaise</option>
        			<option value="kenyanne">Kenyanne</option>

        		</select>

        	</div>

        	<div class="form-group">
        		
        		<label for="email"><strong>Email:</strong></label>
        		<input type="emailClient" placeholder="Tap email..." name="email" v-model="emailClient" class="form-control">

        	</div>

        	<div class="form-group">

        		<label for="entreprise"><strong>Entreprise: </strong></label>
        		<input type="text" placeholder="Tap entreprise..." name="entrepriseClient" v-model="entrepriseClient" class="form-control">

        	</div>
        	
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" v-on:click="saveClientDatas" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>
	</div>
	

</template>

<script>

	export default {

		data() {

			return {

				nomClient : '',

				prenomClient : '',

				nationaliteClient : '',

				emailClient : '',

				entrepriseClient : ''

			}
		},


		methods: {

			saveClientDatas(){

				axios.post('http://127.0.0.1:8000/clientsList/', 

				{ nom : this.nomClient , 

				 prenom : this.prenomClient , 

				 nationalite : this.nationaliteClient ,

			     email: this.emailClient ,

			     entreprise : this.entrepriseClient }

					)

				     .then(response => this.$emit('client-added', response))

				     .catch(error => console.log(error));
			}


		}


	};

</script>