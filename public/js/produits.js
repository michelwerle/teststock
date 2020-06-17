var ach = new Vue({
    el: '#produits',
    data: {
        loading: false,
        produits: [],
        order: 'nom',
        asc: true,
        currentPage: 0,
        itemsPerPage: 25,
        resultCount: 0,
        //csrf_token: '',
        editing: null,
        nouveau_produit: { nom: null, description: null, prix: null, quantite: null },
        base_url: document.getDocumentBy("input[name=base_url]").value
    },
    mounted: function () {
        //this.csrf_token = $('input[name="csrf_token"]').val();
        this.getproduits();
    },
    computed: {
        orderedproduits: function () {
            if (this.asc) var dir = 'asc';
            else var dir = 'desc';
            return _.orderBy(this.produits, this.order, dir)
        },
        totalPages: function () {
            return Math.ceil(this.resultCount / this.itemsPerPage);
        },
        paginateproduits: function () {
            this.resultCount = this.orderedproduits.length;
            if (this.currentPage > this.totalPages) {
                this.currentPage = this.totalPages;
            } else if (this.currentPage == 0)
                this.setPage(1);
            var index = (this.currentPage - 1) * this.itemsPerPage;
            return this.orderedproduits.slice(index, index + this.itemsPerPage);
        }
    },
    methods: {
        getproduits: function () {
            var self = this;
            $.ajax({
                url: this.base_url,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    self.produits = data;
                    self.resultCount = self.produits.length;
                },
                error: function (error) {
                    alert(JSON.stringify(error));
                }
            });
        },
        orderBy: function (prop) {
            if (this.order === prop) this.asc = !this.asc;
            this.order = prop;
        },
        setPage: function (pageNumber) {
            this.currentPage = pageNumber;
        },
        edit: function (event, produit) {
            event.preventDefault();
            this._beforeEditingCache = Object.assign({}, produit);
            this.editing = produit;
            //var index = this.produits.indexOf(produit);
            //this.$set(this.produits[index], 'edit', 1);

        },
        save: function (event, produit) {
            var self = this;
            $.ajax({
                url: 'save',
                method: 'POST',
                dataType: 'json',
                data: { 'nom': produit.nom, 'description': produit.description,
                            'quantite': produit.quantite, 'prix': produit.prix },
                success: function (data) {
                    if (data.statut == 'success') {
                        self.editing = null;
                        displayAlert('success', data.message);
                    }
                    else {
                        displayAlert('danger', data.message);
                    }
                },
                error: function (error) {
                    displayAlert('danger', JSON.stringify(error));
                }
            });
        },
        cancelEdit: function (event, produit) {
            event.preventDefault();
            //var index = this.produits.indexOf(produit);
            //this.$set(this.produits[index], 'edit', 0);
            Object.assign(produit, this._beforeEditingCache);
            this.editing = this._beforeEditingCache = null;
        },

        delete: function (event, produit) {
            event.stopPropagation();
            event.preventDefault();
            if (confirm('Êtes-vous sûr de vouloir supprimer cet produit ?')) {
                var self = this;
                self.loading = true;
                var index = self.produits.indexOf(produit);
                //$(event.target).addClass('is-loading').attr('disabled', 'disabled');
                $.ajax({
                    url: 'delete',
                    method: 'POST',
                    data: { 'id': produit.id },
                    dataType: 'json',
                    success: function (data) {
                        self.loading = false;
                        //self.ceo_csrf_token = data.csrf.hash;
                        self.getproduits();
                        //$(event.target).removeClass('is-loading').attr('disabled', false);
                        if (data.statut == 'success') {
                            self.editing = null;
                            displayAlert('success', data.message);
                        }
                        else {
                            displayAlert('danger', data.message);
                        }
                    },
                    error: function (error) {
                        alert(JSON.stringify(error));
                        self.loading = false;
                        //$(event.target).removeClass('is-loading').attr('disabled', false);
                    }
                });
            }
        },
        showModal: function () {
            $('#modal').modal('show');
        },
        hideModal: function () {
            $('#modal').modal('hide');
        },
        saveNew: function (event) {
            event.stopPropagation();
            event.preventDefault();
            var self = this;
            self.loading = true;
            //$(event.target).addClass('is-loading').attr('disabled', 'disabled');
            $.ajax({
                url: 'save',
                method: 'POST',
                data: {
                    'nom': self.nouveau_produit.nom, 'description': self.nouveau_produit.description,
                    'quantite': self.nouveau_produit.quantite, 'prix': self.nouveau_produit.prix },
                dataType: 'json',
                success: function (data) {
                    self.loading = false;
                    //self.ceo_csrf_token = data.csrf.hash;
                    displayAlert(data.statut, data.message);
                    if (data.statut == 'success') {
                        self.getproduits();
                        self.nouveau_produit = { nom: null, description: null, prix: null, quantite: null };
                        $('#modal').modal('hide');
                    }
                    //$(event.target).removeClass('is-loading').attr('disabled', false);
                },
                error: function (error) {
                    alert(JSON.stringify(error));
                    self.loading = false;
                    //$(event.target).removeClass('is-loading').attr('disabled', false);
                }
            });
        }

    },
});
