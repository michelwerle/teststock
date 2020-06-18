
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-secondary">Retour</router-link>
        </div>

        <div class="panel">
            <h3>Créer un nouveau produit</h3>
                <form class="form" v-on:submit.prevent="saveForm()">
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
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
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
                axios.post('api/v1/produits', newProduit)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
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
