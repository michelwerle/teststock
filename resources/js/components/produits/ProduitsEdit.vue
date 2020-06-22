
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-secondary">Retour</router-link>
        </div>

        <div class="panel">
            <h3>Modifier produit</h3>
                <form v-on:submit.prevent="saveForm()" class="form">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Nom</label>
                            <input type="text" v-model="produit.nom" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Description</label>
                            <input type="text" v-model="produit.description" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Prix</label>
                            <input type="text" v-model="produit.prix" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Quantité</label>
                            <input type="number" v-model="produit.quantite" class="form-control" step="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group d-flex justify-content-between">
                            <button class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
                            <router-link :to="{name: 'ChartContainer'}" class="btn btn-secondary"><i class="fas fa-chart-line"></i> Mouvements de stock</router-link>
                        </div>
                    </div>
                </form>


        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.produitId = id;
            axios.get('api/v1/produits/' + id)
                .then(function (resp) {
                    app.produit = resp.data;
                })
                .catch(function () {
                    alert("Impossible de charger les produits")
                });
        },
        data: function () {
            return {
                produitId: null,
                produit: {
                    nom: '',
                    description: '',
                    prix: 1,
                    quantite: 1,
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newProduit = app.produit;
                axios.patch('api/v1/produits/' + app.produitId, newProduit)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (data) {
                        var errorString = '<ul>';
                        var response = JSON.parse(data.responseText, function (key, value) {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul>';
                        document.getElementByClassName('form').prepend('<div class="alert alert-danger"><a class="btn btn-small text-danger close"><i class="fas fa-times"></i></a><p>' + errorString + '</p></div>');
                    });
            }
        }
    }
</script>
