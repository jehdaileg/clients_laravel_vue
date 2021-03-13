<template>

		<div>
	

<!-- Modal -->
<div class="modal fade" id="editClientModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editClientModal">Editing Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form>

        	<div class="form-group">

        		<label for="nom"><strong>Nom:</strong></label>
        		<input type="text" placeholder="Tap nom..." name="nom" v-model="ClientToEdit.nom" class="form-control">

        	</div>

        	<div class="form-group">

        		<label for="prenom"><strong>Prenom:</strong></label>
        		<input type="text" placeholder="Tap prenom..." name="prenom" v-model="ClientToEdit.prenom" class="form-control">
        		
        	</div>

        	<div class="form-group">
        		
        		<label for="nationalite"><strong>Nationalité:</strong></label>

        		<select name="nationalite" v-model="ClientToEdit.nationalite" class="form-control">

        			<option value="congolaise" {{ClientToEdit.nationalite == congolaise ?? echo 'selected'}}>Congolaise</option>
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
        		<input type="email" placeholder="Tap email..." name="email" v-model="ClientToEdit.email" class="form-control">

        	</div>

        	<div class="form-group">

        		<label for="entreprise"><strong>Entreprise: </strong></label>
        		<input type="text" placeholder="Tap entreprise..." name="entreprise" v-model="ClientToEdit.entreprise" class="form-control">

        	</div>
        	
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" v-on:click="update" data-dismiss="modal">Confirm</button>
      </div>
    </div>
  </div>
</div>
	</div>
	
	

</template>

<script>
	
 	export default{

 		props : ['ClientToEdit'],

 		methods: {

 			update(){

 				axios.patch('http://127.0.0.1:8000/clientsList/edit/' +this.ClientToEdit.id, {

 					nom : this.ClientToEdit.nom,

 					prenom : this.ClientToEdit.prenom,

 					nationalite : this.ClientToEdit.nationalite,

 					email : this.ClientToEdit.email,

 					entreprise : this.ClientToEdit.entreprise


 				})
 				     .then(response => this.$emit('client-updated', response))

 				     .catch(error => console.log(error));
 			}
 		}


 	};

</script>