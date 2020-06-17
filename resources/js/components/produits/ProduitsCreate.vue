
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Retour</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Créer un nouveau produit</div>
            <div class="panel-body">
                <form v-on:submit.prevent="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Produit name</label>
                            <input type="text" v-model="produit.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Produit address</label>
                            <input type="text" v-model="produit.address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Produit website</label>
                            <input type="text" v-model="produit.website" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Produit email</label>
                            <input type="text" v-model="produit.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                produit: {
                    name: '',
                    address: '',
                    website: '',
                    email: '',
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
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your produit");
                    });
            }
        }
    }
</script>
