<template>

	<div>

		<div class="container">
			<h4 class="text-info">Clients List</h4>

			<div class="d-flex justify-content-between">

				<add-client-component @client-added="refresh"></add-client-component>

				 <form class="d-flex">

                    <input class="form-control me-2" type="search" placeholder="Tapez une indication..." aria-label="Search" @keyup="searchClient" v-model="q">

                     <button class="btn btn-sm btn-warning" type="submit">Rechercher</button>

                  </form>

			</div>

			<div class="text-danger" v-if="clients === null">Pas de client correspondant!</div>

			<table class="table table-stripped table-bordered my-4">

 				<thead>

 					<tr>
 						<th>#</th>
 						<th>Nom</th>
 						<th>Prenom</th>
 						<th>Email</th>
 						<th>Entreprise</th>
 						<th>Actions</th>
 					</tr>

 				</thead>

 				<tbody v-for="client in clients" v-bind:key="client.id">

 					<tr>

 						<td>{{ client.id }}</td>
 						<td>{{ client.nom }}</td>
 						<td>{{ client.prenom }}</td>
 						<td>{{ client.email }}</td>
 						<td>{{ client.entreprise }}</td>
 						<td>
 							    <!-- Button trigger modal -->
                     <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editClientModal" v-on:click="getClient(client.id)">
                     Editer
                     </button>

 							<button class="btn btn-outline-danger" v-on:click="deleteClient(client.id)">Supprimer</button>
 						</td>
 						
 					</tr>

 					
 				</tbody>

			</table>

         <edit-client-component v-bind:ClientToEdit="ClientToEdit" @client-updated="refresh"></edit-client-component>

		</div>
		
	</div>
	

</template>

<script>

   export default {

   	 data(){

   	 	return {

   	 		clients : {},

        ClientToEdit : '',

   	 		q : ''



   	 	}
   	 },

   	 methods: {

   	 	searchClient(){

   	 		if(this.q.length > 2){

   	 			axios.get('http://127.0.0.1:8000/clientsList/' +this.q)

   	 			     .then(response => {

   	 			     	this.clients = response.data

   	 			     })

   	 			     .catch(error => console.log(error));

   	 		} else {

   	 			axios.get('http://127.0.0.1:8000/clientsList')

   	 			     .then(response => {

   	 			     	this.clients = response.data
   	 			     })

   	 			     .catch(error => console.log(error));
   	 		}



   	 	},

   	 	refresh(){

   	 		axios.get('http://127.0.0.1:8000/clientsList')

   	 			     .then(response => {

   	 			     	this.clients = response.data
   	 			     })

   	 			     .catch(error => console.log(error));


   	 	},

         deleteClient(id){

            axios.delete('http://127.0.0.1:8000/clientsList/' +id)

                 .then(response => {

                  this.clients = response.data
                 })

                 .catch(error => console.log(error));
         },


         getClient(id){

            axios.get('http://127.0.0.1:8000/clientsList/edit/' +id)

                 .then(response => this.ClientToEdit = response.data)

                 .catch(error => console.log(error));

         }





   	 },

   	 mounted(){

   	 	axios.get('http://127.0.0.1:8000/clientsList')

   	 	     .then(response => {

   	 	     	this.clients = response.data
   	 	     })

   	 	     .catch(error => console.log(error));


   	 }


   };
	

</script>