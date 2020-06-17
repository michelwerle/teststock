<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createProduit'}" class="btn btn-success">Ajouter un produit</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Liste des produits</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="produit, index in produits">
                        <td>{{ produit.nom }}</td>
                        <td>{{ produit.description }}</td>
                        <td>{{ produit.prix }}</td>
                        <td>{{ produit.quantite }}</td>
                        <td>
                            <router-link :to="{name: 'editProduit', params: {id: produit.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(produit.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                produits: []
            }
        },
        mounted() {
            var app = this;
            axios.get('api/v1/produits')
                .then(function (resp) {
                    app.produits = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load produits");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('api/v1/produits/' + id)
                        .then(function (resp) {
                            app.produits.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete produit");
                        });
                }
            }
        }
    }
</script>
